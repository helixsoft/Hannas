(function($){
	unloadScrollBars();
	function unloadScrollBars() {
	    document.documentElement.style.overflow = 'hidden';  // firefox, chrome
	    document.body.scroll = "no"; // ie only
	}
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
	var container = document.querySelector('#container');
	var msnry = new Masonry( container, {
	  // options
	  columnWidth: jQuery(document).width() > 800 ? 265 : jQuery(document).width() >= 600 ? 275 : 145 ,
	  gutter: 10,
	  itemSelector: '.item'
	});
})(jQuery);
	

