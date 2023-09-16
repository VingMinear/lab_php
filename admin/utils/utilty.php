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
            <div id="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>' . $msg . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            break;
    }
    removeAlert();
}
function removeAlert()
{
    $statement = '
    setTimeout(function() {
        document.getElementById("alert").remove();
    }, 2500);
    ';
    javaScript($statement);
}
function javaScript($statement)
{
    echo "<script type='text/javascript'>
    $statement
    </script>";
}
function reload($route)
{
    echo '
    <script type="text/javascript"> 
        function myFunction() {
            window.location.replace("index?page='.$route.'");
        }
        setTimeout(myFunction, 2500);
    </script>';
}
