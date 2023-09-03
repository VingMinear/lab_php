<div class="tab-pane fade <?php if ($tab == 2) echo "show active"; ?>" id="addPropertyType" role="tabpanel" aria-labelledby="orders-paid-tab">
<?php

if (isset($_POST['btnSubmit'])) {
    $txtPropertyKh = $_POST['txtPropertyKh'];
    $txtPropertyEn = $_POST['txtPropertyEn'];
    $txtDesc = $_REQUEST['txtDesc'];
    insertPropertyType($txtPropertyKh, $txtPropertyEn, $txtDesc);
}

?>
    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="settings-form">
                    <label for="setting-input-1" class="form-label d-flex justify-content-center text-success">បំពេញព័ត៌មានប្រភេទនៃអចលនទ្រព្យ</label>
                    <hr />
                    <div class="mb-3">
                        <label for="setting-input-2" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ</label>
                        <label for="setting-input-2" class="form-label text-danger">*</label>
                        <input type="text" class="form-control" name="txtPropertyKh" id="txtPropertyTypeKh" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខអង់គ្លេស</label>
                        <label for="setting-input-2" class="form-label text-danger">*</label>
                        <input type="text" class="form-control" name="txtPropertyEn" id="txtPropertyTypeEn" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label">បរិយាយ</label>
                        <textarea type="text" class="form-control" name="txtDesc" id="txtDesc" value="" style="height: auto;"></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn border border-danger text-danger px-4">សម្អាត</button>
                        <button type="submit" id="submit" name="btnSubmit" class="ms-2 btn app-btn-primary px-4">រក្សាទុក</button>
                    </div>

                </form>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div>
</div>