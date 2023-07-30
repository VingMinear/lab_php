<?php
$imgDetail = '';

?>
<div class="app-wrapper" method="POST" >
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Properties</h1>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto">
								<form class="row gx-1 align-items-center">
									<div class="col-auto me-1">
										<input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
									</div>
									<div class="col-auto">
										<button type="submit" class="btn app-btn-secondary bg-primary text-white">Search</button>
									</div>
								</form>

							</div><!--//col-->
							<div class="col-auto">

								<select class="form-select w-auto">
									<option selected value="option-1">All</option>
									<option value="option-2">This week</option>
									<option value="option-3">This month</option>
									<option value="option-4">Last 3 months</option>

								</select>
							</div>
							<div class="col-auto">
								<a class="btn app-btn-secondary" href="#">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
										<path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
									</svg>
									Download CSV
								</a>
							</div>
						</div><!--//row-->
					</div><!--//table-utilities-->
				</div><!--//col-auto-->
			</div><!--//row-->


			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
			</nav>

			<!-- table -->
			<div class="tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">No.</th>
											<th class="cell">Property Name</th>
											<th class="cell">Price</th>
											<th class="cell">Description</th>
											<th class="cell">Photo</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i=0;
										while ($row = mysqli_fetch_array($result)) {
											$num = $row[0];
											$propertyName = $row['property_name'];
											$desc = $row['property_desc'];
											$price = $row['property_price'];
											$photo = $row['property_img'];
										?>
											<tr>
												<td class="cell"><span class="truncate"><?= $num ?></span></td>
												<td class="cell"><span class="truncate"><?= $propertyName ?></span></td>
												<td class="cell"><span class="text-success truncate"><?= $price ?> $</span></td>
												<td class="cell"><span class="truncate"><?= $desc ?></span></td>
												<td class="cell">
													<img role='button' onClick="getImage('<?=$photo?>','<?= $propertyName ?>')" src="./assets/images/property/<?= $photo ?>.jpg" data-bs-toggle="modal" data-bs-target="#exampleModal" class="img-fluid rounded shadow-2-strong border" style="width: 45px; height: 45px">
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

			</div><!--//tab-content-->
			<!-- end -->
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="modalLabel"></h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body row " id='modalBody'>
							
						</div>
					</div>
				</div>
			</div>
		</div><!--//container-fluid-->
	</div><!--//app-content-->
	<?php include "includes/footer.php" ?>

</div><!--//app-wrapper-->

<script>
	function getImage(image,name){
		var image="<img src='./assets/images/property/"+image+".jpg'class='img-fluid rounded shadow-2-strong border' style=''>"
		_('modalBody').innerHTML=image;		
		_('modalLabel').innerHTML=name;
	}
	function _(obj){
    	return document.getElementById(obj);
	}
</script>