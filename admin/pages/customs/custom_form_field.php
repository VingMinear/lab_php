<?php 
    function customFormField(string $title){
        echo '<div class="mb-3">
                <label for="setting-input-3" class="form-label">'.$title.'</label>
                <label for="setting-input-2" class="form-label text-danger">*</label>
                <input type="email" class="form-control" id="setting-input-3" value="" required>
            </div>'; 
            
    }
?>