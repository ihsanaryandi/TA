<!-- ------------Side-Bar------------- -->

<div class="side-bar-container">
	<div class="overlay"></div>
	<div class="side-bar mobile-only">
		<div class="close">&times</div>
		<form>
			<div class="search-product">
				<input type="text" name="search" class="search-input" placeholder="Search Product">
				<button class="search-button"><i class="fas fa-search"></i></button>
			</div>
		</form>
		<div class="links">
			<h4 class="side-bar-title">Menu</h4>
			<ul>
				<li><a href="<?= base_url('moonve/products'); ?>" class="link">All Products</a></li>
				<li><a href="#" class="link" data-mvmodal="#loginModal">Login</a></li>
				<li><a href="<?= base_url('auth/register'); ?>" class="link">Register</a></li>
				<li>
					<a href="#" class="link">
						Cart <i class="fas fa-shopping-cart"><p class="product-count">9</p></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="categories">
			<h4 class="side-bar-title">Categories</h4>
			<div class="category">
				<?php foreach($categories as $category) : ?>
					<div class="category-name mb-3">
						<a href="<?= base_url("moonve/products/$category->category_id/$category->category"); ?>"><?= $category->category; ?></a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>