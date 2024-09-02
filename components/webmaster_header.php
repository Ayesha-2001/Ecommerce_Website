<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="../webmaster/dashboard.php" class="logo">Webmaster<span>Panel</span></a>

      <nav class="navbar">
         <a href="../webmaster/dashboard.php">Home</a>
         <a href="../webmaster/products.php">Products</a>
         <a href="../webmaster/placed_orders.php">Orders</a>
         <a href="../webmaster/admin_accounts.php">Admins</a>
         <a href="../webmaster/users_accounts.php">Users</a>
         <a href="../webmaster/messages.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `webmaster` WHERE id = ?");
            $select_profile->execute([$webmaster_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['username']; ?></p>
         <!-- <a href="../webmaster/update_profile.php" class="btn">Update Profile</a> -->
         <a href="../components/webmaster_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>