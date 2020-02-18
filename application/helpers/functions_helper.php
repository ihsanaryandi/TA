<?php 


// Routes to asset folder
function css($file)
{

	$file_explode = explode('.', $file);

	$extension = end($file_explode);

	if($extension === 'css')
	{
		
		return '<link rel="stylesheet" type="text/css" href="' . base_url('assets/css/' . $file) . '">';

	}
	else
	{
		
		return '<link rel="stylesheet" type="text/css" href="' . base_url('assets/css/' . $file . '.css') . '">';

	}


}

function js($file)
{

	$file_explode = explode('.', $file);

	$extension = end($file_explode);

	if($extension === 'js')
	{
		
		return '<script type="text/javascript" src="' . base_url('assets/js/' . $file) . '"></script>';

	}
	else
	{
		
		return '<script type="text/javascript" src="' . base_url('assets/js/' . $file . '.js') . '"></script>';

	}

}

function img($file)
{

	return base_url('assets/img/' . $file);

}

function _post()
{
	echo '<input type="hidden" value="POST" />';
}

function _delete()
{
	echo '<input type="hidden" value="DELETE" />';
}


function request_method($method)
{

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		$_SERVER['REQUEST_METHOD'] = strtoupper($method);
		return;
	}
	else
	{
		back();
		die;
	}
	
}

function back()
{

	echo '<script>window.history.back()</script>';
	die;

}



?>