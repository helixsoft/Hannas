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
	//set the container that Masonry will be inside of in a var
    var container = document.querySelector('#container');
    //create empty var msnry
    var msnry;
    // initialize Masonry after all images have loaded
    imagesLoaded( container, function() {
        msnry = new Masonry( container, {
              columnWidth: jQuery(document).width() > 800 ? 265 : jQuery(document).width() >= 600 ? 275 : 145 ,
			  gutter: 10,
			  itemSelector: '.item'
        });
    });
	/*
	var container = document.querySelector('#container');
	var msnry = new Masonry( container, {
	  // options
	  columnWidth: jQuery(document).width() > 800 ? 265 : jQuery(document).width() >= 600 ? 275 : 145 ,
	  gutter: 10,
	  itemSelector: '.item'
	});*/
	var $container = $('#container');
	$container.infinitescroll({
	  navSelector  : '.nav-previous',    // selector for the paged navigation 
	  nextSelector : '.nav-previous a',  // selector for the NEXT link (to page 2)
	  itemSelector : '.item',     // selector for all items you'll retrieve
	  loading: {
	      finishedMsg: 'No more pages to load.',
	      img: 'http://i.imgur.com/6RMhx.gif'
	    }
	  },
	  // trigger Masonry as a callback
	  function( newElements ) {
	    var $newElems = $( newElements );
	    $container.masonry( 'appended', $newElems );
	  });
})(jQuery);

	

