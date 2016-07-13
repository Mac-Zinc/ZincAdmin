if(!jQuery)throw new Error("Time Picker requires jQuery");
var BFHTimePickerDelimiter=":",
BFHTimePickerModes= {
    am: "AM", pm: "PM"
}


+function(a) {
    "use strict";
    function b(a, b) {
        return a=String(a),
        1===a.length&&(a="0"+a),
        b=String(b),
        1===b.length&&(b="0"+b),
        a+BFHTimePickerDelimiter+b
    }
    function c() {
        var b;
        a(e).each(function(c) {
            return b=d(a(this)), b.hasClass("open")?(b.trigger(c=a.Event("hide.bfhtimepicker")), c.isDefaultPrevented()?!0: (b.removeClass("open").trigger("hidden.bfhtimepicker"), void 0)): !0
        }
        )
    }
    function d(a) {
        return a.closest(".bfh-timepicker")
    }
    var e="[data-toggle=bfh-timepicker]",
    f=function(b, c) {
        this.options=a.extend( {}
        , a.fn.bfhtimepicker.defaults, c),
        this.$element=a(b),
        this.initPopover()
    }
    ;
    f.prototype= {
        constructor:f,
        setTime:function() {
            var a,
            c,
            d,
            e,
            f,
            g,
            h;
            a=this.options.time,
            g="",
            h="",
            ""===a||"now"===a||void 0===a?(c=new Date, e=c.getHours(), f=c.getMinutes(), "12h"===this.options.mode&&(e>12?(e-=12, g=" "+BFHTimePickerModes.pm, h="pm"): (g=" "+BFHTimePickerModes.am, h="am")), "now"===a&&this.$element.find('.bfh-timepicker-toggle > input[type="text"]').val(b(e, f)+g), this.$element.data("hour", e), this.$element.data("minute", f), this.$element.data("mode", h)): (d=String(a).split(BFHTimePickerDelimiter), e=d[0], f=d[1], "12h"===this.options.mode&&(d=String(f).split(" "), f=d[0], h=d[1]===BFHTimePickerModes.pm?"pm": "am"), this.$element.find('.bfh-timepicker-toggle > input[type="text"]').val(a), this.$element.data("hour", e), this.$element.data("minute", f), this.$element.data("mode", h))
        }
        ,
        initPopover:function() {
            var b,
            c,
            d,
            g,
            h;
            b="",
            c="",
            d="",
            ""!==this.options.icon&&("right"===this.options.align?c='<span class="input-group-addon"><i class="'+this.options.icon+'"></i></span>': b='<span class="input-group-addon"><i class="'+this.options.icon+'"></i></span>', d="input-group"), g="", h="23", "12h"===this.options.mode&&(g='<td><div class="bfh-selectbox" data-input="'+this.options.input+'" data-value="am">'+'<div data-value="am">'+BFHTimePickerModes.am+"</div>"+'<div data-value="pm">'+BFHTimePickerModes.pm+"</div>"+"</div>", h="11"), this.$element.html('<div class="'+d+' bfh-timepicker-toggle" data-toggle="bfh-timepicker">'+b+'<input type="text" name="'+this.options.name+'" class="'+this.options.input+'" placeholder="'+this.options.placeholder+'" readonly>'+c+"</div>"+'<div class="bfh-timepicker-popover">'+'<table class="table">'+"<tbody>"+"<tr>"+'<td class="hour">'+'<input type="text" class="'+this.options.input+' bfh-number"  data-min="0" data-max="'+h+'" data-zeros="true" data-wrap="true">'+"</td>"+'<td class="separator">'+BFHTimePickerDelimiter+"</td>"+'<td class="minute">'+'<input type="text" class="'+this.options.input+' bfh-number"  data-min="0" data-max="59" data-zeros="true" data-wrap="true">'+"</td>"+g+"</tr>"+"</tbody>"+"</table>"+"</div>"), this.$element.on("click.bfhtimepicker.data-api touchstart.bfhtimepicker.data-api", e, f.prototype.toggle).on("click.bfhtimepicker.data-api touchstart.bfhtimepicker.data-api", ".bfh-timepicker-popover > table", function() {
                return!1
            }
            ),
            this.$element.find(".bfh-number").each(function() {
                var b;
                b=a(this), b.bfhnumber(b.data()), b.on("change", f.prototype.change)
            }
            ),
            this.$element.find(".bfh-selectbox").each(function() {
                var b;
                b=a(this), b.bfhselectbox(b.data()), b.on("change.bfhselectbox", f.prototype.change)
            }
            ),
            this.setTime(),
            this.updatePopover()
        }
        ,
        updatePopover:function() {
            var a,
            b,
            c;
            a=this.$element.data("hour"),
            b=this.$element.data("minute"),
            c=this.$element.data("mode"),
            this.$element.find(".hour input[type=text]").val(a).change(),
            this.$element.find(".minute input[type=text]").val(b).change(),
            this.$element.find(".bfh-selectbox").val(c)
        }
        ,
        change:function() {
            var b,
            c,
            e,
            f;
            return b=a(this),
            c=d(b),
            e=c.data("bfhtimepicker"),
            e&&"undefined"!==e&&(f="", "12h"===e.options.mode&&(f=" "+BFHTimePickerModes[c.find(".bfh-selectbox").val()]), c.find('.bfh-timepicker-toggle > input[type="text"]').val(c.find(".hour input[type=text]").val()+BFHTimePickerDelimiter+c.find(".minute input[type=text]").val()+f), c.trigger("change.bfhtimepicker")),
            !1
        }
        ,
        toggle:function(b) {
            var e,
            f,
            g;
            if(e=a(this), f=d(e), f.is(".disabled")||void 0!==f.attr("disabled"))return!0;
            if(g=f.hasClass("open"), c(), !g) {
                if(f.trigger(b=a.Event("show.bfhtimepicker")), b.isDefaultPrevented())return!0;
                f.toggleClass("open").trigger("shown.bfhtimepicker"),
                e.focus()
            }
            return!1
        }
    }
    ;
    var g=a.fn.bfhtimepicker;
    a.fn.bfhtimepicker=function(b) {
        return this.each(function() {
            var c, d, e;
            c=a(this), d=c.data("bfhtimepicker"), e="object"==typeof b&&b, this.type="bfhtimepicker", d||c.data("bfhtimepicker", d=new f(this, e)), "string"==typeof b&&d[b].call(c)
        }
        )
    }
    ,
    a.fn.bfhtimepicker.Constructor=f,
    a.fn.bfhtimepicker.defaults= {
        icon: "glyphicon glyphicon-time", align: "left", input: "form-control", placeholder: "", name: "", time: "now", mode: "24h"
    }
    ,
    a.fn.bfhtimepicker.noConflict=function() {
        return a.fn.bfhtimepicker=g,
        this
    }
    ;
    var h;
    a.valHooks.div&&(h=a.valHooks.div),
    a.valHooks.div= {
        get:function(b) {
            return a(b).hasClass("bfh-timepicker")?a(b).find('.bfh-timepicker-toggle > input[type="text"]').val(): h?h.get(b): void 0
        }
        ,
        set:function(b, c) {
            var d;
            if(a(b).hasClass("bfh-timepicker"))d=a(b).data("bfhtimepicker"),
            d.options.time=c,
            d.setTime(),
            d.updatePopover();
            else if(h)return h.set(b, c)
        }
    }
    ,
    a(document).ready(function() {
        a("div.bfh-timepicker").each(function() {
            var b;
            b=a(this), b.bfhtimepicker(b.data())
        }
        )
    }
    ),
    a(document).on("click.bfhtimepicker.data-api", c)
}