<?php
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $useremail = $row_fetch['useremail'];
    $user_address = $row_fetch['user_address'];
    $phone = $row_fetch['phone'];
}
if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $username = $_POST['user_username'];
    $useremail = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $phone = $_POST['phone'];
    $user_image = $_FILES['user_img']['name'];
    $user_img_tmp = $_FILES['user_img']['tmp_name'];
    move_uploaded_file($user_img_tmp, "./user_imgs/$user_image");


    $update_data = "update `user_table`set username= '$username',useremail='$useremail', user_img='$user_image', user_address='$user_address', phone='$phone' where user_id=$update_id";
    $result_query_update = mysqli_query($con, $update_data);
    if ($result_query_update) {
        echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại để làm mới thông tin')</script>";
        echo "<script>window.open('user_logout.php','_self')</script>";
    } else {
        echo "<script>alert('error')</script>";
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
</head>

<body>
    <h3 class="text-center text-success mb-4">Thay đổi thông tin</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $username ?>" class="form-control w-50 m-auto" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $useremail ?>" class="form-control w-50 m-auto" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto " name="user_img"><img src="./user_imgs/<?php echo $user_image ?>" alt="" class="edit_img">
        </div>
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $user_address ?>" class="form-control w-50 m-auto" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $phone ?>" class="form-control w-50 m-auto" name="phone">
        </div>
        <input type="submit" value="Update" class="btn btn-outline-success py-2 px-3" name="user_update">
    </form>
</body>

</html>