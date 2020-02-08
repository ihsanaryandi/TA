<!-- ---------------Main-Section-------------- -->
	<main class="product">
		<section class="product-detail">
			<div class="container">
				<div class="row">

					<div class="col-lg-6 col-md-6 mb-4">
						<div class="showcase">
							<div id="productShowcase" class="carousel slide" data-ride="carousel">
							   <ol class="carousel-indicators">
							   	 <?php for($i = 0; $i < count($images); $i++) : ?>
								     <li data-target="#productShowcase" data-slide-to="<?= $i; ?>" class="<?= ($i == 0) ? 'active' : ''; ?>"></li>
								 <?php endfor; ?>
							   </ol>
							   <div class="carousel-inner">
							   	 <?php $i = 0; foreach($images as $image) : ?>
								     <div class="carousel-item <?= ($i++ == 0) ? 'active' : ''; ?>">
								      	<img src="<?= img($image->img); ?>" class="d-block w-100" alt="...">
								     </div>
								 <?php endforeach; ?>
							   </div>
							   <a class="carousel-control-prev" href="#productShowcase" role="button" data-slide="prev">
							     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							     <span class="sr-only">Previous</span>
							   </a>
							   <a class="carousel-control-next" href="#productShowcase" role="button" data-slide="next">
							     <span class="carousel-control-next-icon" aria-hidden="true"></span>
							     <span class="sr-only">Next</span>
							   </a>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6">
						<form action="" method="POST">
						<div class="details">
							<h1 class="product-name"><?= $product->product_name; ?></h1>
							<div class="row align-items-center">
								<div class="col-lg-8 col-sm-8">
									<h3 class="product-price">Rp.<?= number_format($product->product_price); ?></h3>
									<!-- <del class="old-price">Rp.3.000.000</del> -->
								</div>
								<div class="col-lg-3 col-sm-3">
									<!-- If the count of stock is bigger than 10  -->
									<h5 class="product-stock"><?= ($product->product_stock > 10) ? 'In Stock' : "$product->product_stock Remains"; ?></h5>
									<!-- -------------------------------- -->

									<!-- if the count of stock is less than 10 -->
									<!-- <h5 class="product-stock">10 Remains</h5> -->
									<!-- -------------------------------- -->

								</div>
							</div>
							<p class="product-description">
								<?= $product->product_description; ?>
							</p>
							<div class="row justify-content-center">

								<div class="col-lg-4 col-md-6 col-sm-4 col-5 my-2">
									<div class="quantity">
										<div class="custom-input-group">
											<label for="">QTY</label>
											<input type="text" name="quantity" id="quantityInput" value="1" data-length="<?= $colors[0]->stock; ?>">
											<span class="increase" id="increase">
												<i class="fas fa-plus"></i>
											</span>
											<span class="decrease" id="decrease"><i class="fas fa-minus"></i></span>
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6 col-7 my-2">
									<div class="colors">
										<div class="custom-input-group">
											<label for="">Color</label>
											<select name="color" id="colorSelect">
												<?php $i = 0; foreach($colors as $color) : ?>
													<option data-stock="<?= $color->stock; ?>"><?= $color->color; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

							</div>	
							<div class="my-4">
								<p class="detail">
									Colors Available :
									<?php foreach($colors as $color) : ?>
										<span class="color"><?= "$color->color ($color->stock)"; ?></span>
									<?php endforeach; ?>
								</p>
								<p class="detail">
									Category : 
									<a href="#"><?= $product->category; ?></a>
								</p>
								<p class="detail">
									Store Name :
									<a href="#"><?= $product->store_name; ?></a>
								</p>
								<p class="detail">
									Call :
									<span><?= $product->telephone; ?></span>
								</p>
							</div>
							<div class="product-rating text-center">
								<p class="like">
									<i class="fas fa-thumbs-up"></i>
									<span>120</span>
								</p>
								<p class="dislike">
									<i class="fas fa-thumbs-down"></i>
									<span>20</span>
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="note">
					<label for="">Notes : </label>
					<textarea name="note" placeholder="Send a message for seller here..."></textarea>
				</div>

				<button class="moonve-btn" type="submit">Add to Cart <i class="fas fa-shopping-cart"></i></button>
				</form>
				<hr>

				<div class="specification my-5">
					<h4 class="mb-4">Spesifications</h4>
					<ul>
						<?php if($specs) : ?>

							<?php foreach($specs as $spec) : ?>
								<li><?= $spec->spec; ?></li>
							<?php endforeach ?>

							<?php else : ?>
								<li>There is no specifications in this product</li>
						<?php endif; ?>
					</ul>
					<!-- <h5 class="text-center my-5">There is not specification</h5> -->
				</div>

				<?php if($seller_products) : ?>
					
					<div class="other-product my-5">
						<h4 class="mb-4">Other Products in <?= $product->store_name; ?></h4>
						<div class="row">
							<?php foreach($seller_products as $seller_product) : ?>
								<div class="col-lg-3 col-md-4 col-sm-6 my-2">
									<div class="product-card">
										<div class="product-img">
											<a href="<?= base_url("moonve/detail/$seller_product->product_id"); ?>">
												<img src="<?= img($seller_product->img); ?>">
											</a>
											<div class="product-label">
												<span class="sale">-30%</span>
												<span class="new">NEW</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category"><?= $seller_product->category; ?></p>
											<a class="product-name" href="<?= base_url("moonve/detail/$seller_product->product_id"); ?>"><?= $seller_product->product_name; ?></a>
											<h4 class="product-price">Rp.2.000.000 <del class="old-price">Rp.<?= number_format($seller_product->product_price); ?></del></h4>
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
												<a class="btn-add-to-cart" href="<?= base_url("moonve/detail/$seller_product->product_id"); ?>">Add To Cart</a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<?php else : ?>

						<hr>

				<?php endif; ?>

				

				<?php if($related_products) : ?>
					<hr>
					<div class="related-product my-5">
						<h4 class="mb-4">Related Products</h4>
						<div class="row">
							<?php foreach($related_products as $related_product) : ?>
								<div class="col-lg-3 col-md-4 col-sm-6 my-2">
									<div class="product-card">
										<div class="product-img">
											<a href="<?= base_url("moonve/detail/$related_product->product_id"); ?>">
												<img src="<?= img($related_product->img); ?>">
											</a>
										</div>
										<div class="product-body">
											<p class="product-category"><?= $related_product->category; ?></p>
											<a class="product-name" href="<?= base_url("moonve/detail/$related_product->product_id"); ?>"><?= $related_product->product_name; ?></a>
											<h4 class="product-price">Rp.2.000.000 <del class="old-price">Rp.<?= number_format($related_product->product_price); ?></del></h4>
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
												<a class="btn-add-to-cart" href="<?= base_url("moonve/detail/$related_product->product_id"); ?>">Add To Cart</a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>		
			</div>
		</section>
	</main>