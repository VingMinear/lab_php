<?php
include "./utils/utilty.php";
function modalUpdate($id, ModelModal $model)
{
	echo
	'
	<div class="modal fade" id="exampleModal' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
     			 <div class="modal-header">
				  	<label for="setting-input-1" class="form-label d-flex justify-content-center text-success">បំពេញព័ត៌មានប្រភេទនៃអចលនទ្រព្យ</label>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
    				<div class="app-card-body">
                	<form method="post" class="settings-form">
						<input type="hidden" name="txtPropertyId" value"' . $model->getId() . '">
                	    <div class="mb-3">
                	        <label for="setting-input-2" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ</label>
                	        <label for="setting-input-2" class="form-label text-danger">*</label>
                	        <input type="text" class="form-control" name="txtPropertyKh" id="txtPropertyTypeKh" value="' . $model->getkh() . '" required>
                	    </div>
                	    <div class="mb-3">
                	        <label for="setting-input-3" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខអង់គ្លេស</label>
                	        <label for="setting-input-2" class="form-label text-danger">*</label>
                	        <input type="text" class="form-control" name="txtPropertyEn" id="txtPropertyTypeEn" value="' . $model->getEn() . '" required>
                	    </div>
                	    <div class="mb-3">
                	        <label for="setting-input-3" class="form-label">បរិយាយ</label>
                	        <textarea type="text" class="form-control" name="txtDesc" id="txtDesc"style="height: auto;">' . $model->getdesc() . '</textarea>
                	    </div>

                	    <div class="d-flex justify-content-end">
                	        <button onclick="onReset();" class="btn border border-danger text-danger px-4" >សម្អាត</button>
                	        <button type="submit" id="submit" name="btnUpdate" class="ms-2 btn app-btn-primary px-4">រក្សាទុក</button>
                	    </div>

                	</form>
            	</div>
      		</div>
  		</div>
	</div>
   <script type="text/javascript">

    function onReset(){
        document.getElementById("txtPropertyTypeKh").defaultValue="";
        document.getElementById("txtPropertyTypeEn").defaultValue="";
        document.getElementById("txtDesc").defaultValue="";
    }
        
   </script>
';
}
if (isset($_POST['btnDeleted'])) {
	$id=$_POST['txtPropertyId'];
	deletePropertyType($id);

    // Process the data (e.g., store it in a database, send an email, etc.)
    // ...
}

if (isset($_POST['btnUpdate'])) {
	$id = $_POST['txtPropertyId'];
	$txtKh = $_POST['txtPropertyKh'];
	$txtEn = $_POST['txtPropertyEn'];
	$txtDesc = $_REQUEST['txtDesc'];
	if (trim($id) != '' && trim($txtKh) != '' && trim($txtEn) != '' && trim($txtDesc) != '') {
		$model = new ModelModal($txtPropertyId, $txtPropertyKh, $txtPropertyEn, $txtDesc);
		updatePropertyType(0, $model);
	}
}
if (isset($_POST['reset'])) {
	javaScript('
        document.getElementsByName("txtPropertyId").defaultValue="clear";
      
    ');
}

function updatePropertyType($id, ModelModal $model)
{
	$isSuccess = queryData('UPDATE tbl_property_type SET
			property_type_kh  = "' . $model->getKh() . '",
			property_type_en ="' . $model->getEn() . '",
		    property_type_desc = "' . $model->getdesc() . '"
			WHERE property_type_id =' . $id . ';
			');
	if ($isSuccess) {
		alertMsgStyle("អ្នកបានកែប្រែទិន្នន័យដោយទទួលបានជោគជ័យ", "success");
		$statement = '
				setTimeout(function() {
					document.getElementById("alert").remove();
				}, 3000);
				';
		javaScript($statement);
	}
}
function insertPropertyType($propertyKh, $propertyEn, $desc)
{
	$isSuccess = queryData("INSERT INTO tbl_property_type (property_type_kh, property_type_en, property_type_desc)
		VALUES ('$propertyKh','$propertyEn' ,'$desc' );");
	if ($isSuccess) {
		alertMsgStyle("អ្នកបានបញ្ចូលទិន្នន័យដោយជោគជ័យ", "success");
		$statement = '
		setTimeout(function() {
			document.getElementById("alert").remove();
		}, 3000);
		';
		javaScript($statement);
	}
}

function deletePropertyType($id)
{
	alertMessage($id);
	$isSuccess = queryData('DELETE FROM tbl_property_type
							WHERE property_type_id = ' . $id . ';
							');
	if ($isSuccess) {
		alertMsgStyle("អ្នកបានលុបទិន្នន័យដោយជោគជ័យ", "success");
		$statement = '
					setTimeout(function() {
							document.getElementById("alert").remove();
							window.location.href = "index.php?page=property_type&tab=1";
					}, 2500);
					';
		javaScript($statement);
	}
}
