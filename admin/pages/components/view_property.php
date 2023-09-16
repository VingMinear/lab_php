<div class="tab-pane fade  <?php if ($tab == 1) echo "show active"; ?> " id="view_property" role="tabpanel" aria-labelledby="tab1">
	<div class="app-card app-card-orders-table shadow-sm mb-5">
		<div class="app-card-body">
			<div class="table-responsive">
			<form method="post" action="<?php $_SERVER['REQUEST_METHOD'] ?>">
				<table class="table app-table-hover mb-0 text-left">
					<thead>
						<tr>
							<th class="cell text-center">#</th>
							<th class="cell text-center">ឈ្មោះប្រភេទអចលនទ្រព្យ</th>
							<th class="cell text-center">តម្លៃអចលនទ្រព្យ</th>
							<th class="cell text-center">បរិយាយ</th>
							<th class="cell text-center">ប្រភេទនៃអចលនទ្រព្យ</th>
							<th class="cell text-center">ស្ថានភាព</th>
							<th class="cell text-center">រូបភាព</th>
							<th class="cell text-center">សកម្មភាព</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM tbl_property p INNER JOIN  tbl_property_type pt ON pt.property_type_id = p.property_type_id LEFT JOIN tbl_property_status status on p.property_id=status.property_status_id;";
						$result = mysqli_query($conn, $sql) or die("Error in Selecting DB");
						$i = 0;
						while ($row = mysqli_fetch_array($result)) {
							$num = $i;
							$propertyId = $row[0];
							$propertyName = $row['property_name'];
							$desc = $row['property_desc'];
							$price = $row['property_price'];
							$propertyType = $row['property_type_kh'];
							$photo = $row['property_img'];
							$status = $row['property_status'] ?? "N/A";
							$model = new PropertyModel($propertyName, $price, $photo, $desc, $status, $propertyType);
							$bgColor = 'bg-secondary empty';
							switch ($status) {
								case "Sold":
									$bgColor = 'bg-success';
									break;
								case "Booked":
									$bgColor = 'bg-warning';
									break;
								case "Available":
									$bgColor = 'bg-info';
									break;
								case "Blocked":
									$bgColor = 'bg-danger';
									break;
							}
						?>
							<input type="hidden" name="txtPropertyId" value="<?= $propertyId ?>">
							<tr>
								<td class="cell text-center"><span class="truncate"><?= $num ?></span></td>
								<td class="cell text-center"><span class="truncate"><?= $propertyName ?></span></td>
								<td class="cell text-center"><span class="text-success truncate"><?= $price ?> $</span></td>
								<td class="cell text-center"><span class="truncate"><?= $desc ?></span></td>
								<td class="cell text-center"><span class="truncate"><?= $propertyType ?></span></td>
								<th class="cell text-center"><span style="width: 65px; padding: 5px; border-radius: 20px;" class="py-2 truncate badge <?= $bgColor ?>"><?= $status ?></span></th>
								<td class="cell text-center">
									<img role='button' onClick="getImage('<?= $photo ?>','<?= $propertyName ?>')" src="./assets/images/property/<?= $photo ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="img-fluid rounded shadow-2-strong border" style="width: 45px; height: 45px">
								</td>
								<td class="cell text-center">
									<a href="#" class="btn btn-outline-primary btn-rounded waves-effect p-1 px-3" data-bs-toggle="modal" data-bs-target="#view_detail<?= $num ?>"><i class="fa-solid fa-eye"></i></a>
									<a href="#" class="btn btn-outline-success btn-rounded waves-effect p-1 px-3" title="Edit" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $num ?>"><i class="fa-regular fa-pen-to-square"></i></a>
									<button type="submit" name="btnDeletePro" onclick="return confirm('តើអ្នកប្រាកដទេថាអ្នកចង់លុបអចលនទ្រព្យនេះ?');" class="btn btn-outline-danger btn-rounded waves-effect p-1 px-3"><i class="fa-solid fa-trash"></i></button>
								</td>
								<?= modalViewDetailProperty($num, $model); ?>
							</tr>
						<?php
							$i++;
						}
						?>
					</tbody>
				</table>
			</form>
			</div><!--//table-responsive-->
		
		</div><!--//app-card-body-->
	</div><!--//app-card-->
</div><!--//tab-pane-->