<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>
   <link rel="icon" type="image/x-icon" href="../Images/Home.png">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>



<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

  

   <div class="box">
      <?php
         $total_pendings = 0;
         $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status ='pending'");
         $select_pendings->execute();
         $numbers_of_orders1 = $select_pendings->rowCount();
      ?>
      <h3><span>Total Pending</span><span></span></h3>
      <p><?= $numbers_of_orders1 ?></p>
      <a href="placed_orders.php" class="btn">see orders</a>
   </div>

   <div class="box">
      <?php
         
         $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = 'completed'");
         $select_completes->execute();
         $numbers_of_orders = $select_completes->rowCount();
      ?>
      <h3><span>Total completed</span><span></span></h3>
      <p><?= $numbers_of_orders; ?></p>
      <a href="placed_orders.php" class="btn">see orders</a>
   </div>

   <div class="box">
      <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders`");
         $select_orders->execute();
         $numbers_of_orders = $select_orders->rowCount();
      ?>
      <h3>Total orders</h3>
      <p><?= $numbers_of_orders; ?></p>
      <a href="placed_orders.php" class="btn">see orders</a>
   </div>

   <div class="box">
      <?php
         $select_products = $conn->prepare("SELECT * FROM `products`");
         $select_products->execute();
         $numbers_of_products = $select_products->rowCount();
      ?>
      <h3>Product added</h3>
      <p><?= $numbers_of_products; ?></p>
      <a href="products.php" class="btn">see products</a>
   </div>

   <div class="box">
      <?php
         $select_users = $conn->prepare("SELECT * FROM `users`");
         $select_users->execute();
         $numbers_of_users = $select_users->rowCount();
      ?>
      <h3>User Account</h3>
      <p><?= $numbers_of_users; ?></p>
      <a href="users_accounts.php" class="btn">see users</a>
   </div>

   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `gérant`");
         $select_admins->execute();
         $numbers_of_admins = $select_admins->rowCount();
      ?>
      <h3>gerant</h3>
      <p><?= $numbers_of_admins; ?></p>
      <a href="gerant_accounts.php" class="btn">Voir gerant</a>
   </div>
   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `gestionnaire`");
         $select_admins->execute();
         $numbers_of_admins = $select_admins->rowCount();
      ?>
      <h3>Gestionnaire</h3>
      <p><?= $numbers_of_admins; ?></p>
      <a href="Gestionnaire_accounts.php" class="btn">Voir Gestionnaire</a>
   </div>

   <div class="box">
      <?php
         $select_messages = $conn->prepare("SELECT * FROM `messages`");
         $select_messages->execute();
         $numbers_of_messages = $select_messages->rowCount();
      ?>
      <h3>New messages</h3>
      <p><?= $numbers_of_messages; ?></p>
      <a href="messages.php" class="btn">Voir messages</a>
   </div>

   </div>

</section>



<script src="../js/admin_script.js"></script>

</body>
</html>