<?php
include "./models/property_type_model.php";
function modalUpdate($id, PropertyTypeModel $model)
{
	$txtId=$model->getId();
	$txtKh = $model->getkh();
	$txtEn = $model->getEn();
	$txtDesc = $model->getDesc();
	echo
	'
	<div class="modal fade" id="exampleModal' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
    		<div class="modal-content">
     			 <div class="modal-header">
				  	<label for="setting-input-1" class="form-label d-flex justify-content-center text-success">បំពេញព័ត៌មានប្រភេទនៃអចលនទ្រព្យ</label>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
    				<div class="app-card-body">
                	<form method="post" class="settings-form">
						<input type="hidden" name="txtPropertyTypeId" value="' . $txtId . '" >
                	    <div class="mb-3">
                	        <label for="setting-input-2" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ</label>
                	        <label for="setting-input-2" class="form-label text-danger">*</label>
                	        <input type="text" class="form-control" name="txtPropertyTypeKh" id="txtPropertyTypeKh" required value="' . $txtKh . '" >
                	    </div>
                	    <div class="mb-3">
                	        <label for="setting-input-3" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខអង់គ្លេស</label>
                	        <label for="setting-input-2" class="form-label text-danger">*</label>
                	        <input type="text" class="form-control" name="txtPropertyTypeEn" id="txtPropertyTypeEn" required value="' . $txtEn . '" >
                	    </div>
                	    <div class="mb-3">
                	        <label for="setting-input-3" class="form-label">បរិយាយ</label>
                	        <textarea type="text" class="form-control" name="txtDesc" id="txtDesc"style="height: auto;">' . $txtDesc . '</textarea>
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
function modalDelete($num)
{
	echo '
	<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
     			 <div class="modal-header">
				  	<label for="setting-input-1" class="form-label d-flex justify-content-center text-success">បំពេញព័ត៌មានប្រភេទនៃអចលនទ្រព្យ</label>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
    			
            
            	</div>
      		</div>
  		</div>
	</div>
	';
}
function modalViewDetail($num, PropertyTypeModel $model)
{
	$txtKh = $model->getkh();
	$txtEn = $model->getEn();
	$txtDesc = $model->getDesc();
	echo '
	<div class="modal fade" id="view_detail' . $num . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered">
  		  <div class="modal-content">
  		    <div class="modal-header">
			  <label for="setting-input-1" class="form-label d-flex justify-content-center text-success">មើលព័ត៌មានលម្អិត</label>
  		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  		    </div>
  		    <div class="modal-body p-4">
				<div class="row  d-flex">		
					<div class="col-auto p-2 text-center text-success" >
					ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ​ ៖
					</div>
					<div  class="col-auto p-2 text-center" >
					' . $txtKh . '
					</div>
				</div>
				<div class="row d-flex">		
					<div class="col-auto p-2 text-start text-success">
					ឈ្មោះប្រភេទអចលនទ្រព្យជាខអង់គ្លេស ៖
					</div>
					<div  class="col-auto p-2 text-start" >
					' . $txtEn . '
					</div>
				</div>
				<div class="row d-flex">		
					<div class="col-auto p-2  text-start text-success" >
					បរិយាយ ៖
					</div>
					<div  class="col-auto p-2  text-start" >
					' . $txtDesc . '
					</div>
				</div>
				
  		    </div>
  		    <div class="modal-footer">
				<button type="button" class="btn border border-danger text-danger px-4" data-bs-dismiss="modal">Close</button>
  		    </div>
  		</div>
  	</div>
	';
}

if (isset($_POST['btnUpdate'])) {
	$id = $_POST['txtPropertyTypeId'];
	$txtKh = $_POST['txtPropertyTypeKh'];
	$txtEn = $_POST['txtPropertyTypeEn'];
	$txtDesc = $_REQUEST['txtDesc'];
	if ($id != '' && trim($txtKh) != '' && trim($txtEn) != '') {
		$model = new PropertyTypeModel($id, $txtKh, $txtEn, $txtDesc);
		updatePropertyType($id, $model);
	} else {
		alertMessage("not work");
	}
}

if (isset($_GET['btnDelete'])) {
	$id = $_GET['txtPropertyTypeId'];
	deletePropertyType($id);
}

if (isset($_POST['reset'])) {
	javaScript('
        document.getElementsByName("txtPropertyTypeId").defaultValue="clear";
      
    ');
}

function updatePropertyType($id, PropertyTypeModel $model)
{
	$isSuccess = queryData('UPDATE tbl_property_type SET
			property_type_kh  = "' . $model->getKh() . '",
			property_type_en ="' . $model->getEn() . '",
		    property_type_desc = "' . $model->getdesc() . '"
			WHERE property_type_id =' . $id . ';
			');
	if ($isSuccess) {
		alertMsgStyle("អ្នកបានកែប្រែទិន្នន័យដោយទទួលបានជោគជ័យ", "success");
	}
	reload('property_type');
}
function insertPropertyType($propertyKh, $propertyEn, $desc)
{
	$isSuccess = queryData("INSERT INTO tbl_property_type (property_type_kh, property_type_en, property_type_desc)
		VALUES ('$propertyKh','$propertyEn' ,'$desc' );");
	if ($isSuccess) {
		alertMsgStyle("អ្នកបានបញ្ចូលទិន្នន័យដោយជោគជ័យ", "success");
	}
	
}

function deletePropertyType($id)
{
	$isSuccess = queryData('DELETE FROM tbl_property_type
							WHERE property_type_id = ' . $id . ';
							');
	if ($isSuccess) {
		alertMsgStyle("អ្នកបានលុបទិន្នន័យដោយជោគជ័យ", "success");
	}
	reload('property_type');
}
