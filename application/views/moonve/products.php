<!-- -------------------Main-Section-------------------- -->

	<main class="store">
		<section class="store">
			<div class="container">
				<div class="row">
					
					<!-- ------------Aside------------ -->
					<aside class="col-lg-3">
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<form>
								<ul class="aside-items">
									<?php foreach($categories_aside as $category) : ?>
										<li>
											<div class="d-inline-block" id="category">
												<div class="radio">
													<input type="radio" name="category" id="<?= $category->category; ?>" value="<?= $category->category_id; ?>">
													<span></span>
												</div>
												<label for="<?= $category->category; ?>">
													<?= $category->category; ?> 
													<small>( <?= totalProductsByCategory($category->category_id); ?> )</small>
												</label>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							</form>
						</div>

						<div class="aside">
							<h3 class="aside-title">Brands</h3>
							<form>
								<ul class="aside-items">
									<?php foreach($brands as $brand) : ?>
										<li>
											<div class="d-inline-block" id="brand">
												<div class="radio">
													<input type="radio" name="brand" id="<?= $brand->brand; ?>">
													<span></span>
												</div>
												<label for="<?= $brand->brand; ?>">
													<?= $brand->brand; ?> 
													<small>( <?= totalProductsByBrand($brand->brand_id); ?> )</small>
												</label>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							</form>
						</div>

						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<form class="price-range">
								<input class="custom-range" type="range" name="range" id="priceRange">
								<small class="text-muted">
									Price : 
									<span>Rp.2.000.000</span>
								</small>
							</form>
						</div>
					</aside>



					<!-- --------------Filter-------------- -->
					<div class="col-lg-9">
						<div class="filter">
							<form>
								<div class="sort-by">
									<select id="sortBy">
										<option>Sort 1</option>
										<option>Sort 2</option>
										<option>Sort 3</option>
										<option>Sort 4</option>
									</select>
								</div>
							</form>
						</div>

						<div class="row">
							<?php foreach($products as $product) : ?>
								<div class="col-lg-4 col-md-4 col-sm-6 my-2">
									<div class="product-card">
										<div class="product-img">
											<a href="<?= base_url("moonve/detail/$product->product_id"); ?>">
												<img src="<?= img($product->img); ?>">
											</a>
										</div>
										<div class="product-body">
											<p class="product-category"><?= $product->category; ?></p>
											<a class="product-name" href="<?= base_url("moonve/detail/$product->product_id"); ?>"><?= $product->product_name; ?></a>
											<h4 class="product-price">Rp.<?= number_format($product->product_price); ?></h4>
											<!-- <del class="old-price">Rp.3.000.000</del> -->
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
												<a class="btn-add-to-cart" href="<?= base_url("moonve/detail/$product->product_id"); ?>">Add To Cart</a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>