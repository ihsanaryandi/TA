// Side bar

// Open
$('button.side-bar-toggler').on('click', () => {

	$('.side-bar-container').addClass('open')

})

// Close
$('.side-bar .close').on('click', function(){
	
	$(this).parent('.side-bar').parent('.side-bar-container').removeClass('open')

})

$('.side-bar-container .overlay').on('click', function(){
	
	$(this).parent().removeClass('open')	

})

$(document).on('keyup', function(e){
	
	if(e.keyCode === 27)
	{
		$('.side-bar-container').removeClass('open')
	}	

})

$('.category .sub-menu-opener').on('click', function(){

	const category = $(this).prev('a')

	const subCategory = $(this).parent('.category-name').next('.sub-category')

	// Run own elements action


	$(this).toggleClass('open')
	category.toggleClass('open')
	subCategory.toggleClass('open')
	

})