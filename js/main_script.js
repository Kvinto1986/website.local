$(document).ready(function() {

    $('#slide').cycle({
        fx:'fade',
        rev:8
    });
    $('#slider_com').cycle({
        fx:'fade',
        rev:8,
        timeout:  12000
    });
    $.fn.animateText = function() {
        var string = this.text();
        return this.each(function(){
            var $this = $(this);
            $this.html(string.replace(/./g, '<span class="new">$&</span>'));
            $this.find('span.new').each(function(i, el){
                setTimeout(function(){ $(el).addClass('divOpacity'); }, 100 * i);
            });
        });
    };
    $('#text_live').show();
    $('#text_live').animateText();
    $('#drop_container_link').hover(function(){
        $('#drop_menu').show();
    });


$("#input_time").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
            .format( this.getAttribute("data-date-format") )
    )
}).trigger("change");
});

