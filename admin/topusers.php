<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <!-- plugins:css -->
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
      #color{
        color:blue !important;
        background-color: white !important;
      }
    </style>
</head>
<body>
  <h1 class="text-center text-danger ">TOP CUSTOMERS</h1>
    <div class="row text-center mt">
              <div class="col-lg-11 col-md-10 col-xl-8 col-sm-6 grid-margin mx-auto rounded ">
            
                      <table class="table text-white my-2">
                        <thead id="color">
                          <tr id="color">
                            <th> Rank </th>
                            <th> Customer Name </th>
                            <th> Total Shopping </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                     $i=1;
                         $row = mysqli_query($con,"SELECT customername, SUM(netamount) AS total_spent
                         FROM ordertb
                         GROUP BY customername
                         ORDER BY SUM(netamount) DESC
                         LIMIT 10
                        ;");
                         while($data = mysqli_fetch_array($row))
                         {
                             
                             echo 
                             '
                             <tr class="border" >
                             <td class="border text-danger fw-bold fs-2" >'.$i++.'</td>
                             <td class="border fw-bold fs-3 text-uppercase">'.$data[0].'</td>
                             <td class="border">RS. '.$data[1].'</td>
                             </tr>
                             
                             ';
                         
                         }  
                         

                     ?>

                        </tbody>
                      </table>
                    </div>
               
    </div>
     
</body>
</html>