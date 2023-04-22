<h3 class="text-center text-success">Nhãn hàng - Thương hiệu</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">
        <tr>
            <th>Stt</th>
            <th>Tên Nhãn hiệu</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $select_cart="Select * from `brand`";
        $result=mysqli_query($con,$select_cart);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
        
        ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $brand_title ?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id?>' class=''><i class='fa-solid fa-pen-to-square'></i></a></td> 
            <td><a href='index.php?delete_brand=<?php echo $brand_id?>'  type="button" class="text-danger" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>  
        </tr>
        <?php 
    } 
    ?>
    </tbody>
</table>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">    
      <div class="modal-body">
        <h4>Bạn có chắc muốn xóa trường này</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brand" class='text-light text-decoration-none'>Không</button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id?>' class="text-light text-decoration-none">Có</a></button>
      </div>
    </div>
  </div>
</div>