$(function(){
   function fetchHtml(){
        var html = $(".html ").val();
       return html;
   } 
    function fetchCss(){
        var css = $(".css ").val();
       return css;
   } 
    $(".innerbox").on("keyup", function(){
        var target = $("#live_update")[0].contentWindow.document;
        target.open();
        target.close(); 
        
        var html = fetchHtml();
        var css = fetchCss();
        
        $("body", target).append(html);
        $("head", target).append("<style>"+css+"</style>");
    });
});