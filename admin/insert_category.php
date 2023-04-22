<?php
include('../include/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];

    //chon dữ liệu từ database
    $select_query="Select * From `category` where category_title='$category_title'"; 
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('Danh mục này đã tồn tại trong cơ sở dữ liệu')</script>";
    }
    //Thêm dữ liệu vào database
    else{
        $insert_query="insert into `category` (category_title) values('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        // sửa lỗi chính tả trong lệnh alert
        echo "<script>alert('Thêm thành công')</script>";
        echo "<script>window.open('./index.php?view_category','_self')</script>";
    }
    }
       
}
?>
<h2 class="text-center">Thêm danh mục</h2>
<form action="" method="post" class=""mb-2>
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-so;id fa-receipt"></i></span>
    <input type="text" class="form-control"name="cat_title" placeholder="Thêm danh mục" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class=""input-group w-10 mb-2 m-auto>
  <input type="submit" class="form-control btn btn-outline-danger" name="insert_cat" value="Thêm danh mục" >
  
</div>
</form>