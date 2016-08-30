<script type="text/javascript">
	/*!
    FileReader.js - v0.9
    A lightweight wrapper for common FileReader usage.
    Copyright 2012 Brian Grinstead - MIT License.
    See http://github.com/bgrins/filereader.js for documentation.
*/

(function(window, document) {

    var FileReader = window.FileReader;
    var FileReaderSyncSupport = false;
    var workerScript = "self.addEventListener('message', function(e) { var data=e.data; try { var reader = new FileReaderSync; postMessage({ result: reader[data.readAs](data.file), extra: data.extra, file: data.file})} catch(e){ postMessage({ result:'error', extra:data.extra, file:data.file}); } }, false);";
    var syncDetectionScript = "self.addEventListener('message', function(e) { postMessage(!!FileReaderSync); }, false);";
    var fileReaderEvents = ['loadstart', 'progress', 'load', 'abort', 'error', 'loadend'];

    var FileReaderJS = window.FileReaderJS = {
        enabled: false,
        setupInput: setupInput,
        setupDrop: setupDrop,
        setupClipboard: setupClipboard,
        sync: false,
        output: [],
        opts: {
            dragClass: "drag",
            accept: false,
            readAsDefault: 'BinaryString',
            readAsMap: {
                'image/*': 'DataURL',
                'text/*' : 'Text'
            },
            on: {
                loadstart: noop,
                progress: noop,
                load: noop,
                abort: noop,
                error: noop,
                loadend: noop,
                skip: noop,
                groupstart: noop,
                groupend: noop,
                beforestart: noop
            }
        }
    };

    // Setup jQuery plugin (if available)
    if (typeof(jQuery) !== "undefined") {
        jQuery.fn.fileReaderJS = function(opts) {
            return this.each(function() {
                if ($(this).is("input")) {
                    setupInput(this, opts);
                }
                else {
                    setupDrop(this, opts);
                }
            });
        };

        jQuery.fn.fileClipboard = function(opts) {
            return this.each(function() {
                setupClipboard(this, opts);
            });
        };
    }

    // Not all browsers support the FileReader interface.  Return with the enabled bit = false.
    if (!FileReader) {
        return;
    }

    // WorkerHelper is a little wrapper for generating web workers from strings
    var WorkerHelper = (function() {

        var URL = window.URL || window.webkitURL;
        var BlobBuilder = window.BlobBuilder || window.WebKitBlobBuilder || window.MozBlobBuilder;

        // May need to get just the URL in case it is needed for things beyond just creating a worker.
        function getURL (script) {
            if (window.Worker && BlobBuilder && URL) {
                var bb = new BlobBuilder();
                bb.append(script);
                return URL.createObjectURL(bb.getBlob());
            }

            return null;
        }

        // If there is no need to revoke a URL later, or do anything fancy then just return the worker.
        function getWorker (script, onmessage) {
            var url = getURL(script);
            if (url) {
                var worker = new Worker(url);
                worker.onmessage = onmessage;
                return worker;
            }

            return null;
        }

        return {
            getURL: getURL,
            getWorker: getWorker
        };

    })();

    // setupClipboard: bind to clipboard events (intended for document.body)
    function setupClipboard(element, opts) {

        if (!FileReaderJS.enabled) {
            return;
        }
        var instanceOptions = extend(extend({}, FileReaderJS.opts), opts);

        element.addEventListener("paste", onpaste, false);

        function onpaste(e) {
            var files = [];
            var clipboardData = e.clipboardData || {};
            var items = clipboardData.items || [];

            for (var i = 0; i < items.length; i++) {
                var file = items[i].getAsFile();

                if (file) {

                    // Create a fake file name for images from clipboard, since this data doesn't get sent
                    var matches = new RegExp("/\(.*\)").exec(file.type);
                    if (!file.name && matches) {
                        var extension = matches[1];
                        file.name = "clipboard" + i + "." + extension;
                    }

                    files.push(file);
                }
            }

            if (files.length) {
                processFileList(e, files, instanceOptions);
                e.preventDefault();
                e.stopPropagation();
            }
        }
    }

    // setupInput: bind the 'change' event to an input[type=file]
    function setupInput(input, opts) {

        if (!FileReaderJS.enabled) {
            return;
        }
        var instanceOptions = extend(extend({}, FileReaderJS.opts), opts);

        input.addEventListener("change", inputChange, false);
        input.addEventListener("drop", inputDrop, false);

        function inputChange(e) {
            processFileList(e, input.files, instanceOptions);
        }

        function inputDrop(e) {
            e.stopPropagation();
            e.preventDefault();
            processFileList(e, e.dataTransfer.files, instanceOptions);
        }
    }

    // setupDrop: bind the 'drop' event for a DOM element
    function setupDrop(dropbox, opts) {

        if (!FileReaderJS.enabled) {
            return;
        }
        var instanceOptions = extend(extend({}, FileReaderJS.opts), opts);
        var dragClass = instanceOptions.dragClass;
        var initializedOnBody = false;

        // Bind drag events to the dropbox to add the class while dragging, and accept the drop data transfer.
        dropbox.addEventListener("dragenter", onlyWithFiles(dragenter), false);
        dropbox.addEventListener("dragleave", onlyWithFiles(dragleave), false);
        dropbox.addEventListener("dragover", onlyWithFiles(dragover), false);
        dropbox.addEventListener("drop", onlyWithFiles(drop), false);

        // Bind to body to prevent the dropbox events from firing when it was initialized on the page.
        document.body.addEventListener("dragstart", bodydragstart, true);
        document.body.addEventListener("dragend", bodydragend, true);
        document.body.addEventListener("drop", bodydrop, false);

        function bodydragend(e) {
            initializedOnBody = false;
        }

        function bodydragstart(e) {
            initializedOnBody = true;
        }

        function bodydrop(e) {
            if (e.dataTransfer.files && e.dataTransfer.files.length ){
                e.stopPropagation();
                e.preventDefault();
            }
        }

        function onlyWithFiles(fn) {
            return function() {
                if (!initializedOnBody) {
                    fn.apply(this, arguments);
                }
            };
        }

        function drop(e) {
            e.stopPropagation();
            e.preventDefault();
            if (dragClass) {
                removeClass(dropbox, dragClass);
            }
            processFileList(e, e.dataTransfer.files, instanceOptions);
        }

        function dragenter(e) {
            e.stopPropagation();
            e.preventDefault();
            if (dragClass) {
                addClass(dropbox, dragClass);
            }
        }

        function dragleave(e) {
            if (dragClass) {
                removeClass(dropbox, dragClass);
            }
        }

        function dragover(e) {
            e.stopPropagation();
            e.preventDefault();
            if (dragClass) {
                addClass(dropbox, dragClass);
            }
        }
    }

    // setupCustomFileProperties: modify the file object with extra properties
    function setupCustomFileProperties(files, groupID) {
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            file.extra = {
                nameNoExtension: file.name.substring(0, file.name.lastIndexOf('.')),
                extension: file.name.substring(file.name.lastIndexOf('.') + 1),
                fileID: i,
                uniqueID: getUniqueID(),
                groupID: groupID,
                prettySize: prettySize(file.size)
            };
        }
    }

    // getReadAsMethod: return method name for 'readAs*' - http://www.w3.org/TR/FileAPI/#reading-a-file
    function getReadAsMethod(type, readAsMap, readAsDefault) {
        for (var r in readAsMap) {
            if (type.match(new RegExp(r))) {
                return 'readAs' + readAsMap[r];
            }
        }
        return 'readAs' + readAsDefault;
    }

    // processFileList: read the files with FileReader, send off custom events.
    function processFileList(e, files, opts) {

        var filesLeft = files.length;
        var group = {
            groupID: getGroupID(),
            files: files,
            started: new Date()
        };

        function groupEnd() {
            group.ended = new Date();
            opts.on.groupend(group);
        }

        function groupFileDone() {
            if (--filesLeft === 0) {
                groupEnd();
            }
        }

        FileReaderJS.output.push(group);
        setupCustomFileProperties(files, group.groupID);

        opts.on.groupstart(group);

        // No files in group - end immediately
        if (!files.length) {
            groupEnd();
            return;
        }

        var sync = FileReaderJS.sync && FileReaderSyncSupport;
        var syncWorker;

        // Only initialize the synchronous worker if the option is enabled - to prevent the overhead
        if (sync) {
            syncWorker = WorkerHelper.getWorker(workerScript, function(e) {
                var file = e.data.file;
                var result = e.data.result;

                // Workers seem to lose the custom property on the file object.
                if (!file.extra) {
                    file.extra = e.data.extra;
                }

                file.extra.ended = new Date();

                // Call error or load event depending on success of the read from the worker.
                opts.on[result === "error" ? "error" : "load"]({ target: { result: result } }, file);
                groupFileDone();

            });
        }

        Array.prototype.forEach.call(files, function(file) {

            file.extra.started = new Date();

            if (opts.accept && !file.type.match(new RegExp(opts.accept))) {
                opts.on.skip(file);
                groupFileDone();
                return;
            }

            if (opts.on.beforestart(file) === false) {
                opts.on.skip(file);
                groupFileDone();
                return;
            }

            var readAs = getReadAsMethod(file.type, opts.readAsMap, opts.readAsDefault);

            if (sync && syncWorker) {
                syncWorker.postMessage({
                    file: file,
                    extra: file.extra,
                    readAs: readAs
                });
            }
            else {

                var reader = new FileReader();
                reader.originalEvent = e;

                fileReaderEvents.forEach(function(eventName) {
                    reader['on' + eventName] = function(e) {
                        if (eventName == 'load' || eventName == 'error') {
                            file.extra.ended = new Date();
                        }
                        opts.on[eventName](e, file);
                        if (eventName == 'loadend') {
                            groupFileDone();
                        }
                    };
                });

                reader[readAs](file);
            }
        });
    }

    // checkFileReaderSyncSupport: Create a temporary worker and see if FileReaderSync exists
    function checkFileReaderSyncSupport() {
        var worker = WorkerHelper.getWorker(syncDetectionScript, function(e) {
            FileReaderSyncSupport = e.data;
        });

        if (worker) {
            worker.postMessage({});
        }
    }

    // noop: do nothing
    function noop() {

    }

    // extend: used to make deep copies of options object
    function extend(destination, source) {
        for (var property in source) {
            if (source[property] && source[property].constructor &&
                source[property].constructor === Object) {
                destination[property] = destination[property] || {};
                arguments.callee(destination[property], source[property]);
            }
            else {
                destination[property] = source[property];
            }
        }
        return destination;
    }

    // hasClass: does an element have the css class?
    function hasClass(el, name) {
        return new RegExp("(?:^|\\s+)" + name + "(?:\\s+|$)").test(el.className);
    }

    // addClass: add the css class for the element.
    function addClass(el, name) {
        if (!hasClass(el, name)) {
          el.className = el.className ? [el.className, name].join(' ') : name;
        }
    }

    // removeClass: remove the css class from the element.
    function removeClass(el, name) {
        if (hasClass(el, name)) {
          var c = el.className;
          el.className = c.replace(new RegExp("(?:^|\\s+)" + name + "(?:\\s+|$)", "g"), " ").replace(/^\s\s*/, '').replace(/\s\s*$/, '');
        }
    }

    // prettySize: convert bytes to a more readable string.
    function prettySize(bytes) {
        var s = ['bytes', 'kb', 'MB', 'GB', 'TB', 'PB'];
        var e = Math.floor(Math.log(bytes)/Math.log(1024));
        return (bytes/Math.pow(1024, Math.floor(e))).toFixed(2)+" "+s[e];
    }

    // getGroupID: generate a unique int ID for groups.
    var getGroupID = (function(id) {
        return function() {
            return id++;
        };
    })(0);

    // getUniqueID: generate a unique int ID for files
    var getUniqueID = (function(id) {
        return function() {
            return id++;
        };
    })(0);

    // The interface is supported, bind the FileReaderJS callbacks
    FileReaderJS.enabled = true;

})(this, document);

