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
                <a href = "?action=view_product&amp;product_id=<?php 
						  echo $person['member_id']; ?>" >					  
                    <?php echo $person['member_name']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../../view/template/footer.php'; ?>