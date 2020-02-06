<!-- ----------------Main-Section------------------ -->
<main class="cart">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="products">
					<h4>All Products</h4>
					<div class="divider"></div>
					<div class="cart-product">
						<div class="cart-product-img">
							<i class="fas fa-fw fa-times delete"></i>
							<img src="<?= img('computer1.jpg'); ?>">
						</div>
						<div class="cart-product-body">
							<a href="#" class="product-name mb-1">Product name goes here</a>
							<h2 class="product-price">
								Rp.2.000.000 
								<del class="old-price">Rp.3.999.999</del>
							</h2>
							<div class="mb-2">
								<p class="product-stock">In Stock</p>
								<!-- <p class="product-stock">10 Remains</p> -->
							</div>
							<div>
								<div class="quantity d-inline-block" style="width: 40%;">
									<div class="custom-input-group">
										<label for="quantity">QTY</label>
										<input type="text" name="quantity" id="quantity">
										<span class="increase"><i class="fas fa-plus"></i></span>
										<span class="decrease"><i class="fas fa-minus"></i></span>
									</div>
								</div>
								<p class="total d-inline-block ml-2">Total : <span>Rp.4.000.000</span></p>
							</div>
							<div class="mt-2">
								<a href="#" class="category-name mr-3">Category</a>
								<a href="#" class="store-name">Adidas Store</a>
							</div>
							<p class="notes mt-2 d-inline-block">Send message for seller</p>
						</div>
					</div>
					<div class="cart-product">
						<div class="cart-product-img">
							<i class="fas fa-fw fa-times delete"></i>
							<img src="<?= img('computer1.jpg'); ?>">
						</div>
						<div class="cart-product-body">
							<a href="#" class="product-name mb-1">Product name goes here</a>
							<h2 class="product-price">
								Rp.2.000.000 
								<del class="old-price">Rp.3.999.999</del>
							</h2>
							<div class="mb-2">
								<p class="product-stock">In Stock</p>
								<!-- <p class="product-stock">10 Remains</p> -->
							</div>
							<div>
								<div class="quantity d-inline-block" style="width: 40%;">
									<div class="custom-input-group">
										<label for="quantity">QTY</label>
										<input type="text" name="quantity" id="quantity">
										<span class="increase"><i class="fas fa-plus"></i></span>
										<span class="decrease"><i class="fas fa-minus"></i></span>
									</div>
								</div>
								<p class="total d-inline-block ml-2">Total : <span>Rp.4.000.000</span></p>
							</div>
							<div class="mt-2">
								<a href="#" class="category-name mr-3">Category</a>
								<a href="#" class="store-name">Adidas Store</a>
							</div>
							<p class="notes mt-2 d-inline-block">Send message for seller</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="cart-buy">
					<h4 class="text-center mb-4">Detail</h4>
					<div class="buy-detail d-flex justify-content-between">
						<p>Product Count</p>
						<span>2</span>
					</div>
					<div class="buy-detail d-flex justify-content-between">
						<p>Price Total</p>
						<span>Rp.4.000.000,00</span>
					</div>
					<button class="moonve-btn mb-1">Buy Now</button>
				</div>
			</div>
		</div>
	</div>
</main>