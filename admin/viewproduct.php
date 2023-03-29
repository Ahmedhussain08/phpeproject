<?php
include("connect.php");
$error = '';
$success = false;
if(isset($_GET['deletepro'])){

    try {
        $deletepro = $_GET['deletepro'];
        $sql = mysqli_query($con,"delete from product where pid = '$deletepro'");
        $success = true;
    }
    catch (mysqli_sql_exception $e) {
        // Display your custom error message
        $error= "<p class='text-danger mx-2 my-1'>Unable to delete product: This product is currently in orders</p>";
    }
}
if ($success) {
    header("location:index.php?viewproduct");
    exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
        #card .card-title,
		.card-text {
			display: -webkit-box !important;
			-webkit-line-clamp: 1 !important;
			-webkit-box-orient: vertical !important;
			overflow: hidden;
		}

		#card {
			transition: 0.1s ease-in-out;
		}

		#card:hover {
			transform: scale(1.040);
			border: 2px solid black !important;
			box-shadow: 2px 2px solid black;
		}
    </style>
</head>
<body>
    <p class=""><?php echo $error; ?></p>
<div class="row text-center">

    <?php
    $product = mysqli_query($con, "select * from product");
    while ($row = mysqli_fetch_array($product)) {
    ?>
        <div class="col-md-4 col-lg-3 col-sm-5 -auto my-2">
            <div id="card" class="card my-1 bg-dark border border-white" style="width: 12rem;">
                <img style="height:130px ;" src="productimages/<?php echo $row[4] ?>" class="card-img-top img-fluid " alt="...">
                <div class="card-body white">
                    <h5 class="card-title text- fw-bold mb-3"><?php echo $row[1] ?></h5>
                    <p class="card-text  text- mt-1"><?php echo $row[3] ?></p>
                    <p href="" class="text-primary mt-2 fw-bold"> RS. <?php echo $row[2] ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="edit-product.php?editpro=<?php echo $row[0] ?>" class="btn btn-secondary">Edit</a>
                        <a href="viewproduct.php?deletepro=<?php echo $row[0] ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>