<?php
	include 'Header.php';
	echo '<div id="categories">';
	foreach($categories as $category) {
		echo "<div class='category'>
			<span class='categoryname'>".$category['name']."</span>
			<span class='threadcount'>Threads</span>
			<span class='postcount'>Posts</span>
		</div>";
		foreach($subcategories as $subcategory) {
			if ($subcategory['cat_id'] == $category['id'])
				echo "<div class='subcategory'>
					<span class='subcategoryname'><a href='/category/".$subcategory['id']."/'>".$subcategory['name']."</a></span>
					<span class='threads'>".$subcategory['threads']."</span>
					<span class='posts'>".$subcategory['posts']."</span>
				</div>";
		}
	}
	echo "</div>";
	include 'Footer.php';
?>