
<div class="tab-pane fade  <?php if ($tab == 1) echo "show active"; ?> " id="view_property" role="tabpanel" aria-labelledby="tab1">
	<div class="app-card app-card-orders-table shadow-sm mb-5">
		<div class="app-card-body">
			<div class="table-responsive">
				<table class="table app-table-hover mb-0 text-left">
					<thead>
						<tr>
							<th class="cell">#</th>
							<th class="cell">ឈ្មោះប្រភេទអចលនទ្រព្យ</th>
							<th class="cell">តម្លៃអចលនទ្រព្យ</th>
							<th class="cell">បរិយាយ</th>
							<th class="cell">ប្រភេទនៃអចលនទ្រព្យ</th>
							<th class="cell">ស្ថានភាព</th>
							<th class="cell">រូបភាព</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM tbl_property p INNER JOIN  tbl_property_type pt ON pt.property_type_id = p.property_type_id LEFT JOIN tbl_property_status status on p.property_id=status.property_status_id;";
						$result = mysqli_query($conn, $sql) or die("Error in Selecting DB");
						$i = 0;
						while ($row = mysqli_fetch_array($result)) {
							$num = $row[0];
							$propertyName = $row['property_name'];
							$desc = $row['property_desc'];
							$price = $row['property_price'];
							$propertyType = $row['property_type_kh'];
							$photo = $row['property_img'];
							$status = $row['property_status'] ?? "N/A";

							$bgColor='bg-secondary empty';
							switch ($status) {
								case "Sold":
									$bgColor='bg-success';
									break;
								case "Booked":
									$bgColor='bg-warning';
									break;
								case "Available":
									$bgColor='bg-info';
									break;
								case "Blocked":
									$bgColor='bg-danger';
									break;
							}
						?>
							<tr>
								<td class="cell"><span class="truncate"><?= $num ?></span></td>
								<td class="cell"><span class="truncate"><?= $propertyName ?></span></td>
								<td class="cell"><span class="text-success truncate"><?= $price ?> $</span></td>
								<td class="cell"><span class="truncate"><?= $desc ?></span></td>
								<td class="cell"><span class="truncate"><?= $propertyType ?></span></td>
								<th class="cell"><span style="width: 65px; padding: 5px; border-radius: 20px;" class="py-2 truncate badge <?=$bgColor?>"><?= $status ?></span></th>
								<td class="cell">
									<img role='button' onClick="getImage('<?= $photo ?>','<?= $propertyName ?>')" src="./assets/images/property/<?= $photo ?>.jpg" data-bs-toggle="modal" data-bs-target="#exampleModal" class="img-fluid rounded shadow-2-strong border" style="width: 45px; height: 45px">
								</td>
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
</div><!--//tab-pane-->