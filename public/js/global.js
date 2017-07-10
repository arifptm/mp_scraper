$(function(){


    
    $('[data-toggle="tooltip"]').tooltip();
    

});

/**************************
*
*   EXT - for the quotes
*
**************************/
(function($){
    $.fn.extend({ 
        //plugin name - rotaterator
        rotaterator: function(options) {

            var defaults = {
                fadeSpeed: 600,
                pauseSpeed: 100,
                child:null
            };

            var options = $.extend(defaults, options);

            return this.each(function() {
                var o =options;
                var obj = $(this);                
                var items = $(obj.children(), obj);
                items.each(function() {$(this).hide();})
                if(!o.child){var next = $(obj).children(':first');
            }else{var next = o.child;
            }
            $(next).fadeIn(o.fadeSpeed, function() {
                $(next).delay(o.pauseSpeed).fadeOut(o.fadeSpeed, function() {
                    var next = $(this).next();
                    if (next.length == 0){
                        next = $(obj).children(':first');
                    }
                    $(obj).rotaterator({child : next, fadeSpeed : o.fadeSpeed, pauseSpeed : o.pauseSpeed});
                })
            });
        });
        }
    });
})(jQuery);

$(function(){

    //home page quotes
    $('#quotes').rotaterator({fadeSpeed:1000, pauseSpeed:3000});

    //make text area bigger
    var textarea_height = $('textarea.expand').height();
    $('textarea.expand').focus(function () {
        $(this).animate({ height: "400px" }, 500);
    });    
    $('textarea.expand').focusout(function () {
        $(this).animate({ height: textarea_height }, 500);
    });

    
    $(document)
        .on('change', '.btn-file :file', function() {
            $('#file-select').attr('src', 'css/images/loading.png');
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label, input]);
    });


});

