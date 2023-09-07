<?php

if (isset($_POST['save'])) {
    $error = array();
    $fileName = $_FILES['fileName']['name'];
    $fileSize = $_FILES['fileName']['size'];
    $fileTmp  = $_FILES['fileName']['tmp_name'];
    $fileType = $_FILES['fileName']['type'];
}

?>
<div class="app-wrapper p-5">

    <form class="settings-form" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">រូបភាព</label>
            <input class="form-control p-1 ps-1 " name="fileName" style="font-size:18px" type="file" id="formFile">
        </div>

        <?php
        if (isset($_POST['save'])) {
        ?>
            <label for="setting-input-3" class="form-label">Temp :<?= $fileTmp ?></label>
            <label for="setting-input-3" class="form-label">name :<?= $fileName ?></label>
            <label for="setting-input-3" class="form-label">size :<?= $fileSize ?></label>
            <label for="setting-input-3" class="form-label">type :<?= $fileType ?></label>
        <?php } ?>
        <button type="submit" name="create" value="Upload" class="ms-2 btn app-btn-primary px-4">បង្កើត</button>

    </form>
</div>