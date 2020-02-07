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


// ---------------Quantity--------------
if($('.quantity')){

	const input = $('#quantityInput');
	const increase = $('#increase');  
	const decrease = $('#decrease');  
	const colorSelect = $('#colorSelect');
	let valLength = parseInt(input.data('length'));

	input.on('keyup', e => {
		
		let val = input.val();

		input.val(val.replace(/\D/, ''));

		if(val > valLength){
			
			input.val(valLength)

		}

	});

	increase.on('click', () => {

		let val = input.val();

		if(parseInt(val) >= valLength)
		{
			input.val(valLength);
			return;
		}

		if(val == '')
		{
			input.val(1);
			return;
		}

		let newVal = parseInt(val) + 1;

		input.val(newVal)

	});

	decrease.on('click', () => {

		let val = input.val();

		if(parseInt(val) <= 1 || !val){
			input.val(1);
			return;
		}

		let newVal = parseInt(val) - 1;

		input.val(newVal);

	});

	colorSelect.on('change', (e) => {

		let stock = $('#colorSelect option[data-stock]:checked').data('stock');

		input.attr('data-length', stock);

		valLength = parseInt(stock);

		input.val(1)

	})

}