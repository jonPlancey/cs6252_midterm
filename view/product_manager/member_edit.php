<?php include '../../view/template/header.php'; ?>




<main>
	<script>
		function myFunction() {
			var x = document.getElementById("id_dd_category").value;
			document.getElementById("id_category").value = x;
			//alert(     document.getElementById("id_category").innerHTML + '  '  +  <?php echo get_team_name("+ x +"); ?>  );
		}
	</script>

    <h1>Edit Member</h1>
    <form action="../../controller/product_manager/index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="edit_product">

        <label>Group:</label>
        
        <select id="id_dd_category" name="team_id" onchange="myFunction()">
			<option selected disabled class="hideoption">View Groups</option>		
	        <?php foreach ( $teams as $team ) : ?>
			
	            <option value = "<?php echo $team['team_id']; ?>">
	                <?php echo $team['team_name']; ?>
	            </option>
	        <?php endforeach; ?>
	        
        </select>



        <br>
		<!--load values into fields-->
        <label>&nbsp;</label>
        <input type="text" name="category" value = "<?php echo get_team_name($team_id);?>"  id = "id_category" />
        <br>
        

        <label>First name:</label>
        <input type="text" name="firstname"  value = "<?php echo $member['member_name'];?>" />
        <br>

        <label>Birthday</label>
        <input type="text" name="birthday"	value = "<?php echo  $member['member_birthday'];?>" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Product" />
        <input type="hidden" name="member_id" 	value = "<?php echo $member_id;?>" />
        <input type="hidden" name="team_id" 	value = "<?php echo $team_id;?>" />
		

        <br>
    </form>

    <p class="last_paragraph">
        <a href="../../controller/product_manager/index.php?action=list_members">View Member List</a>
    </p>
	

</main>
<?php include '../../view/template/footer.php'; ?>