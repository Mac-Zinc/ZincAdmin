var NewFormWizard = function () {


    return {
        //main function to initiate the module
        init: function (fid, postUrl , frmRules, frmMsg) {
            if (!jQuery().bootstrapWizard) {
                return;
            }
            
            formId = fid; //'contracts_form';
            var form = $('#'+formId);
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);
            frmRules = typeof frmRules !== 'undefined' ? frmRules : '';
            frmMsg = typeof frmMsg !== 'undefined' ? frmMsg : '';
            //if ( frmRules === null ) fRules = '{}'; JSON.parse()
            //if ( frmMsg === null ) frmMsg = '{}'; JSON.parse()
            var fRules = frmRules;
            var fMsg = frmMsg;
            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                
                rules: fRules ,
                
                messages: fMsg ,
                
                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label.closest('.form-group').removeClass('has-error').addClass('has-success');
                        //label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label.addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });
            /**/
            var displayConfirm = function() {
            /*    $('#tab4 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment[]') {
                        var payment = [];
                        $('[name="payment[]"]:checked', form).each(function(){ 
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            */    
            }

            var handleTitle = function(tab, navigation, index) {

                if( ! form.validate()){ return false; }
                var total = navigation.find('li:visible').length;                
                var current = index + 1;
                // set wizard title
                //$('.step-title', $('#'+formId+'_wiz')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li:visible', $('#'+formId+'_wiz')).removeClass("done");
                var li_list = navigation.find('li:visible');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#'+formId+'_wiz').find('.button-previous').hide();
                } else {
                    $('#'+formId+'_wiz').find('.button-previous').show();
                    $('#'+formId+'_wiz').find('.button-previous').removeClass('disabled');
                }

                if (current >= total) {
                    $('#'+formId+'_wiz').find('.button-next').hide();
                    $('#'+formId+'_wiz').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#'+formId+'_wiz').find('.button-next').show();
                    //$('#'+formId+'_wiz').find('.button-submit').hide();
                }

               // $('.tab-pane').removeClass('active');
               // $('#tab'+current).addClass('active');
               // var $percent = (current / total) * 100;
              //  $('#'+formId+'_wiz').find('.progress-bar').css({
              //      width: $percent + '%'
              //  });
                App.scrollTo($('.page-title'));
            }
            
            // default form wizard
            $('#'+formId+'_wiz').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    //return false;
                    
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }

                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li:visible').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#'+formId+'_wiz').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#'+formId+'_wiz').find('.button-previous').hide();
            $('#'+formId+'_wiz .button-submit').click(function () {
                if (form.valid() == true) {                
                    newhref = postUrl;
                    data = $('#'+formId).serializeArray();
                    display_screen_loader();
                    $.post( newhref, data, function( data ) {
                        
                        hide_screen_loader();     
                        if(data.status == 1){
                            $( ".page-content" ).load( data.url ); 
                        }      
                    });
                }    
            });

            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#country_list', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }

    };

}();

jQuery(document).ready(function() {
    //NewFormWizard.init();
});