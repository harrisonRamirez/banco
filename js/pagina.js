



var permanotice, tooltip, _alert;

    // This notice is used as a tooltip.
    var make_tooltip = function(){
        tooltip = new PNotify({
            title: "Tooltip",
            text: "I'm not in a stack. I'm positioned like a tooltip with JavaScript.",
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            },
            animate_speed: 100,
            opacity: .9,
            icon: "ui-icon ui-icon-comment",
            // Setting stack to false causes PNotify to ignore this notice when positioning.
            stack: false,
            auto_display: false
        });
        // Remove the notice if the user mouses over it.
        tooltip.get().mouseout(function(){
            tooltip.remove();
        });
    };
    // I put it in a function so I could show the source easily.
    make_tooltip();

    // This creates all those source buttons.
    $(".source").each(function(){
        var button = $(this);
        // Wrap the button in a container.
        var contain = $('<div class="btn-group" />');
        contain = button.wrap(contain).parent();
        // Add a source button.
        $('<button class="btn btn-default" title="Show source code.">{}</button>').click(function(){
            $(this).blur();
            var text = button.attr("onclick");
            if (!text && button.attr("onmouseover"))
                text = "// Mouse Over:\n"+button.attr("onmouseover")+"\n\n// Mouse Move:\n"+button.attr("onmousemove")+"\n\n// Mouse Out:\n"+button.attr("onmouseout");
            // IE needs this.
            if (text.toString) {
                text = text.toString();
                if (text.match(/^function (onclick|anonymous)[\n ]*\([^\)]*\)[\n ]*\{[\n\t ]*/))
                    text = text.replace(/^function (onclick|anonymous)[\n ]*\([^\)]*\)[\n ]*\{[\n\t ]*/, "").replace(/[\n\t ]*}[\n\t ]*$/, "");
            }
            // Is there a better way to do this?
            var dialog = $('<div class="modal fade"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">'+button.text()+' - Source</h4></div><div class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Ok, got it.</button></div></div></div></div>');
            $("<pre class=\"prettyprint\" />").text(js_beautify(text)).appendTo(dialog.find(".modal-body"));
            // Check if the code is just calling a function. Include that function.
            if (text.match(/^\w*\([^\)]*\);$/)) {
                var f_name = text.replace(/\(.*/g, "");
                text = window[f_name].toString();
                $("<pre class=\"prettyprint\" />").text(js_beautify(text)).appendTo(dialog.find(".modal-body"));
            }
            // Check if this is the tooltip button. Include the tooltip function.
            if (text.match(/tooltip\.open\(\);/)) {
                $("<pre class=\"prettyprint\" />").text(js_beautify(make_tooltip.toString())).appendTo(dialog.find(".modal-body"));
            }
            dialog.on("shown.bs.modal", function(){
                prettyPrint();
            }).on("hidden.bs.modal", function(){
                dialog.remove();
            }).modal();
        }).appendTo(contain);
    });
    prettyPrint(); // Format source in help.

    if ($.fn.themeswitcher) {
        $('#switcher-jqueryui').themeswitcher({imgpath: "includes/themeswitcher/images/"});
    } else {
        $('#switcher-jqueryui').html("Couldn't load theme switcher widget.");
    }
    // Navbar scrollspy.
    $('#navbar').scrollspy();
});




function show_rich() {
    new PNotify({
        title: '<span style="color: green;">Rich Content Notice</span>',
        text: '<span style="color: blue;">Look at my beautiful <strong>strong</strong>, <em>emphasized</em>, and <span style="font-size: 1.5em;">large</span> text.</span>'
    });
}

function consume_alert() {
    if (_alert) return;
    _alert = window.alert;
    window.alert = function(message) {
        new PNotify({
            title: 'Alert',
            text: message
        });
    };
}

function release_alert() {
    if (!_alert) return;
    window.alert = _alert;
    _alert = null;
}

function fake_load() {
    var cur_value = 1,
        progress;

    // Make a loader.
    var loader = new PNotify({
        //title: "Lowering the Moon",
        title: "Creating Series of Tubes",
        text: '<div class="progress progress-striped active" style="margin:0">\
<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">\
<span class="sr-only">0%</span>\
</div>\
</div>',
        //icon: 'fa fa-moon-o fa-spin',
        icon: 'fa fa-cog fa-spin',
        hide: false,
        buttons: {
            closer: false,
            sticker: false
        },
        history: {
            history: false
        },
        before_open: function(PNotify){
            progress = PNotify.get().find("div.progress-bar");
            progress.width(cur_value+"%").attr("aria-valuenow", cur_value).find("span").html(cur_value+"%");
            // Pretend to do something.
            var timer = setInterval(function(){
                //if (cur_value == 50) {
                //	loader.update({title: "Raising the Sun", icon: "fa fa-sun-o fa-spin"});
                //}
                if (cur_value >= 100) {
                    // Remove the interval.
                    window.clearInterval(timer);
                    loader.remove();
                    return;
                }
                cur_value += 1;
                progress.width(cur_value+"%").attr("aria-valuenow", cur_value).find("span").html(cur_value+"%");
            }, 65);
        }
    });
}

