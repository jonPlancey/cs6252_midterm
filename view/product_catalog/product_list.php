<?php include '../../view/template/header.php'; ?>
<main>
    <aside>
        <h1>Teams</h1>
		
		<!-- display links for all categories -->
		<?php include '../../view/template/categories_nav.php'; ?>
		
    </aside>
	
    <section>
        <h1><?php echo $category_name; ?></h1>
        <ul class="nav">
            <!-- display links for products in selected category -->
            <?php foreach ($products as $product) : ?>
            <li>
                <a href="?action=view_product&amp;product_id=<?php 
                          echo $product['productID']; ?>">
                    <?php echo $product['productName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../../view/template/footer.php'; ?>