<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete acount</title>
</head>
<body>
    <h3 class=" text-danger text-center mb-4"> Xoá tài khoản</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Xóa tài khoản">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Không xóa">
        </div>
    </form>

    <?php 
    $username_session=$_SESSION['username'];
    if (isset($_POST['delete'])) {
        // Xóa tài khoản khỏi bảng user_table
        $sql = "DELETE FROM user_table WHERE username= '$username_session'";
        $result=mysqli_query($con,$sql);
        if($result){
            session_destroy();
            echo"<script>alert('Tài khoản đã bị xóa')</script>";
            echo"<script>window.open('../index.php','_self')</script>";
        }
    }
    if (isset($_POST['dont_delete'])) {echo"<script>window.open('../index.php','_self')</script>";}
    ?>
</body>
</html>