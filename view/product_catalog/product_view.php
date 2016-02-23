<?php include '../../view/template/header.php'; ?>
<main>


    <aside>
        <h1>Teams</h1>
        <?php include '../../view/template/categories_nav.php'; ?> 
        
    </aside>
    
    
    <section>

        <h1><?php echo $name; ?></h1>
        <div id="left_column">
            <p>
                <img src="<?php echo $image_filename; ?>"
                    alt="<?php echo $image_alt; ?>" />
            </p>
        </div>

        <div id="right_column">
            <p>
				<b>Birthday:</b> $<?php echo $list_price; ?>
			</p>
        </div>
		
    </section>
</main>

<?php include '../../view/template/footer.php'; ?>