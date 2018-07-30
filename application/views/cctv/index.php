<div class="container-fluid">
	<div class="row">
		<?php 
		foreach ($cctv as $listCctv) {
		 	echo '<div class="card border border-bottom-0 w-25">';
		 		echo '<img class="card-img-top" src="'.$listCctv['url'].'" alt="Card image cap">';
		 		echo '<div class="card-body">';
		 			echo '<h5 class="card-title">KM '.$listCctv['name'].'</h5>';
		 		echo '</div>';
		 	echo '</div>';
		 } ?>
	</div>
</div>

