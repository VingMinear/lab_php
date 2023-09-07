<?php
$page = "overview.php";
$tab=1;
if (isset($_GET['page'])) {
	$slider = false;
	$routePage = $_GET['page'];
	if(isset($_GET['tab'])){
		$tab=$_GET['tab'];
	}
	switch ($routePage) {
		case "docs":
			$page = "upload.php";
			break;
		case "property":
			$page = "property.php";
			break;
		case "property_type":
			$page = "property_type.php";
			break;
		case "create_property":
			$page ="create_property.php";
			break;
		case "charts":
			$page = "charts.php";
			break;
		case "help":
			$page = "help.php";
			break;
		case "setting":
			$page = "setting.php";
			break;
		case "404":
			$page = "404.php";
			break;
		default:
			$page = "overview.php";
			break;
	}
}
?>
<?php
include "../config/db.php";
include "./controllers/query.php";
include "./controllers/property_type_controller.php";


?>

<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php" ?>
<body class="app">
	<!--------------- NavBar -------------->
	<?php
	if ($page == "404.php" || $page == "login.php" || $page == "signup.php") {
	} else {
		include "includes/nav_bar.php";
	}
	?>
	<!-----------------end---------------->
	<!--------------- Body -------------->
	<?php include "pages/$page" ?>
	<!-----------------end---------------->

</body>
<?php include "includes/javascript.php" ?>

</html>