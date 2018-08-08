<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<?php 
				foreach ($cctv as $listCctv) {
					if ($listCctv['id']==26) {
							echo '<div class="card border border-bottom-0" id="main-cctv">';
						 		echo '<img class="img-fluid" src="'.$listCctv['url'].'" alt="Card image cap" width="100%" height="100%">';
						 	echo '</div>';
					}
				 } 
			?>
			<div class="card" style="margin-top: 0.5rem; height: 320px;" id="ATPmap"></div>
		</div>
		<div class="col-md-8">
			<?php 
				echo '<div class="card-group">';
					foreach ($cctv as $listCctv1) {
						if ($listCctv1['id'] >=1 AND $listCctv1['id'] <= 5) {
								echo '<div class="card border border-bottom-0 w-25">';
							 		echo '<img class="card-img-top" src="'.$listCctv1['url'].'" onclick="handle_zoom(this.src)" alt="Card image cap">';
							 	echo '</div>';
						}
					 } 
			 	echo '</div>'; 
			?>
			<?php 
				echo '<div class="card-group">';
					foreach ($cctv as $listCctv2) {
						if ($listCctv2['id'] >=6 AND $listCctv2['id'] <= 10) {
								echo '<div class="card border border-bottom-0 w-25">';
							 		echo '<img class="card-img-top" src="'.$listCctv2['url'].'" onclick="handle_zoom(this.src)" alt="Card image cap">';
							 	echo '</div>';
						}
					 } 
			 	echo '</div>'; 
			?>
			<?php 
				echo '<div class="card-group">';
					foreach ($cctv as $listCctv3) {
						if ($listCctv3['id'] >=11 AND $listCctv3['id'] <= 15) {
								echo '<div class="card border border-bottom-0 w-25">';
							 		echo '<img class="card-img-top" src="'.$listCctv3['url'].'" onclick="handle_zoom(this.src)" alt="Card image cap">';
							 	echo '</div>';
						}
					 } 
			 	echo '</div>'; 
			?>
			<?php 
				echo '<div class="card-group">';
					foreach ($cctv as $listCctv4) {
						if ($listCctv4['id'] >=16 AND $listCctv4['id'] <= 20) {
								echo '<div class="card border border-bottom-0 w-25">';
							 		echo '<img class="card-img-top" src="'.$listCctv4['url'].'" onclick="handle_zoom(this.src)" alt="Card image cap">';
							 	echo '</div>';
						}
					 } 
			 	echo '</div>'; 
			?>
			<?php 
				echo '<div class="card-group">';
					foreach ($cctv as $listCctv4) {
						if ($listCctv4['id'] >=21 AND $listCctv4['id'] <= 25) {
								echo '<div class="card border border-bottom-0 w-25">';
							 		echo '<img class="card-img-top" src="'.$listCctv4['url'].'" onclick="handle_zoom(this.src)" alt="Card image cap">';
							 	echo '</div>';
						}
					 } 
			 	echo '</div>'; 
			?>
		</div>
	</div>
</div>

