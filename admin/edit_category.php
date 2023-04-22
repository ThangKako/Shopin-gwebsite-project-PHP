<?php 
if (isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    //echo $edit_category;

    $get_category="Select * from `category` where category_id=$edit_category";
    $result=mysqli_query($con,$get_category);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
    //echo $category_title;
}

if (isset($_POST['edit-cat'])){ // sửa lỗi chính tả ở đây
    $cat_title=$_POST['category_title'];
    // thêm dấu nháy đơn vào truy vấn để đảm bảo rằng $cat_title là chuỗi
    $update_query="UPDATE `category` SET category_title='$cat_title' WHERE category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        // sửa lỗi chính tả trong lệnh alert
        echo "<script>alert('Danh mục sản phẩm đã được cập nhật')</script>";
        echo "<script>window.open('./index.php?view_category','_self')</script>";
    }
}
?>
<div class="container mt-3">
    <h1 class="text-center text-success">Sửa danh mục - Loại sản phẩm</h1>
    <form action="" method="post" class="text-center" >
        <div class="form-group w-50 m-auto">
            <label for="category_title" class="form-label">Tên danh mục</label>
            <input type="text" name="category_title" id="category_title" class="form-control" required="required" value='<?php echo $category_title?>'>
            <input type="submit" value="Làm mới" class="btn btn-outline-success px-3 mt-3" name="edit-cat">
        </div>
    </form>
</div>

<!--
    div class="container mt-3">
    <h1 class="text-center">Sửa thông tin danh mục - Loại sản phẩm</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 a-auto">
            <label for="category_title" class="form-label"> Tên Danh mục - Loại sản phẩm</label>
            <input type="text" name="category_title" id="category_title" class="form-control" required="required">
        </div>
        <input type="submit" value="Update Category" class="btn btn-outline px-3 mb-3">
    </form>
</div>
-->
