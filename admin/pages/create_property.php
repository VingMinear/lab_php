     <div class="app-wrapper" method="POST">
         <div class="app-content pt-3 p-md-3 p-lg-4">
             <div class="container-xl">
                 <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                     <a class="flex-sm-fill text-sm-center nav-link active">បង្កើតអចលនទ្រព្យ</a>
                 </nav>
                 <div class="app-card app-card-settings shadow-sm p-4">
                     <div class="app-card-body">
                         <form class="settings-form">
                             <label for="setting-input-1" class="form-label d-flex justify-content-center text-success">បំពេញព័ត៌មានប្រភេទនៃអចលនទ្រព្យ</label>
                             <hr />

                             <div class="row ">
                                 <div class="mb-3 col d-flex ">

                                     <div class="text-warning col-auto me-3 ">ប្រភេទ</div>
                                     <div class="col">
                                         <select class="form-select" aria-label="Default select example">
                                             <option selected>ជ្រើសរើសស្ថានភាពអចលនទ្រព្យ</option>
                                             <option value="1">One</option>
                                             <option value="2">Two</option>
                                             <option value="3">Three</option>
                                         </select>
                                     </div>

                                 </div>
                                 <div class="mb-3 d-flex col">
                                     <div class="text-primary col-auto me-3 ">សន្ថានភាព</div>
                                     <div class="col">
                                         <select class="form-select" aria-label="Default select example">
                                             <option value="1">One</option>
                                             <option value="2">Two</option>
                                             <option value="3">Three</option>
                                         </select>
                                     </div>
                                 </div>
                             </div>

                             <div class="mb-3">
                                 <label for="setting-input-2" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ</label>
                                 <label for="setting-input-2" class="form-label text-danger">*</label>
                                 <input type="text" class="form-control" id="setting-input-2" value="" required>
                             </div>


                             <div class="mb-3"><label for="setting-input-3" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាអង់គ្លេស</label>
                                 <label for="setting-input-2" class="form-label text-danger">*</label>
                                 <input type="email" class="form-control" id="setting-input-3" value="" required>
                             </div>
                             <form action="" method="post" enctype="multipart/form-data">
                                 <div class="mb-3">
                                     <label for="formFile" class="form-label">រូបភាព</label>
                                     <input class="form-control p-1 ps-1 " name="fileUpload" style="font-size:18px" type="file" id="formFile">
                                 </div>
                             </form>

                             <div class="mb-3">
                                 <label for="setting-input-3" class="form-label">បរិយាយ</label>
                                 <textarea type="email" class="form-control" id="setting-input-3" value="" style="height: auto;"></textarea>
                             </div>

                             <div class="d-flex justify-content-end">
                                 <button type="reset" class="btn border border-danger text-danger px-4">សម្អាត</button>
                                 <button type="submit" name="save" class="ms-2 btn app-btn-primary px-4">បង្កើត</button>
                             </div>

                         </form>
                     </div><!--//app-card-body-->
                 </div><!--//app-card-->
             </div>
         </div>
     </div>
     </div>