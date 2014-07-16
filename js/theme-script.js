(function($){
    
    $(document).ready(function(){
        //make all videos in content fit withing their container
        $('.entry-content').fitVids();
        
        //initiate fancybox on anything with a .fancybox class
        if($('.fancybox').size()){
            $('.fancybox').fancybox();
        }        
        
        //setup each carousel on the page assuming they all have the same class name
        if($('.carousel').size()){
            $.each('.carousel', function(index, elem){
               $(this).carousel({
                   interval : 5000, //The amount of time to delay between automatically cycling an item. If false, carousel will not automatically cycle.
                   pause : "hover", //Pauses the cycling of the carousel on mouseenter and resumes the cycling of the carousel on mouseleave
                   wrap : true //Whether the carousel should cycle continuously or have hard stops.
               });
            });
        }
       
       
       //mobile menu action
       $('#nav-toggle').on('click', function(e){
            $('nav').slideToggle();
            $('.sub-menu').slideUp();
            e.preventDefault();
       });
       $('nav li.menu-item-has-children > a').on('click', function(e){
           if($(this).parent('li').children('.sub-menu').is(':visible')){
               return;
           } else {
               $(this).parent('li').children('.sub-menu').slideDown();
               e.preventDefault();
           }
           
       });
    });//document.ready
})(jQuery);


