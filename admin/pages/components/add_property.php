<?php include "./pages/customs/custom_form_field.php" ?>

<div class="tab-pane fade  <?php if ($tab == 2) echo "show active"; ?>" id="add_property" role="tabpanel" aria-labelledby="tab2">
    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form">
                    <label for="setting-input-1" class="form-label d-flex justify-content-center text-success">បំពេញព័ត៌មានប្រភេទនៃអចលនទ្រព្យ</label>
                    <hr />
                    <div class="mb-3">
                        <label for="setting-input-2" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ</label>
                        <label for="setting-input-2" class="form-label text-danger">*</label>
                        <input type="text" class="form-control" id="setting-input-2" value="" required>
                    </div>

                    <?php
                    customFormField("តម្លៃ");
                    ?>
                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាអង់គ្លេស</label>
                        <label for="setting-input-2" class="form-label text-danger">*</label>
                        <input type="email" class="form-control" id="setting-input-3" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label">បរិយាយ</label>
                        <textarea type="email" class="form-control" id="setting-input-3" value="" style="height: auto;"></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn border border-danger text-danger px-4">សម្អាត</button>
                        <button type="submit" class="ms-2 btn app-btn-primary px-4">រក្សាទុក</button>
                    </div>

                </form>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div>
</div>

