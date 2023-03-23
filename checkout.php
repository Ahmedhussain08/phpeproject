<?php
session_start();
include("connect.php");
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
header("location:login.php");

}
if(isset($_POST['order']))
{
    if(isset($_SESSION['cart'])){
        $cus = mysqli_query($con,"select * from customer where cemail = '{$_SESSION["username"]}' or cname = '{$_SESSION["username"]}'");
        $customer= mysqli_fetch_assoc($cus);
        $netamount = 0;
        foreach($_SESSION['cart'] as $key => $value) {
        $netamount += $value['price'] * $value['qty'];

            $product_id = $value['proid'];
            $product_name = $value['name'];
            $price = $value['price'];
            $quantity = $value['qty'];
            $address = $_POST['address'];
            $DOB = $_POST['dob'];
            $remarks = $_POST['remark'];
          
            $sql =  mysqli_query($con,"INSERT INTO ordertb (pid, CustomerID, price, qty, netamount, customername, email,contact, addres,DOB,remarks)
            VALUES ('$product_id', '{$customer['cID']}',  '$price', '$quantity', '$netamount' , '{$customer['cname']}',  '{$customer['cemail']}', '{$customer['ccontact']}', '$address','$DOB','$remarks')");

            if ($sql) {
                unset($_SESSION['cart']);
                header("location:index.php");
            } else {
                // Error message
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
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

    <style>
      .color1{
		color: #717fe0 !important;
	}
    button{
        background-color: #717fe0;
        color: white;
    }
    button:hover{
        cursor: pointer;
        background-color: #6674d1;
    }
    input:hover{
        cursor:text;
    }
        .gradient-custom {
/* fallback for old browsers */

/* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top left, #6674d1, rgb(133, 102, 226));


}
    </style>
</head>
<body>
  <h1 class="text-center color1 my-2">FINALIZE YOUR ORDER</h1>
<div class="container-fluid mt-2">
  <div class="row no-gutters">

  <div class="col-lg-5">
    
    <form method="POST" class="form my-4">
    <div class="col-md-5 col-lg-10 form-group  my-3">
        <label for="Address">Enter Address</label>
        <input class="form-control" name="address" type="text" placeholder="Enter Address" required>
            </div>
    <div class="col-md-5 col-lg-10 form-group  my-3">
    <label for="dob">Enter DATE OF BIRTH</label>
        <input class="form-control" name="dob" type="date" placeholder="Enter DAte Of Birth" required>
            </div>
    
    <div class="col-md-5 col-lg-10 form-group  my-3">
    <label for="Remarks">Add Remarks</label>
        <textarea class="form-control p-3" name="remark" type="text" placeholder="Enter remarks (Optional)" >
        </textarea> </div>

        
            <div class="col-md-5 col-lg-10  my-3">
            <button type="submit" name="order" class="w-100 p-2 btn  " >Place Order</button>

            </div>

    </form>
</div>

    <div class="col-lg-6">

    <div class="card my-2" style="border-radius: 10px;">
              <div style="background-color: #6674d1;" class="card-header text-white px-4 py-3">
                <h5 class=" text-white  mb-0">Thanks for your Order, <span class="">
                <?php $sql = mysqli_query($con,"select * from customer where cemail = '{$_SESSION["username"]}' or cname = '{$_SESSION["username"]}'");
                $row= mysqli_fetch_array($sql);
                echo  $row[1];
              ?>
              </span>!</h5>
              </div>
              <div class="card-body p-2">
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                  <p class="small text-muted mb-0">Receipt Name : <span class="color1"><?php echo $row[1] ?></span></p>
                </div>
                <?php

if(isset($_SESSION['cart'])){
    $totalPrice = 0;
    foreach($_SESSION['cart'] as $key => $value) {
        $totalPrice += $value['price'] * $value['qty'];
?>
        <div class="card shadow-0 border mb-3">
            <div style="border: 1px solid #717fe0;" class="card-body rounded">
                <div class="row">
                    <div class="col-md-2">
                        <img src="admin/productimages/<?php echo $value['image']; ?>" class="img-fluid" alt="Phone">
                    </div>
                    <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0"><?php echo $value['name']; ?></p>
                    </div>
                    <!-- <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small"><?php echo $value['color']; ?></p>
                    </div> -->
                    
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small">Qty: <?php echo $value['qty']; ?></p>
                    </div>
                    <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Price: RS.  <?php echo $value['price'] * $value['qty']; ?></p>

                    </div>
                </div>
                <hr class="mb-2 " style="background-color: #e0e0e0; opacity: 1;">
                <!-- Track Order section goes here -->
            </div>
        </div>
        <?php
    }
        }
        ?>
            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bolder mb-2">Order Details</p>
              <p class="color1 mb-0 mt-4fw-bold fs-20"><span class="text-muted me-4">Total : RS. </span> <?php echo $totalPrice ?> </p>
            </div>

            <div class="d-flex justify-content-between pt-2">
            <p class="color1 fw-bold mb-0"><span class="text-muted me-4">Invoice Number : </span> <?php echo rand(); ?> </p>

            </div>

            <div class="d-flex justify-content-between">
            <p class="color1 fw-bold mb-0"><span class="text-muted me-4">Invoice Date : </span> <?php echo date('d,m,y.'); ?> </p>

            </div>

            <div class="d-flex justify-content-between mb-3">
              <p class="color1 fw-bold mb-0"><span class="text-muted me-4">Delivery Charges : </span> Free</p>
            </div>
          </div>
         
    </div>
  </div>
</div>

</body>
</html>