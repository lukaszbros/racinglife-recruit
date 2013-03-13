(function($) {
    jQuery.content = function(_menuSource, _error) { 
            if(_error !== undefined)
                error = _error;
            menuSource = _menuSource;
            showContent($('#menu ul li:first-child a:first-child').attr('href'));
            setEvents();
    };
    
    function showMessage(msg) {
        $('<div></div>')
        .text(msg.text)
        .addClass(msg.css)
        .hide()
        .appendTo($('#content'))
        .fadeIn(1500, function() {$(this).fadeOut(1500, function(){ $(this).remove();})});
    }
                        
    function showContent(link) {
        if(link != undefined) {
            $.get(link, function(data) {
                $('#file').html(data);
            }).fail(function(){ showMessage(error); showMenu(); });
        }
        else
            $('#file').html('Empty');
    }
            
    function setEvents() {
        $('#menu a').click(function(event){
            event.preventDefault();
            var link = $(this).attr('href');
            showContent(link);
        });
    }
    
    function printMenu(data) {
        var html = '<ul>';
        for(var name in data)
            html += '<li><a href="'+data[name]+'">'+name+'</a></li>';
        html += '</ul>';
        $('#menu').html(html);
    }
            
    function showMenu() {
        $.get(menuSource, function(data) {
            printMenu(jQuery.parseJSON(data));
            setEvents();
            });
    }
    
    var error = {text : 'Error', css : 'error'};
    var menuSource;   
})(jQuery);
