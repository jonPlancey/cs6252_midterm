<?php
	function get_teams() {
	    global $db;
	    $query = 'SELECT * FROM team
	              ORDER BY team_id';
	    $statement = $db->prepare($query);
	    $statement->execute();
	    return $statement;    
	}
	
	function get_team_name($team_id) {
	    global $db;
	    $query = 'SELECT * FROM team
	              WHERE team_id = :team_id';    
	    $statement = $db->prepare($query);
	    $statement->bindValue(':team_id', $team_id);
	    $statement->execute();    
	    $team = $statement->fetch();
	    $statement->closeCursor();    
	    $team_name = $team['team_name'];
	    return $team_name;
	}

	function get_team_description($team_id) {
	    global $db;
	    $query = 'SELECT * FROM team
	              WHERE team_id = :team_id';    
	    $statement = $db->prepare($query);
	    $statement->bindValue(':team_id', $team_id);
	    $statement->execute();    
	    $info = $statement->fetch();
	    $statement->closeCursor();    
	    $description = $info['team_description'];
	    return $description;
	}
	

	
	function add_group($team) {	
		global $db;
		$query = 'INSERT INTO team 
					(team_name)
				  VALUES (:group_name)';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':group_name', $team);
		$statement->execute();
		$statement->closeCursor();	

	}
	
	function delete_group($team_id) {	
		global $db;	
		
		$query = 'DELETE FROM team
              WHERE team_id = :team_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':team_id', $team_id);
		$success = $statement->execute();
		$statement->closeCursor();	

	}
	



	
?>