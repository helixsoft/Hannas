(function($){
	$( '#dl-menu' ).dlmenu();
	$( '#blog-menu' ).dlmenu();
	if( !device.tablet() && !device.mobile() ) {
		$('.toggle-comment').on('click',function(){
			if($('.comment-area').css('display')=='none'){
				$('.toggle-comment span').html('HIDE');
			}if($('.comment-area').css('display')=='block'){
				$('.toggle-comment span').html('SHOW');
			}
			$('.comment-area').slideToggle( "slow" );
		});
	}else{
		$('.toggle-comment span').html('');
		$('.comment-area').show();
	}
	$(".featuredVideo").fitVids();
	// Have you set up masonry before setting up infinite scroll?
    var $container =$('#container');
    $container.imagesLoaded(function(){
      $container.masonry({
        columnWidth: jQuery(document).width() > 800 ? 255 : jQuery(document).width() >= 600 ? 275 : 145 ,
		gutter: jQuery(document).width() > 800 ? 20 : jQuery(document).width() >= 600 ? 10 : 10 ,
		itemSelector: '.item'
      });
    });

    var $icontainer =$('#icontainer');
    $icontainer.imagesLoaded(function(){
      $icontainer.masonry({
        columnWidth: jQuery(document).width() > 800 ? 255 : jQuery(document).width() >= 600 ? 275 : 145 ,
    gutter: jQuery(document).width() > 800 ? 20 : jQuery(document).width() >= 600 ? 10 : 10 ,
    itemSelector: '.item'
      });
    });

    $container.infinitescroll({
      navSelector  : '.nav-previous',    // selector for the paged navigation 
      nextSelector : '.nav-previous a',  // selector for the NEXT link (to page 2)
      itemSelector : '.item',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: '',
          img: 'http://i.imgur.com/6RMhx.gif'
        }
      },
      // trigger Masonry as a callback
      function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they're ready
          $newElems.animate({ opacity: 1 });
          $container.masonry( 'appended', $newElems, true ); 
        });
      }
    );
})(jQuery);

	

