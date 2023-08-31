

<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
	<div class="app-card app-card-orders-table shadow-sm mb-5">
		<div class="app-card-body">
			<div class="table-responsive">
				<form method="post" action="<?php $_SERVER['REQUEST_METHOD'] ?>">
					<table class="table app-table-hover mb-0 text-left">
						<thead>
							<tr>
								<th class="cell">No.</th>
								<th class="cell">ប្រភេទអចលនទ្រព្យ ខ្មែរ</th>
								<th class="cell">ប្រភេទអចលនទ្រព្យ អង់គ្លេស</th>
								<th class="cell">ការពិពណ៌នា</th>
								<th class="cell">សកម្មភាព</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM tbl_property_type order by property_type_id desc";
							$result = queryData($sql);
							$i = 1;
							while ($row = mysqli_fetch_array($result)) {
								$num = $i;
								$propertyId = $row[0];
								$propertyNameKH = $row[1];
								$propertyNameEN = $row[2];
								$desc = $row['property_type_desc'];
							?>
								<input type="hidden" name="txtPropertyId" value="<?=$propertyId?>">
								<tr>
									<td class="cell"><span class="truncate"><?= $num ?></span></td>
									<td class="cell"><span class="truncate"><?= $propertyNameKH ?></span></td>
									<td class="cell"><span class="truncate"><?= $propertyNameEN ?></span></td>
									<td class="cell"><span class="truncate"><?= $desc ?></span></td>
									<td class="cell">
										<a href="#" class=" truncate " title="View" data-toggle="modal"><i class="bi bi-eye-fill text-info me-1"></i></a>
										<a href="#" class=" truncate" title="Edit" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $num ?>"><i class="bi bi-pencil-square me-1"></i></a>
										<button type="submit" name="btnDeleted"  class="btn truncate" ><i  class="bi bi-trash text-danger"></i></button>
									</td>
								</tr>
							<?php
								$model = new ModelModal($propertyId, $propertyNameKH, $propertyNameEN, $desc);

								modalUpdate($num, $model);
								$i++;
							}
							?>
						</tbody>
					</table>
				</form>

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