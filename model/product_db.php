<?php
function get_products_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE products.categoryID = :category_id
              ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_product($product_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_product($product_id) {

    global $db;
    $query = 'DELETE FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($category_id, $code, $name, $price) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
              VALUES
                 (:category_id, :code, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}

/* DEBUG */
function update_member($product_id, $category_id, $code, $name, $price) {
   	 echo '<script type="text/javascript">alert("edit_products [ ' .$category_id.'  '.$code.'  '.$name.'  '.$price.  ' ]");</script>';		
/* 	global $connection;
	
	$q = "UPDATE `my_guitar_shop1`.`products` SET `productCode`='{$code}', `categoryID`='{$categoryID}', `productName`='{$name}', `listPrice`='{$price}' WHERE `productID`='$product_id'";
	$r = mysqli_query ( $connection, $q );
	if (! $r) {
		echo '<b>Opps. The product (PID) you have requested can not be found. </b>' . mysqli_error ( $connection );
	} else {
		$row = mysqli_fetch_array ( $r, MYSQLI_ASSOC );
		return $row; // only returns one value
		echo $q;
	} */
	
	global $db;
	$query = '	UPDATE
					products 
				SET 
					categoryID	=	:category_id, 
					productCode	=	:code, 			
					productName	=	:name, 
					listPrice	=	:price 
				WHERE 
					productID = :product_id';
					
	$statement = $db->prepare($query);
	$statement->bindValue(':product_id',	$product_id);	
	$statement->bindValue(':category_id',	$category_id);
	$statement->bindValue(':code', 			$code);
	$statement->bindValue(':name', 			$name);
	$statement->bindValue(':price',			$price);
	$statement->execute();
	$statement->closeCursor();
}
?>