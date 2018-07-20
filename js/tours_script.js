$(document).ready(function() {
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
    $('#text_live1').show();
    $('#text_live1').animateText();
});
