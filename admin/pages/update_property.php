  <style>
      .msg {
          font-size: 13px;
          font-weight: 600;
      }
  </style>
  <div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">
          <div class="container-xl">
              <?php
                include "./controllers/property_controller.php";
                if (isset($_GET['id'])) {
                    $data = getProperty($_GET['id']);
                }
                ?>

              <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                  <a class="flex-sm-fill text-sm-center nav-link active">កែប្រែអចលនទ្រព្យ</a>
              </nav>
              <div class="app-card app-card-settings shadow-sm p-4">
                  <div class="app-card-body">
                      <form class="settings-form" method="post" enctype="multipart/form-data">
                          <label for="setting-input-1" class="form-label d-flex justify-content-center text-success">កែប្រែទិន្ន័យអចលនទ្រព្យ</label>
                          <hr />
                          <div class="row ">
                              <div class="mb-3 col ">
                                  <label for="setting-input-2" class="form-label">ប្រភេទ</label>
                                  <label for="setting-input-2" class="form-label text-danger">*</label>
                                  <div class="col">
                                      <select class="form-select" name='sel_pro_type' aria-label="Default select example">
                                          <option value="">- ជ្រើសរើសប្រភេទ -</option>
                                          <?php
                                            $sql = "SELECT * FROM tbl_property_type";
                                            $selectedType = '';
                                            $result = queryData($sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $idProType = $row['property_type_id'];
                                                $title = $row['property_type_kh'];
                                                if ($idProType == $data->typeId) {
                                                    $selectedType = 'selected';
                                                } else {
                                                    $selectedType = '';
                                                }
                                            ?>
                                              <option value="<?= $idProType ?>" <?= $selectedType ?>><?= $title ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                                  <?= $msg1 ?>
                              </div>
                              <div class="mb-3 col">
                                  <label for="setting-input-2" class="form-label">សន្ថានភាព</label>
                                  <label for="setting-input-2" class="form-label text-danger">*</label>
                                  <div class="col">
                                      <select class="form-select" name='sel_pro_status' aria-label="Default select example">
                                          <option value="">- ជ្រើសរើសសន្ថានភាព -</option>
                                          <?php
                                            $sql = "SELECT * FROM tbl_property_status";
                                            $selectedStatus = '';
                                            $result = queryData($sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id = $row['property_status_id'];
                                                $title = $row['property_status'];
                                                if ($id == $data->statusId) {
                                                    $selectedStatus = 'selected';
                                                } else {
                                                    $selectedStatus = '';
                                                }
                                            ?>
                                              <option value="<?= $id ?>" <?= $selectedStatus ?>><?= $title ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                                  <?= $msg2 ?>
                              </div>
                          </div>

                          <div class="mb-3">
                              <label for="setting-input-2" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ</label>
                              <label for="setting-input-2" class="form-label text-danger">*</label>
                              <input type="text" class="form-control" name="txt_title" value="<?= $data->name ?>">
                              <?= $msg3 ?>
                          </div>

                          <div class="row">
                              <div class="col-5 ">
                                  <div class="mb-3"><label for="setting-input-3" class="form-label">តម្លៃអចលនទ្រព្យ</label>
                                      <label for="setting-input-2" class="form-label text-danger">*</label>
                                      <input type="text" class="form-control" name="txt_price" value="<?= $data->price ?>">
                                      <?= $msg4 ?>
                                  </div>
                              </div>
                              <div class="col-7">
                                  <div class="row">
                                      <div class="col">
                                          <label for="formFile" class="form-label">រូបភាព</label>
                                          <input class="form-control p-1 ps-1 " name="fileUpl" style="font-size:18px" type="file" id="fileUpl">
                                          <?= $msg5 ?>
                                      </div>
                                      <div class="col-auto "><img class="img-thumbnail img-fluid shadow" id='img' accept="image/*" style="height:120px;" src="./assets/images/property/<?= $data->image ?>" /></div>
                                  </div>
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="setting-input-3" class="form-label">បរិយាយ</label>
                              <textarea type="text" class="form-control" name="txtDesc" value="" style="height: auto;"> <?= $data->desc ?></textarea>
                          </div>

                          <div class="d-flex justify-content-end">
                              <button type="reset" class="btn border border-danger text-danger px-4">សម្អាត</button>
                              <button type="submit" id="submit" name="btnUpdate" class="ms-2 btn app-btn-primary px-4">កែប្រែ</button>
                          </div>

                      </form>

                  </div><!--//app-card-body-->

              </div><!--//app-card-->
          </div>
      </div>
  </div>
  </div>
  <script>
      _("fileUpl").addEventListener("change", function() {
          if (validateForm()) {
              var file = _("fileUpl").files[0];
              if (file) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                      _('img').src = e.target.result; // Update the img tag with the selected image
                  };
                  reader.readAsDataURL(file);
              } else {
                  _('img').src = "";
              }
          }

      });

      function _(obj) {
          return document.getElementById(obj);
      }

      function validateForm() {
          var fileInput = document.getElementById("fileUpl");
          var fileName = fileInput.value;

          // Check if a file has been selected
          if (fileName === "") {
              Swal.fire("Please select a file to upload.")
              return false;
          }

          // Check the file extension (client-side check)
          var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.svg|\.webp|\.jfif|\.pjpeg)$/i;
          if (!allowedExtensions.exec(fileName)) {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Invalid file type. Please select an image file (jpg, jpeg, png, gif).',
              })
              return false;
          }

          return true; // Proceed with form submission if all checks pass
      }
  </script>