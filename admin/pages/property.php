<?php
$imgDetail = '';

?>
<div class="app-wrapper" method="POST">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">ព័ត៌មានអចលនទ្រព្យ</h1>
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
				<a class="flex-sm-fill text-sm-center nav-link <?php if ($tab == 1) echo "active"; ?>" onclick="reload(1)">បញ្ចីអចលនទ្រព្យ</a>

			</nav>
			<div class="tab-content" id="orders-table-tab-content">
				<?php include "./controllers/create_property_controller.php"; ?>
				<!-- table 1-->
				<?php include "components/view_property.php" ?>
				<!-- end -->
				<!-- table 2-->

				<!-- end -->
			</div>

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
	function getImage(image, name) {
		var image = "<img src='./assets/images/property/" + image + "'class='img-fluid rounded shadow-2-strong border' style=''>"
		_('modalBody').innerHTML = image;
		_('modalLabel').innerHTML = name;
	}

	function _(obj) {
		return document.getElementById(obj);
	}
</script>