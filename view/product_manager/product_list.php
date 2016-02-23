
<?php include '../../view/template/header.php'; ?>

<main>
    <h1>Product List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Teams</h2>
        
        <?php include '../../view/template/categories_nav.php'; ?>

    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $team_name; ?></h2>
		
		
		
		<p>
			<a href="?action=show_add_form">Add Member</a>&nbsp;&nbsp;
			<a href="?action=list_groups">List Groups</a>
		</p>


		
        <table>
            <tr>
                <th>Group Category</th>
                <th>Name</th>
                <th class="right">Birthday</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>				
            </tr>
			
			
            <?php foreach ($member as $person) : ?>
            <tr>
                <td><?php echo $person['member_id']; ?></td>
                <td><?php echo $person['member_name']; ?></td>
                
                <td class="right"><?php echo $person['member_birthday']; ?></td>
                
                <td>
					<form action="." method="post">
						<input type="hidden" name="action"
							   value="delete_product">
							   
						<input type="hidden" name="product_id"
							   value="<?php echo $product['productID']; ?>">
							   
						<input type="hidden" name="team_id"
							   value="<?php echo $product['categoryID']; ?>">
							   
						<input type="submit" value="Delete">         
					</form>
				</td>
                
                <td>
					<form action="." method="post">
						<input type="hidden" name="action"
							   value="show_edit_form">
							   
						<input type="hidden" name="product_id"
							   value="<?php echo $product['productID']; ?>">
							   
						<input type="hidden" name="team_id"
							   value="<?php echo $product['categoryID']; ?>">                           
							   
						<input type="submit" value="Edit">
					</form>
				</td>
                    
                       
            </tr>
            <?php endforeach; ?>

        </table>
		
		
 

		
    </section>
</main>

<?php include '../../view/template/footer.php'; ?>