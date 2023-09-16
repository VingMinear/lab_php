<div class="app-wrapper p-5">
    <?php


    if (isset($_POST['submit'])) {
        $errors = array();
        $fileName = $_FILES['fileName']['name'];
        $fileSize = $_FILES['fileName']['size'];
        $fileTmp  = $_FILES['fileName']['tmp_name'];
        $fileType = $_FILES['fileName']['type'];

        $fileName_bstr =explode('.',$fileName);
        $fileExt=strtolower(end($fileName_bstr));
        echo $fileExt . ' => ';
        $newFileName = md5(time().$fileName).'.'.$fileExt;
        $ext = array("jpeg","png","jpg","svg","webp","jfif","pjpeg");

        if(in_array($fileExt,$ext)==false){
            $errors[]='Wrong file extension';
        }
        if($fileSize>2097151){
            $errors[]='File size must be excactly 2MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($fileTmp, "files/".$newFileName);
            echo "Success";
            echo '<img src="./files/'.$newFileName.'" />';
        
        } else {
            print_r($errors);
           
        }
       
       reload("index.php");
    }

    ?>
    <form class="settings-form" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">រូបភាព</label>
            <input class="form-control p-1 ps-1 " name="fileName" style="font-size:18px" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label class="d-block ">Temp :<?= $fileTmp ?? '' ?></label>
            <label class="d-block ">name :<?= $fileName ?? '' ?></label>
            <label class="d-block ">size :<?= $fileSize ?? '' ?></label>
            <label class="d-block ">type :<?= $fileType ?? '' ?></label>
        </div>

        <button type="submit" name="submit" value="Upload" class="ms-2 btn app-btn-primary px-4">បង្កើត</button>

    </form>
</div>