<?php
include("./models/property_model.php");



$msgTitle = '<div class="text-danger mt-2 msg" >សូមបញ្ចូលឈ្មោះអចលនទ្រព្យ *</div>';
$msgPrice = '<div class="text-danger  mt-2 msg">សូមបញ្ចូលតម្លៃអចលនទ្រព្យ *</div>';
$msgSelType = '<div class="text-danger mt-2 msg">សូមជ្រើសរើសប្រភេទអចលនទ្រព្យ *</div>';
$msgSelStatus = '<div class="text-danger mt-2 msg">សូមជ្រើសរើសសន្ថានភាព *</div>';
$msgFile = '<div class="text-danger mt-2 msg">សូមបញ្ចូលរូបភាព *</div>';
$msg1 = $msg2 = $msg3 = $msg4 = $msg5 = '';

if (isset($_POST['btnSubmit'])) {
    $proTypeId = $_POST['sel_pro_type'];
    $proStatusId = $_POST['sel_pro_status'];
    $proTitle = $_POST['txt_title'];
    $proPrice = intval(str_replace(['.', ','], '', $_POST['txt_price']));
    $proDesc = $_POST['txtDesc'] ?? '""';
    if ($proTypeId == '') {
        $msg1 = $msgSelType;
    } else {
        $msg1 = '';
    }
    if ($proStatusId == '') {
        $msg2 = $msgSelStatus;
    } else {
        $msg2 = '';
    }
    if ($proTitle == '') {
        $msg3 = $msgTitle;
    } else {
        $msg3 = '';
    }
    if ($proPrice == '') {
        $msg4 = $msgPrice;
    } else {
        $msg4 = '';
    }
    $errors = array();
    $fileName = $_FILES['fileUpl']['name'];
    $fileSize = $_FILES['fileUpl']['size'];
    $fileTmp  = $_FILES['fileUpl']['tmp_name'];
    $fileType = $_FILES['fileUpl']['type'];
    if ($fileName == '' && $proTitle == '') {
        $msg5 = $msgFile;
    } else {
        $msg5 = '';
        $fileName_bstr = explode('.', $fileName);
        $fileExt = strtolower(end($fileName_bstr));
        $newFileName = md5(time()) . $proTitle . '.' . $fileExt;
        $ext = array("jpeg", "png", "jpg", "svg", "webp", "jfif", "pjpeg", "gif");
        if (in_array($fileExt, $ext) == false) {
            $errors[] = 'Wrong file extension';
        }
        if ($fileSize > 2097151) {
            $errors[] = 'File size must be excactly 2MB';
        }

        if (empty($errors) == true) {
            if ($proTypeId != '' && $proStatusId != '' && $proTitle != '' && $proPrice != '' && $fileName != '') {
                move_uploaded_file($fileTmp, "assets/images/property/" . $newFileName);
                $model = new PropertyModel($proTitle, $proPrice, $newFileName, $proDesc, $proStatusId, $proTypeId);
                insertProperty($model);
            }
        } else {
            alertMsgStyle($errors[0], 'error');
        }
        reload("index.php?page=create_property");
    }
}
if (isset($_GET['btnDeletePro'])) {
    $proId = $_GET['pId'];
    deleteProperty($proId);
    reload('index.php?page=property&tab=1');
}

function getProperty($id)
{
    //
    $result = queryData('SELECT * from tbl_property WHERE property_id =' . $id . ';');
    $row = mysqli_fetch_array($result);
    $data = new PropertyModel($row['1'], $row['2'], $row['3'], $row['4'], $row['6'], $row['5']);
    return $data;
}
function insertProperty(PropertyModel $model)
{
    $isSuccess = queryData('
    INSERT INTO tbl_property (property_name,property_price,property_desc,property_img,property_type_id,property_status_id)
    VALUES ("' . $model->name . '",' . $model->price . ',"' . $model->desc . '","' . $model->image . '","' . $model->typeId . '","' . $model->statusId . '");
    ');
    if ($isSuccess) {
        alertMsgStyle("អ្នកបានបញ្ចូលទិន្នន័យដោយជោគជ័យ", "success");
    }
}
function deleteProperty($id)
{
    $isSuccess = queryData('DELETE FROM tbl_property
							WHERE property_id = ' . $id . ';
							');
    if ($isSuccess) {
        alertMsgStyle("អ្នកបានលុបទិន្នន័យដោយជោគជ័យ", "success");
    }
}
function modalViewDetailProperty($num, PropertyModel $model)
{
    $name = $model->name;
    $price = $model->price;
    $img = $model->image;
    $status = $model->statusId;
    $type = $model->typeId;
    $desc = $model->desc;
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
					ឈ្មោះអចលនទ្រព្យ​ ៖
					</div>
					<div  class="col-auto p-2 text-center" >
					' . $name . '
					</div>
				</div>
				<div class="row d-flex">		
					<div class="col-auto p-2 text-start text-success">
					តម្លៃអចលនទ្រព្យ ៖
					</div>
					<div  class="col-auto p-2 text-start" >
					' . $price . '
					</div>
				</div>
                <div class="row d-flex">		
					<div class="col-auto p-2 text-start text-success">
					ស្ថានភាព ៖
					</div>
					<div  class="col-auto p-2 text-start" >
					' . $status . '
					</div>
				</div>
                <div class="row d-flex">		
					<div class="col-auto p-2 text-start text-success">
					ប្រភេទអចលនទ្រព្យ ៖
					</div>
					<div  class="col-auto p-2 text-start" >
					' . $type . '
					</div>
				</div>
                <div class="row d-flex">		
					<div class="col-auto p-2 text-start text-success">
					រូបភាព ៖
					</div>
					<div  class="col-auto p-2 text-start" >
                    <img src="./assets/images/property/' . $img . '" class="img-fluid rounded shadow-2-strong border" style="width: 45px; height: 45px">
					</div>
				</div>
				<div class="row d-flex">		
					<div class="col-auto p-2  text-start text-success" >
					បរិយាយ ៖
					</div>
					<div  class="col-auto p-2  text-start" >
					' . $desc . '
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
