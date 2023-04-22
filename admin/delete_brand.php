<?php 
if(isset($_GET['delete_brand'])){
    $delete_brand=$_GET['delete_brand'];

    //
    $delete_query="Delete from `brand` where brand_id=$delete_brand";
    $result=mysqli_query($con,$delete_query);
    if($result){
        // sửa lỗi chính tả trong lệnh alert
        echo "<script>alert('Xóa thành công')</script>";
        echo "<script>window.open('./index.php?view_brand','_self')</script>";
    }
}

?>