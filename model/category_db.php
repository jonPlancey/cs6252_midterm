<?php
	function get_teams() {
	    global $db;
	    $query = 'SELECT * FROM team
	              ORDER BY team_id';
	    $statement = $db->prepare($query);
	    $statement->execute();
	    return $statement;    
	}
	
	function get_team_name($group_id) {
	    global $db;
	    $query = 'SELECT * FROM team
	              WHERE team_id = :group_id';    
	    $statement = $db->prepare($query);
	    $statement->bindValue(':group_id', $group_id);
	    $statement->execute();    
	    $team = $statement->fetch();
	    $statement->closeCursor();    
	    $team_name = $team['team_name'];
	    return $team_name;
	}
	
	function add_category($team) {
		global $db;
		$query = 'INSERT
				  INTO
				 	categories (categoryName)
				  VALUES (:category_name)';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':team_name', $team);
		$statement->execute();
		$statement->closeCursor();	

	}
		
	function delete_category($team_id) {
		global $db;		
		$query = 'DELETE FROM categories
              WHERE categoryID = :team_id';
		 
		$statement = $db->prepare($query);
		$statement->bindValue(':team_id', $team_id);
		$success = $statement->execute();
		$statement->closeCursor();	

	}
	
	function edit_category($team_id) {
		global $db;
		$query = 'UPDATE FROM categories
              WHERE categoryID = :team_id';
			
		$statement = $db->prepare($query);
		$statement->bindValue(':team_id', $team_id);
		$success = $statement->execute();
		$statement->closeCursor();
	
	}	
?>