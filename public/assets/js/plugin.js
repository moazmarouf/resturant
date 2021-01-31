/*global $*/
$(document).ready(function(){
    
    /**************** Index Loader *************/
    $(window).load(function(){
        $("#loader").fadeOut(1000,function(){
            $("#loader-wrapper").fadeOut(1000,function(){
                $("#loader-wrapper").remove();
            });
        });
    });

});