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
    $teams = get_teams();
    $team_name = get_team_name($team_id);
    $member = get_member_by_team($team_id);
	
	/*
	$description = get_team_description($team_id);
	//$info = $description['team_description'];
	
	echo var_dump(  $member['member_name']  )
	*/
	
    include('../../view/product_catalog/product_list.php');
	
	
} else if ($action == 'view_member') {
	
    $member_id = filter_input(INPUT_GET, 'member_id', FILTER_VALIDATE_INT);  
	
    if ($member_id == NULL || $member_id == FALSE) {
        $error = 'Missing or incorrect product id.';
        include('../../public/errors/error.php');
    } else {
        $teams = get_teams();
        $member = get_member($member_id);
		
        // Get member data
		$code = $member['member_name'];
		$name = $member['member_name'];
        $birth_day = $member['member_birthday'];

        // Get image URL and alternate text
        $image_filename = '../../public/images/' . $code . '.jpg';
        $image_alt = 'Image: ' . $code . '.jpg';
		
        include('../../view/product_catalog/product_view.php');
    }
}
?>