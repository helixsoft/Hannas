$(document).ready(function(){
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
	/* only play video on desktop devices */
	if( !device.tablet() && !device.mobile() ) {
		var container = document.querySelector('#container');
		var msnry = new Masonry( container, {
		  // options
		  columnWidth: $(document).width() > 800 ? 265 : $(document).width() >= 600 ? 275 : 145 ,
		  gutter: 10,
		  itemSelector: '.item'
		});
	}
});


