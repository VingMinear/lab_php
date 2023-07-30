<?php
$page = "maincontents.php";
$showSlider = true;
if (isset($_GET['page'])) {
  $showSlider = false;
  $page = $_GET['page'];
  switch ($page) {
    case "contact":
      $page = "contact.php";
      break;
    case "fruit":
      $page = "fruit.php";
      break;
    case "service":
      $page = "service.php";
      break;
    default:
      break;
  }
}
?>

<!DOCTYPE html>
<html>
<?php include "includes/head.php"; ?>

<body>
  <!-- header section strats -->
  <?php include "includes/navbar.php" ?>
  <!-- end header section -->
  <!-- slider section -->
  <?php if ($showSlider) include "includes/slider.php" ?>
  <!-- end slider section -->
  <!-- section -->
  <?php include "$page" ?>
  <!-- footer section -->
  <?php include "includes/footer.php" ?>
</body>

</html>