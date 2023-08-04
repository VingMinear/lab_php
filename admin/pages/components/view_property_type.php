<div class="tab-pane fade show active" id="view_property" role="tabpanel" aria-labelledby="tab1">
	<div class="app-card app-card-orders-table shadow-sm mb-5">
		<div class="app-card-body">
			<div class="table-responsive">
				<table class="table app-table-hover mb-0 text-left">
					<thead>
						<tr>
							<th class="cell">No.</th>
							<th class="cell">Property Type KH</th>
							<th class="cell">Property Type EN</th>
							<th class="cell">Description</th>
				
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM tbl_property_type";
						$result = mysqli_query($conn, $sql) or die("Error in Selecting DB");
						$i = 0;
						while ($row = mysqli_fetch_array($result)) {
							$num = $row[0];
							$propertyNameKH = $row[1];
							$propertyNameEN = $row[2];
							$desc = $row['property_type_desc'];
						?>
							<tr>
								<td class="cell"><span class="truncate"><?= $num ?></span></td>
								<td class="cell"><span class="truncate"><?= $propertyNameKH ?></span></td>
								<td class="cell"><span class="truncate"><?= $propertyNameEN ?></span></td>
								<td class="cell"><span class="truncate"><?= $desc ?></span></td>
								
							</tr>
						<?php
							$i++;
						}
						?>
					</tbody>
				</table>
			</div><!--//table-responsive-->

		</div><!--//app-card-body-->
	</div><!--//app-card-->
	<nav class="app-pagination">
		<ul class="pagination justify-content-center">
			<li class="page-item disabled">
				<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
			</li>
			<li class="page-item active"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
				<a class="page-link" href="#">Next</a>
			</li>
		</ul>
	</nav><!--//app-pagination-->
</div><!--//tab-pane-->