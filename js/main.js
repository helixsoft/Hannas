$(document).ready(function(){
	$('.toggle-comment').on('click',function(){
		if($('.comment-area').css('display')=='none'){
			$('.toggle-comment span').html('HIDE');
		}if($('.comment-area').css('display')=='block'){
			$('.toggle-comment span').html('SHOW');
		}
		$('.comment-area').slideToggle( "slow" );
	});
	var container = document.querySelector('#container');
	var msnry = new Masonry( container, {
	  // options
	  columnWidth: 265,
	  gutter: 10,
	  itemSelector: '.item'
	});
});


