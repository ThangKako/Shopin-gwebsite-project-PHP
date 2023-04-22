<?php
include('../include/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];

    //chon dữ liệu từ database
    $select_query="Select * From `brand` where brand_title='$brand_title'"; 
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('Nhãn hiệu này đã tồn tại trong cơ sở dữ liệu')</script>";
    }
    //Thêm dữ liệu vào database
    else{
        $insert_query="insert into `brand` (brand_title) values('$brand_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        // sửa lỗi chính tả trong lệnh alert
        echo "<script>alert('Thêm thành công')</script>";
        echo "<script>window.open('./index.php?view_brand','_self')</script>";
    }
    }

}
?>

<h2 class="text-center">Thêm nhãn hiệu</h2>
<form action="" method="post" class=""mb-2>
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-so;id fa-receipt"></i></span>
    <input type="text" class="form-control"name="brand_title" placeholder="Thêm nhãn hiệu" aria-label="Nhãn Hiệu" aria-describedby="basic-addon1">
</div>
<div class=""input-group w-10 mb-2 m-auto>

  <input type="submit" class="form-control btn btn-outline-danger" name="insert_brand" value="Thêm nhãn hiệu" >

</div>
</form>