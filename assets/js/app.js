const baseURL = document.querySelector('meta[name=baseURL]').getAttribute('content');
const img = baseURL + 'assets/img/';

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

// --------------Rupiah---------------
function formatRupiah(angka, prefix){
	let number_string = angka.toString().replace(/[^,\d]/g, ''),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}

	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

// ---------------Quantity--------------
if($('.quantity').length != 0){

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

// ------------Filtering-Products------------
if(document.querySelector('main.store'))
{
	const categories = document.querySelectorAll('.store #category .radio input[type=radio]');
	const brands = document.querySelectorAll('.store #brand .radio input[type=radio]');
	const sortBy = document.querySelector('#sortBy');
	const priceRange = document.querySelector('#priceRange');
	const searchForm = document.querySelector('#searchForm');
	const searchInput = searchForm.querySelector('.search-input');
	const resetBtn = document.querySelector('#resetFilter');
	const priceDisplay = document.querySelector('#priceDisplay');

	function requestProducts()
	{
		const category = document.querySelector('.store #category .radio input[type=radio]:checked');
		const brand = document.querySelector('.store #brand .radio input[type=radio]:checked');
		const price = (arguments[0].price != undefined) ? arguments[0].price : '';
		const categoryVal = (category != null) ? category.value : '';
		const brandVal = (brand != null) ? brand.value : '';
		const searchVal = (searchInput != null) ? searchInput.value : '';

		fetch(baseURL + 'moonve/getProducts', {
			method: 'POST',
			headers: {
				"Content-Type": "application/json"
			},
			body: JSON.stringify({
				search: searchVal,
				category: categoryVal,
				brand: brandVal,
				price
			})
		}).then(res => res.json())
		  .then(products => {

		  	document.querySelector('#allProducts').innerHTML = '';

		 	products.forEach(product => {	

		  	document.querySelector('#allProducts').innerHTML += `<div class="col-lg-4 col-md-4 col-sm-6 my-2">
																	<div class="product-card">
																		<div class="product-img">
																			<a href="${baseURL + 'moonve/detail/' + product.product_id}">
																				<img src="${img + product.img}">
																			</a>
																		</div>
																		<div class="product-body">
																			<p class="product-category">${product.category}</p>
																			<a class="product-name" href="${baseURL + 'moonve/detail/' + product.product_id}">${product.product_name}</a>
																			<h4 class="product-price">Rp.${formatRupiah(product.product_price)}</h4>
																			<div class="product-rating">
																				<p class="like">
																					<i class="fas fa-thumbs-up"></i>
																					<span>120</span>
																				</p>
																				<p class="dislike">
																					<i class="fas fa-thumbs-down"></i>
																					<span>20</span>
																				</p>
																			</div>
																			<div class="product-btns">
																				<a class="btn-add-to-cart" href="${baseURL + 'moonve/detail/' + product.product_id}">Add To Cart</a>
																			</div>
																		</div>
																	</div>
																</div>`;
			})

		  })

	}

	resetFilter.addEventListener('click', e => {

		e.preventDefault();

		categories.forEach(category => category.checked = false)
		brands.forEach(brand => brand.checked = false)
		searchInput.value = '';
		priceRange.value = '0';

		const price = parseInt(priceRange.value * 50000)
		requestProducts(price);

	})

	priceRange.addEventListener('change', e => {

		const price = parseInt(priceRange.value * 50000)
		priceDisplay.innerHTML = 'Rp.' + formatRupiah(price)

		requestProducts({price});

	})

	categories.forEach(category => {

		category.addEventListener('click', requestProducts);

	})

	brands.forEach(brand => {

		brand.addEventListener('click', requestProducts);

	})

	searchForm.addEventListener('submit', e => {

		e.preventDefault();

		requestProducts();

	})

}

// ------------Moonve-Modal------------
if(document.querySelectorAll('[data-mvmodal]'))
{

	const modals = document.querySelectorAll('.moonve-modal');
	
	const modalTogglers = document.querySelectorAll('[data-mvmodal]');

	const sideBar = document.querySelector('.side-bar-container');

	const modalTogglers_sideBar = sideBar.querySelectorAll('[data-mvmodal]');

	modalTogglers.forEach(toggle => {

		toggle.addEventListener('click', e => {

			e.preventDefault();

			const modalTarget = toggle.dataset.mvmodal;
			
			document.querySelector('.moonve-modal' + modalTarget).classList.add('active');

		})

	})

	modals.forEach(modal => {

		let modalCloses = modal.querySelectorAll('[data-close]');

		if(modalCloses){

			modalCloses.forEach(close => {

				close.addEventListener('click', e => {

					e.preventDefault();

					if(close.dataset.close == "true")
					{
						modal.classList.remove('active');
					}

				})

			})

		}

	})

	modalTogglers_sideBar.forEach(toggle => {

		toggle.addEventListener('click', e => {

			e.preventDefault();

			sideBar.classList.remove('open');

		})

	})

}
