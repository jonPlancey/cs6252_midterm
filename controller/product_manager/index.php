<?php
	require('../../model/database.php');
	require('../../model/product_db.php');
	require('../../model/category_db.php');
	
	$action = filter_input(INPUT_POST, 'action');
	

	
	
	if ($action == NULL) {
	    $action = filter_input(INPUT_GET, 'action');
	    if ($action == NULL) {
	        $action = 'list_products';
	    }
	}
	
	if ($action == 'list_products') {
		
		
	    $team_id = filter_input(INPUT_GET, 'team_id', FILTER_VALIDATE_INT);
		
	    if ($team_id == NULL || $team_id == FALSE) {
	        $team_id = 1;
	    }
	    $team_name = get_team_name($team_id);
	    $teams = get_teams();
	    $member = get_member_by_team($team_id);
	    include('../../view/product_manager/product_list.php');
	    
	    
	} else if ($action == 'delete_member') {
		

	    $member_id = filter_input(INPUT_POST, 'member_id',  FILTER_VALIDATE_INT);
	    $team_id = filter_input(INPUT_POST, 'team_id',FILTER_VALIDATE_INT);

	    if ($team_id == NULL || $team_id == FALSE ||
	        $member_id == NULL || $member_id == FALSE) {
	        $error = "Missing or incorrect product id or category id.";
	        include('../../public/error.php');
	    } else { 
	        delete_member($member_id);
	        header("Location: .?team_id=$team_id");
	    }
	    
	} else if ($action == 'show_add_form') {
		
		
	    $teams = get_teams();
	    include('../../view/product_manager/member_add.php');    
	    
	    
	} else if ($action == 'add_product') {
		
	    $team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
	    $firstname = filter_input(INPUT_POST, 'firstname');
	    $birthday = filter_input(INPUT_POST, 'birthday');
	  		
	    if ($team_id == NULL || $team_id == FALSE || $firstname == NULL || 
	        $birthday == NULL || $birthday == FALSE) {
	        $error = "Invalid product data. Check all fields and try again.";
	        include('../../public/errors/error.php');
	    } else { 
	        add_member($team_id, $firstname, $birthday);
	        header("Location: .?team_id=$team_id");
	    }
    
	} else if ($action == 'list_groups') {
    	list_groups();
		
	} else if ($action == 'add_groups') {		
		add_groups();		
		
	} else if ($action == 'delete_groups') {		
		delete_groups();
		
	} else if ($action == 'edit_product') {
		edit_products();	
		
	} else if ($action == 'show_edit_form') {
		show_edit_form();

	}	
	
	
	function list_groups(){
		$teams = get_teams();
		include('../../view/product_manager/group_list.php');
	}

	function add_groups(){
		$group_name = filter_input(INPUT_POST, 'group_name');		
		if ($group_name == NULL) {
			$error = "Invalid group name. Check name and try again.";							
			include('../../public/errors/error.php');
		} else {							
			add_group($group_name);
			header('Location: .?action=list_groups');		
		}
	}
	
	function delete_groups(){
		$team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
		delete_group($team_id);
		header('Location: .?action=list_groups');
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