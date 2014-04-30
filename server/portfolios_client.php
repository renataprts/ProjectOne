<?php
include ("portfolios.php");



if(isset($_GET['portfolios'])){
	if(isset($_GET['portfolios_id'])){
		$portfoliosClass = new Portfolios();
		$portfolios_info = $portfoliosClass->get_portfolios_info($_GET['portfolios_id']);
	    echo json_encode($portfolios_info);
	}
}

if(isset($_POST['splashlink']) && isset($_POST['title']) && isset($_POST['description'])){
    $portfolios = new Portfolios();
	$id = $portfolios->insert_portfolios($_POST['splashlink'], $_POST['title'], $_POST['description']);
	echo $id;
}


if(isset($_GET['splashlink'])){
	$portfoliosClass = new Portfolios();
	$portfolios_info = $portfoliosClass->get_portfolios_splashlink($_GET['splashlink']);
	var_dump($portfolios_info);
	if($_GET['splashlink'] == $portfolios_info['splashlink']){
		//echo "I GOT THE SAME VALUE!";	
	//} else {
		//echo "I GOT WRONG VALUES!";	
	}
	
}

if(isset($_GET['title'])){
	$portfoliosClass = new Portfolios();
	$portfolios_info = $portfoliosClass->get_portfolios_title($_GET['title']);
	var_dump($portfolios_info);
	if($_GET['title'] == $portfolios_info['title']){
		//echo "I GOT THE SAME VALUE!";	
	//} else {
		//echo "I GOT WRONG VALUES!";	
	}
	
}


if(isset($_GET['description'])){
	$portfoliosClass = new Portfolios();
	$portfolios_info = $portfoliosClass->get_portfolios_description($_GET['description']);
	var_dump($portfolios_info);
	if($_GET['description'] == $portfolios_info['description']){
		//echo "I GOT THE SAME VALUE!";	
	//} else {
		//echo "I GOT WRONG VALUES!";	
	}
	
}


?>