<?php include '../../view/template/header.php'; ?>
<main>
    <aside>
        <h1>Teams</h1>
		
		<!-- display links for all Teams\groups -->
		<?php include '../../view/template/categories_nav.php'; ?>
		
    </aside>
	
	
	
	
    <section>
		
        <h1><?php echo $team_name; ?></h1>
        <ul class="nav">

            <!-- display links for members in selected Teams\groups -->
            <?php foreach ($member as $person) : ?>
            <li>
                <a href = "?action=view_member&amp;member_id=<?php 
						  echo $person['member_id']; ?>" >					  
                    <?php echo $person['member_name']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
		
		<div id="right_column">
		<b>Description:</b> 
            <p>
               <?php echo $description; ?>
            </p>
        </div>
		
		
		
    </section>
</main>
<?php include '../../view/template/footer.php'; ?>