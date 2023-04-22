<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    //echo $product_title;
    $product_price=$row['product_price'];
    $product_img1=$row['product_img1'];
    $product_img2=$row['product_img2'];
    $product_img3=$row['product_img3'];


    $select_category="Select * from `category` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    //echo $category_title;

    $select_brand="Select * from `brand` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
    //echo $brand_title;
}
?>
<div class="container" mt-5>
    <h1 class="text-center"> Sửa thông tin sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="form-outline mt-5 w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Tên sản phẩm</label>
            <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control" required="required">

        </div>
        <div class="form-outline mt-5 w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Mô tả Sản phẩm</label>
            <input type="text" id="product_description"  value="<?php echo $product_description ?>" name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline mt-5 w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label">Từ khóa tìm kiếm</label>
            <input type="text" id="product_keyword" name="product_keyword"  value="<?php echo $product_keyword ?>" class="form-control" required="required">
        </div>
        <div class="form-outline mt-5 w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Danh mục - Loại sản phẩm</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title?>"><?php echo $category_title;?></option>
                <?php 
                $select_category_all="Select * from `category`";
                $result_category_all=mysqli_query($con,$select_category_all);
                while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo " <option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mt-5 w-50 m-auto mb-4">
        <label for="product_brand" class="form-label">Nhãn hàng - Thương hiệu</label>
            <select name="product_brand" class="form-select">
                <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>
                <?php 
                $select_brand_all="Select * from `brand`";
                $result_brand_all=mysqli_query($con,$select_brand_all);
                while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                    $brand_title=$row_brand_all['brand_title'];
                    $brand_id=$row_brand_all['brand_id'];
                    echo " <option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <lable for="product_img1" class="form-label">
                Ảnh
            </lable>
            <div class="d-flex">
            <input type="file" id="product_img1"  class="form-control w-90 m-auto" name="product_img1" required="required">
            <img src="./product_img/<?php echo $product_img1 ?>"alt ="" class="product_img">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <lable for="product_img2" class="form-label">
                Ảnh 2
            </lable>
            <div class="d-flex">
            <input type="file" id="product_img2"  class="form-control w-90 m-auto" name="product_img2" required="required">
            <img src="./product_img/<?php echo $product_img2 ?>"alt ="" class="product_img">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <lable for="product_img3" class="form-label">
                Ảnh 3
            </lable>
            <div class="d-flex">
            <input type="file" id="product_img3"  class="form-control w-90 m-auto" name="product_img3" required="required">
            <img src="./product_img/<?php echo $product_img3 ?>"alt ="" class="product_img">
            </div>
        </div>
        <div class="form-outline mt-5 w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Giá tiền</label>
            <input type="text" id="product_price" value="<?php echo $product_price ?>"name="product_price" class="form-control" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update" class="btn btn-outline-danger">
        </div>
    </form>
</div>

<?php 
if(isset($_POST['edit_product'])){
    
    $product_title=$_POST['product_title'];
    
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    
    $product_price=$_POST['product_price'];

    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    $temp_img1=$_FILES['product_img1']['tmp_name'];
    $temp_img2=$_FILES['product_img2']['tmp_name'];
    $temp_img3=$_FILES['product_img3']['tmp_name'];

    // kiem tra cac truong trong hay khong
    if($product_title== '' or $product_description== '' or $product_keyword=='' or  $product_category=='' or $product_brand=='' or  $product_price=='' or $product_img1=='' or $product_img2=='' or $product_img3==''){
        echo "<script>alert('Hãy điền đủ tất các thông tin')</script>";
    }else{
        move_uploaded_file($temp_img1,"./product_img/$product_img1");
        move_uploaded_file($temp_img2,"./product_img/$product_img2");
        move_uploaded_file($temp_img3,"./product_img/$product_img3");

        //Truy vấn
        $update_products=" UPDATE `products` set product_title='$product_title',product_description='$product_description',product_keyword='$product_keyword',category_id='$product_category',brand_id='$product_brand',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',Date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_products);
        if($result_update){
            echo "<script>alert('Update thành công')</script>";
            echo "<script>window.open('./insert_product.php','_self'))</script>";
        }
    }
}
?>