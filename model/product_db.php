<?php
function get_member_by_team($team_id) {
    global $db;
    $query = 'SELECT * FROM member
              WHERE member.team_id = :team_id
              ORDER BY member_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":team_id", $team_id);
    $statement->execute();
    $members = $statement->fetchAll();
    $statement->closeCursor();
    return $members;
}
function get_team_description($team_id) {
    global $db;
    $query = 'SELECT * FROM team
              WHERE team.team_id = :team_id
              ORDER BY team_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":team_id", $team_id);
    $statement->execute();
    $description = $statement->fetchAll();
    $statement->closeCursor();
    return $description;
}

function get_member($member_id) {
    global $db;
    $query = 'SELECT * FROM member
              WHERE member_id = :member_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":member_id", $member_id);
    $statement->execute();
    $members = $statement->fetch();
    $statement->closeCursor();
    return $members;
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

function add_product($team_id, $code, $name, $price) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
              VALUES
                 (:team_id, :code, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}

/* DEBUG */
function update_member($product_id, $team_id, $code, $name, $price) {
   	//echo '<script type="text/javascript">alert("edit_products [ ' .$product_id. '    ' .$team_id.'   '.$code.'   '.$name.'   '.$price.  ' ]");</script>';		
	global $db;
	
	$query = 'UPDATE
					products 
				SET 
					categoryID	=	:team_id, 
					productCode	=	:code, 			
					productName	=	:name, 
					listPrice	=	:price 
				WHERE 
					productID = :product_id';			 
					
	$statement = $db->prepare($query);
	$statement->bindValue(':product_id',	$product_id);	
	$statement->bindValue(':team_id',	$team_id);
	$statement->bindValue(':code', 			$code);
	$statement->bindValue(':name', 			$name);
	$statement->bindValue(':price',			$price);
	$statement->execute();
	$statement->closeCursor();
	
}
?>