</script>
<div class="row">
	<div class ='hidden-msg hidden'>This section will be available only after the user is added</div>						        		
	<div class="file_upload_container">
		<style type="text/css">
			/* layout.css Style */
			.upload-drop-zone {
			  height: 200px;
			  border-width: 2px;
			  margin-bottom: 20px;
			}

			/* skin.css Style*/
			.upload-drop-zone {
			  color: #ccc;
			  border-style: dashed;
			  border-color: #ccc;
			  line-height: 200px;
			  text-align: center
			}
			.upload-drop-zone.drop {
			  color: #222;
			  border-color: #222;
			}
			#list > div {
			    border-style: solid;
			    border-width: 1px;
			    margin: 5px auto;
			    padding: 5px;
			    width: 95%;
			}
			.progressBar{
				width: 200px;
				height: 10px;
				margin-left: 100px;
				display: inline-block;
				border-style: solid;
				border-width: 1px;
				border-radius: 50px;
			}
		</style>
		<style type="text/css">
           
            #dropzone.in {
                border:2px solid #fff;
                background: none repeat scroll 0 0 #32c5d2;
            }
            #dropzone:hover {
               background: none repeat scroll 0 0 #32c5d2;
            }
            #dropzone.fade {
                -webkit-transition: all 0.3s ease-out;
                -moz-transition: all 0.3s ease-out;
                -ms-transition: all 0.3s ease-out;
                -o-transition: all 0.3s ease-out;
                transition: all 0.3s ease-out;
                opacity: 1;
            }
			#dropzone{
				min-height: 230px;
				overflow: hidden;
				position: relative;
				background: none repeat scroll 0 0 #F7F7F7;
			    border-radius: 8px;
			    box-shadow: 0 0 10px #C0C0C0 inset;
			    text-align: center;
			    text-shadow: 1px 1px 1px #D7D7D7, 1px 1px 1px rgba(0, 0, 0, 0.7);
			    transition: all 0.5s linear 0s;
				z-index: 2;
				border:1px solid #fff;
				margin: 60px 20px;
			}
			.text{
			    font-size: 11px;
			    text-align: center;
				font-size: 24px;
				color: #8F8F8F;
				margin-top: 7%;
			}
			.dropzone .active{
				box-shadow: 0 0px 20px #818378 inset !important;
			}
			.eachImage {
			    float: left;
			    margin: 28px;
			    position: relative;
			    width: 205px;
			    text-align: center;
				z-index: 10;
			}
			.preview{
			    display: inline-block;
			    position: relative;
			}
			.preview img{
			    border: 3px solid #FFFFFF;
			    box-shadow: 0 0 2px #000000;
			    display: block;
			    max-height: 200px;
			    max-width: 200px;
				box-shadow: 0px 0px 10px 1px #484848;
			}
			.overlay{
			    background: rgba(255, 255, 255, 0.5);
			    display: block;
			    height: 100%;
			    left: 0;
			    position: absolute;
			    top: 0;
			    width: 100%;
			}
			.overlay span{
				position: absolute;
				top: 35%;
				color: black;
				font-weight: bold;
			}
			.overlay .updone{
				position: relative;
			    text-align: right;
			    text-shadow: 1px 1px 1px #D7D7D7, 1px 1px 1px rgba(0, 0, 0, 0.7);
			    transition: all 0.5s linear 0s;
				font-size: 25px;
				text-align: right;
			}
			.progress{
				height: 8px;  /* Can be anything */
				position: relative;
				background: #555;
				-moz-border-radius: 25px;
				-webkit-border-radius: 25px;
				border-radius: 25px;
				-webkit-box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
				-moz-box-shadow   : inset 0 -1px 1px rgba(255,255,255,0.3);
				box-shadow        : inset 0 -1px 1px rgba(255,255,255,0.3);
			}
			.progress span{
				border: 1px solid #125825;
				width: 0px;
				display: block;
				margin-top: 10px;
				text-align: right;
				height: 6px;
				   -webkit-border-top-right-radius: 20px;
				-webkit-border-bottom-right-radius: 20px;
				       -moz-border-radius-topright: 20px;
				    -moz-border-radius-bottomright: 20px;
				           border-top-right-radius: 20px;
				        border-bottom-right-radius: 20px;
				    -webkit-border-top-left-radius: 20px;
				 -webkit-border-bottom-left-radius: 20px;
				        -moz-border-radius-topleft: 20px;
				     -moz-border-radius-bottomleft: 20px;
				            border-top-left-radius: 20px;
				         border-bottom-left-radius: 20px;
				background-color: rgb(43,194,83);
				background-image: -webkit-gradient(
				  linear,
				  left bottom,
				  left top,
				  color-stop(0, rgb(43,194,83)),
				  color-stop(1, rgb(84,240,84))
				 );
				background-image: -webkit-linear-gradient(
				  center bottom,
				  rgb(43,194,83) 37%,
				  rgb(84,240,84) 69%
				 );
				background-image: -moz-linear-gradient(
				  center bottom,
				  rgb(43,194,83) 37%,
				  rgb(84,240,84) 69%
				 );
				background-image: -ms-linear-gradient(
				  center bottom,
				  rgb(43,194,83) 37%,
				  rgb(84,240,84) 69%
				 );
				background-image: -o-linear-gradient(
				  center bottom,
				  rgb(43,194,83) 37%,
				  rgb(84,240,84) 69%
				 );
				-webkit-box-shadow: 
				  inset 0 2px 9px  rgba(255,255,255,0.3),
				  inset 0 -2px 6px rgba(0,0,0,0.4);
				-moz-box-shadow: 
				  inset 0 2px 9px  rgba(255,255,255,0.3),
				  inset 0 -2px 6px rgba(0,0,0,0.4);
				position: relative;
				overflow: hidden;
			}
		</style>
		<!-- Upload Finished -->
		<div class="js-upload-finished">										            
            <div class="list-group">
              
            </div>
        </div>
        <!-- Upload Finished -->

        
        <!-- Drop Zone -->
        <h4>Upload New Files</h4>
        	<div class="upload-drop-zone" id="dropzone">
            	Drop files here
        	</div>
        	<output id="list"></output>
         <!-- Drop Zone -->
         <script type="text/javascript">
         	// 

         	function upDateFileList(){
         		data = {
         			modID : 1,
         			modPKey : $('.primaryKey').val(),
         			modFieldID : 154
         		}
         		href = '/GetFiles';
         		$.post( href, data ,function( response ) {
         			if(response.status == 1){
         				$('.js-upload-finished .list-group').html(response.data);
         				$('#dropzone').html('Drop files here');
         			}
         		});
         	}

         	jQuery(document).ready(function() { upDateFileList(); });
         </script>
        <script type="text/javascript">
        	jQuery(document).ready(function(){	
				var dropbox ; 
				var dropzone = 'drop-zone';

			var oprand = {
				dragClass : "in",
			    on: {
			        load: function(e, file) {
			        	
						// check file type
                        console.log(file.type);
						var imageType = /image.*/;/*
						if (!file.type.match(imageType)) {  
						  alert("File \""+file.name+"\" is not a valid image file");
						  return false;	
						} 
						
						// check file size
						if (parseInt(file.size / 1024) > 2050) {  
						  alert("File \""+file.name+"\" is too big.Max allowed size is 2 MB.");
						  return false;	
						} */

						create_box(e,file);
			    	},
			    }
			};

				FileReaderJS.setupDrop(document.getElementById('dropzone'), oprand); 
				
			});

			create_box = function(e,file){
				var rand = Math.floor((Math.random()*100000)+3);
				var imgName = file.name; // not used, Irand just in case if user wanrand to print it.
				var src		= e.target.result;

				var template = '<div class="eachImage" id="'+rand+'">';
				template += '<span class="preview" id="'+rand+'"><img src="'+src+'"><span class="overlay"><span class="updone"></span></span>';
				template += '</span>';
				template += '<div class="progress" id="'+rand+'"><span></span></div>';

				if($("#dropzone .eachImage").html() == null)
					$("#dropzone").html(template);
				else
					$("#dropzone").append(template);
				
				// upload image
				upload(file,rand);
			}

			upload = function(file,rand){

				var token = $('meta[name="_token"]').attr('content');
				var modID = 1; var modPKey = $('.primaryKey').val(); var modFieldID = 154;
				// now upload the file
				var xhr = new Array();
				xhr[rand] = new XMLHttpRequest();
				xhr[rand].open("post", "/Files", true);

				xhr[rand].upload.addEventListener("progress", function (event) {
					console.log(event);
					if (event.lengthComputable) {
						$(".progress[id='"+rand+"'] span").css("width",(event.loaded / event.total) * 100 + "%");
						$(".preview[id='"+rand+"'] .updone").html(((event.loaded / event.total) * 100).toFixed(2)+"%");
					}
					else {
						alert("Failed to compute file upload length");
					}
				}, false);

				xhr[rand].onreadystatechange = function (oEvent) {  
				  if (xhr[rand].readyState === 4) {  
					if (xhr[rand].status === 200) {  
					  $(".progress[id='"+rand+"'] span").css("width","100%");
					  $(".preview[id='"+rand+"']").find(".updone").html("100%");
					  $(".preview[id='"+rand+"'] .overlay").css("display","none");
					  upDateFileList();
					} else {  
					  alert("Error : Unexpected error while uploading file");  
					}  
				  }  
				};  
				
				// Set headers
				//xhr[rand].setRequestHeader("Content-Type", "multipart/form-data");
				//xhr[rand].setRequestHeader("X-File-Name", file.fileName);
				//xhr[rand].setRequestHeader("X-File-Size", file.fileSize);
				//xhr[rand].setRequestHeader("X-File-Type", file.type);
				xhr[rand].setRequestHeader('X-CSRF-TOKEN', token);

				var formData = new FormData();
                formData.append('modID', modID);
                formData.append('modPKey', modPKey); 
                formData.append('modFieldID', modFieldID);  
                formData.append('postFile', file);

				// Send the file (doh)
				//xhr[rand].send(file);
				xhr[rand].send(formData);
			}
        </script>

	</div>
	
</div>