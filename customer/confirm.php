<?php
session_start();

if(!isset($_SESSION['customer_email'])){
  echo "<script>window.open('../checkout.php','_self')</script>";
}else{

include("includes/db.php");
include("functions/functions.php");
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Shopping Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div id="top"><!--Top bar start-->
        <div class="container"><!--container start--> 
            <div class="col-md-6 offer"><!--col-md-6 start--> 
                <a href="#" class="btn btn-success btn-sm">

                  <?php
                    if(!isset($_SESSION['customer_email'])){
                        echo "Welcome: Guest";
                    }else{
                        echo "Welcome: " . $_SESSION['customer_email'] . "";
                    }


                    ?>
                </a>
                <a href="checkout.php"><?php items(); ?> Items In Your Cart | Total Price: <?php totalPrice(); ?></a>

            </div><!--col-md-6 end--> 
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="../customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="my_account.php">My Account</a>
                    </li>
                    <li>
                        <a href="../cart.php">Goto Cart</a>
                    </li>
                    <li>
                        <a href="../checkout.php">
                            
                             <?php
                         if(!isset($_SESSION['customer_email'])){
                          echo "<a href= 'checkout.php'>Login</a>";
                         }else{
                        echo "<a href= 'logout.php'>Logout</a>";
                        }


                    ?>
                        </a>
                    </li>


                </ul>

            </div>

        </div><!--container end-->

    </div><!--Top bar end-->

    <div class="navbar navbar-default" id="navbar"><!--navbar navbar-default start-->
        <div class="container">
            <div class="navbar-header"> <!--navbar-header start -->
                <a class="navbar-brand home" href="../index.php">
                    <img src="images/logo2.jpg" alt="Online Shopping Store" class="hidden-xs">
                    <img src="images/logosm2.jpg" alt="Online Shopping Store" class="visible-xs">
                   
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collpase" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search"></i>
                    
                </button>    
                
            </div><!--navbar-header end-->
            <div class="navbar-collapse collapse" id="navigation"> <!--navbar-collapse collapse start -->
                
                <div class="padding-nav"> <!--padding-nav start -->
                    <ul class="nav navbar-nav navbar-left">
                        <li >
                            <a href="../index.php">Home</a>
                        </li>
                         <li>
                            <a href="../shop.php">Shop</a>
                        </li>
                         <li class="active">
                            <a href="my_account.php">My Account</a>
                        </li>
                         <li>
                            <a href="../cart.php">Shopping Cart</a>
                        </li>
                        
                         <li>
                            <a href="../contactus.php">Contact Us</a>
                        </li>
                        
                    </ul>
                    
                </div> <!--padding-nav end-->
                <a href="../cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> items In Cart</span>
                    

                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                        
                    </button>
                    
                </div>
                    <div class="collpase clearfix" id="search">
                       <form class="navbar-form" method="get" action="result.php">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="search" class="form-control" required>
                        <span class="input-group-btn">
                            <button type="submit" value="search" name="search" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                            
                            
                        </div>
                           
                       </form>
                    </div>

            </div><!--navbar-collapse collapse end -->

        </div>
       </div>

         <div id="content">
     <div class="container"> <!--Container Start-->
       <div class="col-md-12"><!--col-md-12 Start-->
          <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li>
              My Account
            </li>
          </ul>         
       </div><!--col-md-12 End-->
       <div class="col-md-3">

    <?php

    include("includes/sidebar.php");
    ?>
  </div>

  <div class="col-md-9">
     <div class="box">
                    <h1 align="center">Please confirm Your payment</h1>
                    <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data"><!-- form Begin -->

            <div class="form-group">
               <label>Invoice Number</label>
               <input type="text" class="form-control" name="invoice_no" required="">
             </div>

             <div class="form-group">
               <label>Amount</label>
               <input type="text" class="form-control" name="amount" required="">
             </div>

             <div class="form-group">
               <label>Select Payment Mode</label>
               <select class="form-control" name="payment_mode">
                 <option>Bcash</option>
                 <option>Rocket</option>
                 <option>Ucash</option>
                 <option>Bank Transfer</option>
               </select>
             </div>

             <div class="form-group">
               <label>Transection Number</label>
               <input type="text" class="form-control" name="ref_no" required="">
             </div>

             <div class="form-group"><!-- form-group Begin -->                          
                        <label> Reference ID </label>                          
                        <input type="text" class="form-control" name="code" required>   
               </div><!-- form-group Finish -->

             <div class="form-group">
               <label>Payment Date</label>
               <input type="text" class="form-control" name="date" required="">
             </div>

             <div class="text-center">
               <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                 <i class="fa fa-user-md"></i> Confirm Payment
               </button>
             </div>
           </form><!--Form End-->
            <?php
             if(isset($_POST['confirm_payment'])) {
              $update_id=$_GET['update_id'];
              $invoice_no=$_POST['invoice_no'];
              $amount=$_POST['amount'];
              $payment_mode=$_POST['payment_mode'];
              $ref_no=$_POST['ref_no'];
              $code=$_POST['code'];
              $payment_date=$_POST['date'];
              $complete=['Complete'];
              $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($con,$insert_payment);
                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Thank You for purchasing, your orders will be deliverd within 24 hours work')</script>";
                            
                            echo "<script>window.open('my_account.php?my_order','_self')</script>";
                            
                      }
                        
            }
            ?>



                </div>
      
  </div>
  </div>
</div>

    <?php

    include("includes/footer.php");
    ?>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>