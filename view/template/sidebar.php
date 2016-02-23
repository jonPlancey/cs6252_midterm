<ul class="nav">
	<!-- display links for all categories -->
	<?php foreach($categories as $category) : ?>
	<li>
		<a href="?team_id=<?php 
				  echo $category['categoryID']; ?>">
			<?php echo $category['categoryName']; ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>