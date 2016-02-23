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
    include('../../view/product_catalog/product_list.php');
	
	
} else if ($action == 'view_product') {
	
    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);  
	
    if ($product_id == NULL || $product_id == FALSE) {
        $error = 'Missing or incorrect product id.';
        include('../../public/errors/error.php');
    } else {
        $teams = get_teams();
        $product = get_product($product_id);

        // Get product data
        $code = $product['productCode'];
        $name = $product['productName'];
        $list_price = $product['listPrice'];

        // Calculate discounts
        $discount_percent = 30;  // 30% off for all web orders
        $discount_amount = round($list_price * ($discount_percent/100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Format the calculations
        $discount_amount_f = number_format($discount_amount, 2);
        $unit_price_f = number_format($unit_price, 2);

        // Get image URL and alternate text
        $image_filename = '../../public/images/' . $code . '.png';
        $image_alt = 'Image: ' . $code . '.png';

        include('../../view/product_catalog/product_view.php');
    }
}
?>