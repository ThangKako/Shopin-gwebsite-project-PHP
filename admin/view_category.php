<h3 class="text-center text-success">Danh mục - Loại sản phẩm</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">
        <tr>
            <th>Stt</th>
            <th>Tên loại sản phẩm</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $select_cart="Select * from `category`";
        $result=mysqli_query($con,$select_cart);//truy vấn và lưu kết quả vào biến $result.
        $number=0;
        //mỗi lần lặp, hàm được sử dụng để lấy dữ liệu của một hàng từ kết quả truy vấn và lưu vào biến $row.
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
        
        ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $category_title ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-success'><i class='fa-solid fa-pen-to-square'></i></a></td><!-- tham số truyền vào là $category_id sẽ được thêm vào URL và gửi đến trang index.php-->
            <td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>  
        </tr>
        <?php 
    } 
    ?>
    </tbody>
</table>