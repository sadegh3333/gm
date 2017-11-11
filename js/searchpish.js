/* Make a ajax function for use ajax in site */

(function( $ ) {
    $(function() {
        $('.searchbutton').click(function() {  
            alert(123);
            //$('showLoading').css('display','block');
            jQuery('#showLoading').css('display','block');
            jQuery('.showcats').css('visibility','hidden');
            var fieldid =  $(this).attr('id') ;
            GetNews(fieldid);
        });
        function GetNews(fieldid){
            $.ajax({
                url:ajaxurl,
                type : "POST",
                data : {action: "catnews_ajax",fieldid:fieldid},
                success: function(response) {
              
                  
                   
               
                }
            });   
        }

    });
})(jQuery);

