function dyn_notice() {
    var percent = 0;
    var notice = new PNotify({
        title: "Please Wait",
        type: 'info',
        icon: 'fa fa-spinner fa-spin',
        hide: false,
        buttons: {
            closer: false,
            sticker: false
        },
        opacity: .75,
        shadow: false,
        width: "170px"
    });

    setTimeout(function(){
        notice.update({title: false});
        var interval = setInterval(function(){
            percent += 2;
            var options = {
                text: percent+"% complete."
            };
            if (percent == 80)
                options.title = "Almost There";
            if (percent >= 100) {
                window.clearInterval(interval);
                options.title = "Done!";
                options.type = "success";
                options.hide = true;
                options.buttons = {
                    closer: true,
                    sticker: true
                };
                options.icon = 'picon picon-task-complete';
                options.opacity = 1;
                options.shadow = true;
                options.width = PNotify.prototype.options.width;
            }
            notice.update(options);
        }, 120);
    }, 2000);
}

function timed_notices(n) {
    var start_time = new Date().getTime(),
        end_time;
    var options = {
        title: "Notice Benchmark",
        text: "Testing notice speed.",
        animation: 'none',
        delay: 0,
        history: {
            history: false
        },
    };
    for (var i = 0; i < n; i++) {
        if (i + 1 == n) {
            options.after_close = function(PNotify){
                // Remove this callback.
                PNotify.update({
                    after_close: null
                });
                end_time = new Date().getTime();
                alert("Testing complete:\n\nTotal Notices: "+n+
                    "\nTotal Time: "+(end_time - start_time)+"ms ("+((end_time - start_time) / 1000)+"s)"+
                    "\nAverage Time: "+((end_time - start_time) / n)+"ms ("+((end_time - start_time) / n / 1000)+"s)")
            };
        }
        new PNotify(options);
    }
}

/*********** Custom Stacks ***********
* A stack is an object which PNotify uses to determine where
* to position notices. A stack has two mandatory variables, dir1
* and dir2. dir1 is the first direction in which the notices are
* stacked. When the notices run out of room in the window, they
* will move over in the direction specified by dir2. The directions
* can be "up", "down", "right", or "left". Stacks are independent
* of each other, so a stack doesn't know and doesn't care if it
* overlaps (and blocks) another stack. The default stack, which can
* be changed like any other default, goes down, then left. Stack
* objects are used and manipulated by PNotify, and therefore,
* should be a variable when passed. So, calling something like
*
* new PNotify({stack: {"dir1": "down", "dir2": "left"}});
*
* will **NOT** work. It will create a notice, but that notice will
* be in its own stack and may overlap other notices.
*/
var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
var stack_bottomleft = {"dir1": "right", "dir2": "up", "push": "top"};
var stack_custom = {"dir1": "right", "dir2": "down"};
var stack_custom2 = {"dir1": "left", "dir2": "up", "push": "top"};
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
/*********** Positioned Stack ***********
* This stack is initially positioned through code instead of CSS.
* This is done through two extra variables. firstpos1 and firstpos2
* are pixel values, relative to a viewport edge. dir1 and dir2,
* respectively, determine which edge. It is calculated as follows:
*
* - dir = "up" - firstpos is relative to the bottom of viewport.
* - dir = "down" - firstpos is relative to the top of viewport.
* - dir = "right" - firstpos is relative to the left of viewport.
* - dir = "left" - firstpos is relative to the right of viewport.
*/
var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 25, "firstpos2": 25};

