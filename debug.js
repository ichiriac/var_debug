
var start = function() {
    (function($) {
        $(document).delegate('.dbg-kw.dbg-object>em, .dbg-kw.dbg-array>em', 'click', function() {
            $(this).parent().find('>ul').first().slideToggle();
        });
    }(jQuery));
};
if ( typeof jQuery === 'undefined' ) {
    var jScript = document.createElement('script');
    jScript.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js';
    jScript.onload = start;
    document.getElementsByTagName('head')[0].appendChild(jScript);
} else {
    start();
}