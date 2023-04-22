<?php 
if (isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    //echo $edit_brand;

    $get_brand="Select * from `brand` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brand);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
    //echo $brand_title;
}

if (isset($_POST['edit-cat'])){ // sửa lỗi chính tả ở đây
    $cat_title=$_POST['brand_title'];
    // thêm dấu nháy đơn vào truy vấn để đảm bảo rằng $cat_title là chuỗi
    $update_query="UPDATE `brand` SET brand_title='$cat_title' WHERE brand_id=$edit_brand";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        // sửa lỗi chính tả trong lệnh alert
        echo "<script>alert('Danh mục sản phẩm đã được cập nhật')</script>";
        echo "<script>window.open('./index.php?view_brand','_self')</script>";
    }
}
?>
<div class="container mt-3">
    <h1 class="text-center text-success">Thương hiệu </h1>
    <form action="" method="post" class="text-center" >
        <div class="form-group w-50 m-auto">
            <label for="brand_title" class="form-label">Tên Thương hiệu</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value='<?php echo $brand_title?>'>
            <input type="submit" value="Làm mới" class="btn btn-outline-success px-3 mt-3" name="edit-cat">
        </div>
    </form>
</div>



<!--
    div class="container mt-3">
    <h1 class="text-center">Sửa thông tin danh mục - Loại sản phẩm</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 a-auto">
            <label for="brand_title" class="form-label"> Tên Danh mục - Loại sản phẩm</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required="required">
        </div>
        <input type="submit" value="Update brand" class="btn btn-outline px-3 mb-3">
    </form>
</div>
-->
