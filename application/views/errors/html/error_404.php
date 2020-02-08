<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;		
	}

	body{
		font-family: sans-serif;
		height: 100vh;
		overflow: hidden;
	}

	#container{
		width: 90%;
		margin: auto;
		text-align: center;
	}

	h1{
		color: #428dc9;
		font-size: 12em;
		text-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
	}

	p{
		font-size: 20px;
	}

	.card{
		margin-top: 30px;
		display: inline-block;
		padding: 100px;
		transition: .3s ease;
		background-color: #fff;
		border-radius: 50%;
	}

	.card:hover{
		box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
	}

	.overlay{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		transition: .3s ease;
	}

	.card:hover + .overlay{
		background-color: rgba(0, 0, 0, 0.3);
	}

	a{
		display: inline-block;
		margin-top: 30px;
		font-size: 24px;
		text-decoration: none;
		color: #428dc9;
	}

	a:hover{
		opacity: .9;
	}

	</style>
</head>
<body>
	<div id="container">
		<div class="card">
			<h1><?= $heading; ?></h1>
			<p><?= $message; ?></p>
			<a href="#">&laquo; Go Back</a>
		</div>
		<div class="overlay"></div>
	</div>

	<script type="text/javascript">
		
		document.querySelector('a').addEventListener('click', e => {

			e.preventDefault();

			window.history.back()

		})

	</script>

</body>
</html>