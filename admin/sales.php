<?php 
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row text-center">
           
           <div class="col-md-10 col-sm-4 grid-margin mx-auto">
             <div class="card">
               <div class="card-body">
                 <h2 class="text-warning my-2">TOTAL SALE </h2>
                 <div class="row">
                   <div class="col-8 col-sm-12 col-xl-8 my-auto">
                     <div class="d-flex d-sm-block d-md-flex align-items-center justify-content-center p-3">
                       <?php 
                       $sql = mysqli_query($con,"select sum(netamount) from ordertb ");
                       $sales = mysqli_fetch_array($sql);
                         ?>
                   <?php  echo  '<h2 class="mb-1 mt-2 text-success text-center">&#x20B9 ' .$sales[0]. ' <span class="text-white"> PKR </span>  </h2>' ?>
                     </div>
                     <h6 class="text-muted font-weight-normal"> Since Start From Now</h6>
                   </div>
                   <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                     <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>
          
            
         </div>
</body>
</html>

