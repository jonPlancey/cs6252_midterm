<?php include '../../view/template/header.php'; ?>
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

        <label>Code:</label>
        <input type="text" name="code" value = "" />
        <br>

        <label>Name:</label>
        <input type="text" name="name"  value ="" />
        <br>

        <label>List Price:</label>
        <input type="text" name="price"  value = "" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Product" />
        <br>
    </form>

    <p class="last_paragraph">
        <a href="../../controller/product_manager/index.php?action=list_products">View Product List</a>
    </p>
	

</main>
<?php include '../../view/template/footer.php'; ?>