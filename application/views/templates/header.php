<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Poppins - Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<?= css('bootstrap/bootstrap'); ?>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">

	<!-- Custom CSS -->

	<?= css('utilities'); ?>
	<?= css('header'); ?>
	<?= css('main'); ?>
	<?= css('main_store'); ?>
	<?= css('main_product'); ?>
	<?= css('main_cart'); ?>
	<?= css('footer'); ?>

	<!-- <link rel="stylesheet" type="text/css" href="css/utilities.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css"> -->

</head>
<body>

	<!-- --------------HHeader-Section-------------- -->
<header>
	<nav class="moonve-nav">
		<div class="container main">
			<div class="brand">
				<a href="<?= base_url('moonve'); ?>">Moon<span>ve</span></a>
			</div>
			<div class="links desktop-only">
				<ul>
					<li><a href="<?= base_url('moonve/store'); ?>" class="link">All Products</a></li>
					<li><a href="#" class="link">Login</a></li>
					<li><a href="#" class="link">Register</a></li>
					<li>
						<a href="<?= base_url('moonve/cart'); ?>" class="link">
							Cart <i class="fas fa-shopping-cart"><p class="product-count">9</p></i>
						</a>
					</li>
				</ul>
			</div>
			<div class="side-bar-toggle mobile-only">
				<button class="side-bar-toggler" type="button"><i class="fas fa-bars"></i></button>
			</div>
		</div>
		<div class="desktop-only search-product">
			<form class="input-wrapper" action="<?= base_url('moonve/cart'); ?>" method="POST">
				<input class="search-input" type="text" name="search" placeholder="Search Product">
				<button class="search-button" type="submit"><i class="fas fa-search"></i></button>
			</form>
		</div>
		<div class="categories desktop-only">
			<div class="container">
				<ul class="category">
					<?php foreach($categories as $category) : ?>
						<li class="category-name">
							<a href="<?= base_url("products/$category->id/$category->category"); ?>" class="category-link"><?= $category->category; ?></a>
							<!-- <ul class="sub-category">
								<li><a href="#">4K Display</a></li>
								<li><a href="#">LED</a></li>
							</ul> -->
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</nav>
</header>