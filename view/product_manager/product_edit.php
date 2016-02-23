<?php include '../../view/template/header.php'; ?>

<?php
	$category_id = filter_input(INPUT_POST, 'category_id');
	$product = get_product($product_id);
?>

<main>
    <h1>Edit Product</h1>
    <form action="../../controller/product_manager/index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="edit_product">

        <label>Category:</label>
        
        <select name="category_id">
					
	        <?php foreach ( $categories as $category ) : ?>
	            <option value="<?php echo $category['categoryID']; ?>">
	                <?php echo $category['categoryName']; ?>
	            </option>
	        <?php endforeach; ?>
	        
        </select>
        

        <br>
		<!--load values into fields-->
        <label>Code:</label>
        <input type="text" name="code"	value = "<?php echo $product['productCode'];?>" />
        <br>

        <label>Name:</label>
        <input type="text" name="name"  value = "<?php echo $product['productName'];?>" />
        <br>

        <label>List Price:</label>
        <input type="text" name="price"	value = "<?php echo $product['listPrice'];?>" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Product" />
        <input type="hidden" name="product_id" value = "<?php echo $product_id;?>" />
        <input type="hidden" name="category_id" value = "<?php echo $category_id;?>" />
		

        <br>
    </form>

    <p class="last_paragraph">
        <a href="../../controller/product_manager/index.php?action=list_products">View Product List</a>
    </p>
	

</main>
<?php include '../../view/template/footer.php'; ?>