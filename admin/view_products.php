
    <h1 class="text-center">All products </h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-success text-light">
            <tr>
                <th>Stt</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Giá tiền</th>
                <th>Tổng đã bán</th>
                <th>Trạng thái</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $get_products="SELECT * FROM `products`";
            $result=mysqli_query($con,$get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_img1=$row['product_img1'];
                $product_price=$row['product_price'];
                $Status=$row['Status'];
                $number++;
                ?>
                <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src='./product_img/<?php echo $product_img1 ?>' class='product_img'/></td>
                <td><?php echo $product_price; ?></td>
                <td><?php 
                $get_count="SELECT * from `order_pending` where product_id=$product_id";
                $result_count=mysqli_query($con,$get_count);
                $rows_count=mysqli_num_rows($result_count);
                echo $rows_count;
                ?></td>
                <td><?php echo $Status ?></td>
                <td><a href='index.php?edit_products=<?php echo $product_id ?>' class=''><i class='fa-solid fa-pen-to-square'></i></a></td> 
                <td><a href='index.php?delete_product=<?php echo $product_id ?>' class=''><i class='fa-solid fa-trash'></i></a></td>             
            </tr>
            <?php
            }
           ?> 
        </tbody>
    </table>

