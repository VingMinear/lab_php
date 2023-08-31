<?php
function alertMessage(string $msg)
{
    echo "<script type='text/javascript'>
			alert('$msg');
		</script>";
}
function alertMsgStyle($msg, $type)
{
    switch ($type) {
        case 'success':
            echo '
            <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $msg . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            break;
        case 'error':
            echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>' . $msg . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            break;
    }
}

function javaScript($statement){
    echo "<script type='text/javascript'>
    $statement
    </script>";
}


?>