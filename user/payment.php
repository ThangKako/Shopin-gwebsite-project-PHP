<?php 
include('../include/connect.php');
include('../function/common_funtion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương thức thanh toán</title>
    <link rel='stylesheet' type='text/css' media='screen' href='user.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<?php
$user_ip = getIPAddress();
$sql = "SELECT * FROM user_table";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$user_id =  $row["user_id"];
?>
<!--//$user_ip = getIPAddress();
//$get_user = "SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
//$result = mysqli_query($con, $get_user);
//$run_query = mysqli_fetch_array($result);
/*
if (isset($run_query['user_id']) && !empty($run_query['user_id'])) {
  $user_id = $run_query['user_id'];
} else {
  // Handle the case when user_id is not set or empty
} -->
<div class="container">
  <h2 class="text-center text-danger"></h2>
  <div class="row d-flex justify-content-center align-item-center my-5">
    
    <div class="col-md-6">
      <?php if (isset($user_id) && !empty($user_id)): ?>
        <a href="order.php?user_id=<?php echo $user_id ?>"><img src="../img/features/628245.png" alt=""><h2 class="text-center text-decoration-none"></h2></a>
      <?php else: ?>
        <h2 class="text-center">User ID is not set or empty</h2>
      <?php endif; ?>
    </div>
  </div>
</div>
<div>

</div>
</body>
</html>