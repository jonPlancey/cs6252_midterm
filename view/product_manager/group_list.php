<?php include '../../view/template/header.php'; ?>
	<main>
	    <h1>Group List</h1>
	    <table>
	        <tr>
	            <th>Name</th>
	            <th>&nbsp;</th>
	        </tr>
	        
	        <!-- Newly added table -->        
			<?php foreach ($teams as $team) : ?>
	
			<tr>                
				<td><?php echo $team['team_name']; ?></td>
			  
				<td>
					<form action="index.php" method="post">
				    	<input type="hidden" name="action" value="delete_categories"/>				
						<input type="hidden" name="team_id"  value="<?php echo $category['categoryID']; ?>">						 	
						<input type="submit" value="Delete">
					</form>
				</td>
			</tr>
					
			<?php endforeach; ?>  						 
	        <!-- Newly added table -->        
	    
	    </table>
	
	    <h2>Add Group</h2>
	    
	    <!-- Newly added form code -->   
	    <form action="index.php" method="post"> 
	     	<input type="hidden" name="action" value="add_categories" />
		    <label>Name:</label>
		    <input type="text" name="category_name">
		
		    <label>&nbsp;</label>
		    <input type="submit" value="Add"><br>          
	    </form>
	    <!-- Newly added form code -->  
	    
	    <br>
	    <p><a href="index.php?action=list_products">List Products</a></p>

    </main>
    
<?php include '../../view/template/footer.php'; ?>