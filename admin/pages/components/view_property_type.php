<div class="tab-pane fade <?php if ($tab == 1) echo "show active"; ?>" id="viewPropertyType" role="tabpanel" aria-labelledby="orders-all-tab">
	<div class="app-card app-card-orders-table shadow-sm mb-5">
		<div class="app-card-body">
			<div class="table-responsive">
				<form method="post" action="<?php $_SERVER['REQUEST_METHOD'] ?>">
					<table class="table app-table-hover mb-0 text-left">
						<thead>
							<tr>
								<th class="cell text-center">No.</th>
								<th class="cell text-center">ប្រភេទអចលនទ្រព្យ ខ្មែរ</th>
								<th class="cell text-center">ប្រភេទអចលនទ្រព្យ អង់គ្លេស</th>
								<th class="cell text-center">ការពិពណ៌នា</th>
								<th class="cell text-center">សកម្មភាព</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
							$sql = "SELECT * FROM tbl_property_type order by property_type_id desc";
							$result = queryData($sql);
							$i = 1;
							while ($row = mysqli_fetch_array($result)) {
								$num = $i;
								$propertyTypeId = $row[0];
								$propertyNameKH = $row[1];
								$propertyNameEN = $row[2];
								$desc = $row['property_type_desc'];
								$model = new PropertyTypeModel($propertyTypeId, $propertyNameKH, $propertyNameEN, $desc);
							?>
								<input type="hidden" name="txtPropertyTypeId" value="<?=$propertyTypeId?>">
								<tr>
									<td class="cell text-center"><span class="truncate"><?= $num ?></span></td>
									<td class="cell text-center"><span class="truncate"><?= $propertyNameKH ?></span></td>
									<td class="cell text-center"><span class="truncate"><?= $propertyNameEN ?></span></td>
									<td class="cell text-center"><span class="truncate"><?= $desc ?></span></td>
									<td class="cell text-center">
										<a href="#" class="btn btn-outline-primary btn-rounded waves-effect p-1 px-3"  data-bs-toggle="modal" data-bs-target="#view_detail<?= $num ?>"><i class="fa-solid fa-eye"></i></a>
										<a href="#" class="btn btn-outline-success btn-rounded waves-effect p-1 px-3" title="Edit" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $num ?>"><i class="fa-regular fa-pen-to-square"></i></a>
										<button  type="submit" name="btnDelete"  onclick="return confirm('តើអ្នកប្រាកដទេថាអ្នកចង់លុបប្រភេទអចលនទ្រព្យនេះ?');" class="btn btn-outline-danger btn-rounded waves-effect p-1 px-3"><i class="fa-solid fa-trash"></i></button>
									</td>
									<?= modalViewDetail($num,$model);?>
								</tr>
							<?php
								
								modalUpdate($num, $model);
								
								$i++;
							}
							?>
						</tbody>
					</table>
				</form>



</div>
			</div><!--//table-responsive-->

		</div><!--//app-card-body-->
	</div><!--//app-card-->
<?php 
if($tab==1){
	echo '	
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
	</nav>';
}
?>	
</div><!--//tab-pane-->