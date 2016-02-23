<nav>
	<ul>
	<?php foreach ($teams as $team) : ?>
		<li>
		<a href="?category_id=<?php echo $team['team_id']; ?>">
			<?php echo $team['team_name']; ?>
		</a>
		</li>
	<?php endforeach; ?>
	</ul>
</nav>