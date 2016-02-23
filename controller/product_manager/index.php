<?php
	require('../../model/database.php');
	require('../../model/product_db.php');
	require('../../model/category_db.php');
	
	$action = filter_input(INPUT_POST, 'action');
	

	
	
	if ($action == NULL) {
	    $action = filter_input(INPUT_GET, 'action');
	    if ($action == NULL) {
	        $action = 'list_members';
	    }
	}

	
	if ($action == 'list_members') {
		
		
	    $team_id = filter_input(INPUT_GET, 'team_id', FILTER_VALIDATE_INT);
		
	    if ($team_id == NULL || $team_id == FALSE) {
	        $team_id = 1;
	    }
	    $team_name = get_team_name($team_id);
	    $teams = get_teams();
	    $member = get_member_by_team($team_id);
	    include('../../view/product_manager/product_list.php');
	    
	    
	} else if ($action == 'delete_product') {
		

	    $product_id = filter_input(INPUT_POST, 'product_id',  FILTER_VALIDATE_INT);
	    $team_id = filter_input(INPUT_POST, 'team_id',FILTER_VALIDATE_INT);

	    if ($team_id == NULL || $team_id == FALSE ||
	        $product_id == NULL || $product_id == FALSE) {
	        $error = "Missing or incorrect product id or category id.";
	        include('../../public/error.php');
	    } else { 
	        delete_product($product_id);
	        header("Location: .?team_id=$team_id");
	    }
	    
	} else if ($action == 'show_add_form') {
		
		
	    $teams = get_teams();
	    include('../../view/product_manager/product_add.php');    
	    
	    
	} else if ($action == 'add_product') {
		
		
	    $team_id = filter_input(INPUT_POST, 'team_id', 
	            FILTER_VALIDATE_INT);
	    $code = filter_input(INPUT_POST, 'code');
	    $name = filter_input(INPUT_POST, 'name');
	    $price = filter_input(INPUT_POST, 'price');
	    
	    if ($team_id == NULL || $team_id == FALSE || $code == NULL || 
	            $name == NULL || $price == NULL || $price == FALSE) {
	        $error = "Invalid product data. Check all fields and try again.";
	        include('../../public/errors/error.php');
	    } else { 
	        add_product($team_id, $code, $name, $price);
	        header("Location: .?team_id=$team_id");
	    }
    
	} else if ($action == 'list_categories') {
    	list_categories();
		
	} else if ($action == 'add_categories') {		
		add_categories();		
		
	} else if ($action == 'delete_categories') {		
		delete_categories();
		
	} else if ($action == 'edit_product') {
		edit_products();	
		
	} else if ($action == 'show_edit_form') {
		show_edit_form();

	}	
	
	
	function list_categories(){
		$teams = get_teams();
		include('../../view/product_manager/category_list.php');
	}

	function add_categories(){
		$category = filter_input(INPUT_POST, 'category_name');
		
		if ($category == NULL) {
			$error = "Invalid category name. Check name and try again.";							
			include('../../public/errors/error.php');
		} else {							
			add_category($category);
			header('Location: .?action=list_categories');		
		}
	}
	
	function delete_categories(){
		$team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
		delete_category($team_id);
		header('Location: .?action=list_categories');
	}

	
	
	
	
	/*navigates to edit team page*/
	function show_edit_form(){
		
		$teams = get_teams();
		$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
		include('../../view/product_manager/product_edit.php');
	}
	

	
	
	
	
	
	
	
	/*at edit page goes back to main product list, after updating team*/
	function edit_products(){	
		$product_id		= filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
	    $team_id 	= filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
	    $code 			= filter_input(INPUT_POST, 'code');
	    $name			= filter_input(INPUT_POST, 'name');
	    $price 			= filter_input(INPUT_POST, 'price');
	
		
	    if ($team_id == NULL || $team_id == FALSE || $code == NULL || $name == NULL || $price == NULL || $price == FALSE) {
	        $error = "Invalid product data. Check all fields and try again.";
	        include('../../public/errors/error.php');
	    } else { 
	        update_member($product_id, $team_id, $code, $name, $price);		
			header("Location: .?team_id=$team_id");
	    }
		

	}





?>