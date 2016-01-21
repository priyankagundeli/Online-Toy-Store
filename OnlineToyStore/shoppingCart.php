<?php session_start();

	if(isset($_GET['id']) and isset($_GET['name']) and isset($_GET['cat']) and isset($_GET['rate']))
	{
		//add item
		$_SESSION['cart1'][$_GET['id']] = array("id"=>$_GET['id'],"nm"=>$_GET['name'],"cat"=>$_GET['cat'],"rate"=>$_GET['rate'],"qty"=>"1");
		header("location: viewcart.php");
		
	}
	/*else if(isset($_GET['id']))
	{
		//del a item
		$id = $_GET['id'];
		unset($_SESSION['cart1'][$id]);
		header("location: viewcart.php");
	}*/
	else if(!empty($_POST))
	{
		//update qty
		foreach($_POST as $id=>$val)
		{
			$_SESSION['cart1'][$id]['qty']=$val;
			header("location: viewcart.php");
		}
		
	}



?>