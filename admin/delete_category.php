<?php 
if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];

    //
    $delete_query="Delete from `category` where category_id=$delete_category";
    $result=mysqli_query($con,$delete_query);
    if($result){
        // sửa lỗi chính tả trong lệnh alert
        echo "<script>alert('Xóa thành công')</script>";
        echo "<script>window.open('./index.php?view_category','_self')</script>";
    }
}
?>