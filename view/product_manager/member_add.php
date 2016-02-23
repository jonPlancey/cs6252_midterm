<?php include '../../view/template/header.php'; ?>
<main>
    <h1>Add Member</h1>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">

        <label>Category:</label>
		
        <select name="team_id">
		
			<?php foreach ( $teams as $team ) : ?>
				<option value="<?php echo $team['team_id']; ?>">
					<?php echo $team['team_name']; ?>
				</option>
			<?php endforeach; ?>
			
        </select>
		
        <br>

        <label>First Name:</label>
        <input type="text" name="firstname" />
        <br>

        <label>Birthday: yyyy-dd-mm</label>
        <input type="text" name="birthday" />
        <br>


        <label>&nbsp;</label>
        <input type="submit" value="Add Member" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_products">View Member List</a>
    </p>

</main>
<?php include '../../view/template/footer.php'; ?>