function show_stack_topleft(type) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-topleft",
        stack: stack_topleft
    };
    switch (type) {
        case 'error':
            opts.title = "Oh No";
            opts.text = "Watch out for that water tower!";
            opts.type = "error";
            break;
        case 'info':
            opts.title = "Breaking News";
            opts.text = "Have you met Ted?";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "Good News Everyone";
            opts.text = "I've invented a device that bites shiny metal asses.";
            opts.type = "success";
            break;
    }
    new PNotify(opts);
};
function show_stack_bottomleft(type) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-bottomleft",
        stack: stack_bottomleft
    };
    switch (type) {
        case 'error':
            opts.title = "Oh No";
            opts.text = "Watch out for that water tower!";
            opts.type = "error";
            break;
        case 'info':
            opts.title = "Breaking News";
            opts.text = "Have you met Ted?";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "Good News Everyone";
            opts.text = "I've invented a device that bites shiny metal asses.";
            opts.type = "success";
            break;
    }
    new PNotify(opts);
};
function show_stack_bottomright(type) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-bottomright",
        stack: stack_bottomright
    };
    switch (type) {
        case 'error':
            opts.title = "Oh No";
            opts.text = "Watch out for that water tower!";
            opts.type = "error";
            break;
        case 'info':
            opts.title = "Breaking News";
            opts.text = "Have you met Ted?";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "Good News Everyone";
            opts.text = "I've invented a device that bites shiny metal asses.";
            opts.type = "success";
            break;
    }
    new PNotify(opts);
};
function show_stack_custom(type) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-custom",
        stack: stack_custom
    };
    switch (type) {
        case 'error':
            opts.title = "Oh No";
            opts.text = "Watch out for that water tower!";
            opts.type = "error";
            break;
        case 'info':
            opts.title = "Breaking News";
            opts.text = "Have you met Ted?";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "Good News Everyone";
            opts.text = "I've invented a device that bites shiny metal asses.";
            opts.type = "success";
            break;
    }
    new PNotify(opts);
};
function show_stack_custom2(type) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-custom2",
        stack: stack_custom2
    };
    switch (type) {
        case 'error':
            opts.title = "Oh No";
            opts.text = "Watch out for that water tower!";
            opts.type = "error";
            break;
        case 'info':
            opts.title = "Breaking News";
            opts.text = "Have you met Ted?";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "Good News Everyone";
            opts.text = "I've invented a device that bites shiny metal asses.";
            opts.type = "success";
            break;
    }
    new PNotify(opts);
};
function show_stack_bar_top(type) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-bar-top",
        width: "100%",
        stack: stack_bar_top
    };
    switch (type) {
        case 'error':
            opts.title = "Oh No";
            opts.text = "Watch out for that water tower!";
            opts.type = "error";
            break;
        case 'info':
            opts.title = "Breaking News";
            opts.text = "Have you met Ted?";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "Good News Everyone";
            opts.text = "I've invented a device that bites shiny metal asses.";
            opts.type = "success";
            break;
    }
    new PNotify(opts);
};
function show_stack_bar_bottom(type) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-bar-bottom",
        cornerclass: "",
        width: "70%",
        stack: stack_bar_bottom
    };
    switch (type) {
        case 'error':
            opts.title = "Oh No";
            opts.text = "Watch out for that water tower!";
            opts.type = "error";
            break;
        case 'info':
            opts.title = "Breaking News";
            opts.text = "Have you met Ted?";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "Good News Everyone";
            opts.text = "I've invented a device that bites shiny metal asses.";
            opts.type = "success";
            break;
    }
    new PNotify(opts);
};
function show_stack_context(type) {
    if (typeof stack_context === "undefined")
        stack_context = {"dir1": "down", "dir2": "left", "context": $("#stack-context")};
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        stack: stack_context
    };
    switch (type) {
        case 'error':
            opts.title = "Oh No";
            opts.text = "Watch out for that water tower!";
            opts.type = "error";
            break;
        case 'info':
            opts.title = "Breaking News";
            opts.text = "Have you met Ted?";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "Good News Everyone";
            opts.text = "I've invented a device that bites shiny metal asses.";
            opts.type = "success";
            break;
    }
    new PNotify(opts);
};
function show_stack_info() {
    var modal_overlay;
    if (typeof info_box != "undefined") {
        info_box.open();
        return;
    }
    info_box = new PNotify({
        title: "PNotify Stacks",
        text: "Stacks are used to position notices and determine where new notices will go when they're created. Each notice that's placed into a stack will be positioned related to the other notices in that stack. There is no limit to the number of stacks, and no limit to the number of notices in each stack.",
        type: "info",
        icon: "fa fa-bars",
        hide: false,
        history: {
            history: false
        },
        stack: false,
        after_open: function(notice){
            // Position this notice in the center of the screen.
            notice.get().css({
                "top": ($(window).height() / 2) - (notice.get().height() / 2),
                "left": ($(window).width() / 2) - (notice.get().width() / 2)
            });
            // Make a modal screen overlay.
            if (modal_overlay) {
                modal_overlay.appendTo("body").addClass("in");
            } else {
                modal_overlay = $("<div />", {
                    "class": "modal-backdrop fade"
                }).appendTo("body").click(function(){
                    notice.remove();
                }).addClass("in");
            }
        },
        before_close: function(){
            modal_overlay.removeClass("in");
        },
        after_close: function(){
            modal_overlay.detach();
        }
    });
};


