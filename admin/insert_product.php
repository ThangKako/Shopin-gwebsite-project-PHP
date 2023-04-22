<?php
include('../include/connect.php');
//điều kiện
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // add img
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    // ten truy cap img

    $temp_img1=$_FILES['product_img1']['tmp_name'];
    $temp_img2=$_FILES['product_img2']['tmp_name'];
    $temp_img3=$_FILES['product_img3']['tmp_name'];

    // kt dieu kien trong
    if ($product_title == '' || $product_description == '' || $product_keyword == '' ||  $product_category == '' || $product_brand == '' ||  $product_price == '' || $product_img1 == '' || $product_img2 == '' || $product_img3 == '') {
        echo "<script>alert('Hãy điền đủ tất các thông tin')</script>";
        exit();
    } else {
        $img1_uploaded = move_uploaded_file($temp_img1, "./product_img/$product_img1");
        $img2_uploaded = move_uploaded_file($temp_img2, "./product_img/$product_img2");
        $img3_uploaded = move_uploaded_file($temp_img3, "./product_img/$product_img3");
    
        if (!$img1_uploaded || !$img2_uploaded || !$img3_uploaded) {
            echo "<script>alert('Lỗi khi tải lên hình ảnh')</script>";
            exit();
        }
    
        // Truy vấn
        $insert_products="INSERT INTO `products`(product_title,product_description,product_keyword,category_id,brand_id,product_img1,product_img2,product_img3,product_price,Date,Status) 
        VALUES('$product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_img1','$product_img2','$product_img3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
    
        if($result_query){
            // sửa lỗi chính tả trong lệnh alert
            echo "<script>alert('Thêm thành công')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
        
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Thêm sản phẩm</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" type="text/css" href="../stlye.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- font Awsome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' type='text/css' media='screen' href='../admin/style.css'>
    <script src='main.js'></script>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Thêm sản phẩm </h1>
        <!-- đăng-->
        <form action="" method="post"enctype="multipart/form-data"><!-- phuong thuc pose-->
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_title" class="form-label">
                Tên sản phẩm
                </lable>
                <input type="text" id="product_title"  class="form-control"name="product_title" placeholder="Enter" autocomplete="off" required="required">
            </div>
            <!--Mô tả-->
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_description" class="form-label">
                Mô tả
                </lable>
                <input type="text" id="product_description"  class="form-control"name="product_description" placeholder="Enter" autocomplete="off" required="required">
            </div>
            <!--Từ khóa-->
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_keyword" class="form-label">
                Từ khóa sản phẩm
                </lable>
                <input type="text" id="product_keyword"  class="form-control"name="product_keyword" placeholder="Enter" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Danh mục sản phẩm</option>
                    <?php
                    //tao 1 bien
                    $select_query="Select * From `category`";//truy vấn tham so
                    $result_query=mysqli_query($con,$select_query);//tham so ket noi va bien truy van
                    //chon all tu database
                    while($row=mysqli_fetch_assoc($result_query)){
                        //truy cap
                        //trich xuat
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                    
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Thương hiệu sản phẩm</option>
                    <?php
                    //tao 1 bien
                    $select_query="Select * From `brand`";//truy vấn tham so
                    $result_query=mysqli_query($con,$select_query);//tham so ket noi va bien truy van
                    //chon all tu database
                    while($row=mysqli_fetch_assoc($result_query)){
                        //truy cap
                        //trich xuat
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>
<!-- img -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_img1" class="form-label">
                Ảnh
                </lable>
                <input type="file" id="product_img1"  class="form-control"name="product_img1" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_img2" class="form-label">
                Ảnh
                </lable>
                <input type="file" id="product_img2"  class="form-control"name="product_img2" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_img3" class="form-label">
                Ảnh
                </lable>
                <input type="file" id="product_img3"  class="form-control"name="product_img3" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_price" class="form-label">
                Giá tiền
                </lable>
                <input type="text" id="product_price"  class="form-control"name="product_price" placeholder="Enter" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                
                <input type="submit" name="insert_product" class="btn btn-outline-danger mb-3 px-3" value="Thêm ">
            </div>
        </form>
    </div>
<?php 

?>   
</body>
</html>