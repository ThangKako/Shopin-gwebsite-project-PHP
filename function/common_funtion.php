<?php
//chức năng nhận sản phẩm 
function getproducts()
{ //lấy thông tin sản phẩm từ cơ sở dữ liệu và hiển thị lên trang web
  global $con;
  $limit = 9; // xác định số lượng sản phẩm được hiển thị trên mỗi trang
  $page = isset($_GET['page']) ? $_GET['page'] : 1; // lưu trữ trang hiện tại
  $offset = ($page - 1) * $limit; // tính toán offset cho truy vấn SQL
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) { //Nếu không có danh mục hoặc thương hiệu được chỉ định trong URL, truy vấn SQL sẽ được sử dụng để lấy tất cả các sản phẩm từ cơ sở dữ liệu
      $select_query = "SELECT * FROM `products`  LIMIT $offset, $limit";
      $result_query = mysqli_query($con, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_img1 = $row['product_img1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4'>
            <div class='card mt-3'>
              <img src='./admin/product_img/$product_img1' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'> $product_title</h5>
                <div class='star'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
                
                <p class='card-text'>đ$product_price/-</p>
                <a href='product.php?add_to_cart=$product_id' class='btn btn-outline-success'>Thêm vào giỏ</a>
                <a href='product_detail.php?product_id=$product_id' class='btn btn-outline-warning'>Chi tiết</a>
              </div>
            </div>
          </div>";
      }

      //Truy vấn để lấy tổng số lượng sản phẩm có trong cơ sở dữ liệu.
      $select_query = "SELECT COUNT(*) AS total FROM `products`";
      $result_query = mysqli_query($con, $select_query);
      $row = mysqli_fetch_assoc($result_query);
      $total_products = $row['total'];
      $total_pages = ceil($total_products / $limit);
      $prev_page = max($page - 1, 1);
      $next_page = min($page + 1, $total_pages);
      echo "<div class='pagination mt-3'>
        <a href='?page=$prev_page'>&laquo; Trang trước</a>";
      for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($page == $i) ? "active" : "";
        echo "<a href='?page=$i' class='$active'>$i</a>";
      }
      echo "<a href='?page=$next_page'>Trang sau &raquo;</a>
        </div>";
    }
  }
}
// Nhận thông tin danh mục

function get_unique_category()
{
  global $con;
  // điều kiện kiểm tra
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    $select_query = "SELECT * FROM `products` where category_id=$category_id ";
    $result_query = mysqli_query($con, $select_query);
    //lấy bản ghi từ data
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center' >Không có sản phẩm phù hợp cho danh mục sản phẩm này</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_img1 = $row['product_img1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4'>
            <div class='card mt-3'>
              <img src='./admin/product_img/$product_img1' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'> $product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='product.php?add_to_cart=$product_id' class='btn btn-outline-success'>Thêm vào giỏ</a>
                <a href='product_detail.php?product_id=$product_id' class='btn btn-outline-warning'>Chi tiết</a>
              </div>
            </div>
          </div>";
    }
  }
}

function get_unique_brand()
{
  global $con;
  // điều kiện kiểm tra
  if (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];
    $select_query = "SELECT * FROM `products` where brand_id=$brand_id";
    $result_query = mysqli_query($con, $select_query);
    //lấy bản ghi từ data
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center' >Không có sản phẩm phù hợp cho nhãn hàng này </h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_img1 = $row['product_img1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4'>
            <div class='card mt-3'>
              <img src='./admin/product_img/$product_img1' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'> $product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='product.php?add_to_cart=$product_id' class='btn btn-outline-success'>Thêm vào giỏ</a>
                <a href='product_detail.php?product_id=$product_id' class='btn btn-outline-warning'>Chi tiết</a>
              </div>
            </div>
          </div>";
    }
  }
}

// hiẻn thị nhãn hiệu
function getbrands()
{
  global $con;
  $select_brand = "Select * From `brand`";
  $result_brand = mysqli_query($con, $select_brand);
  //$row_data=mysqli_fetch_assoc($result_brand);
  //echo $row_data['brand_title']
  while ($row_data = mysqli_fetch_assoc($result_brand)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    //echo $brand_title;
    echo "<li class='nav-item bg-outline-success'>
        <a href='product.php?brand=$brand_id' class='nav-link'>
          <h4>$brand_title</h4>
        </a>
      </li>";
  }
}

function getcategory()
{
  global $con;
  $select_category = "Select * From `category`";
  $result_category = mysqli_query($con, $select_category);
  //$row_data=mysqli_fetch_assoc($result_brand);
  //echo $row_data['brand_title']
  while ($row_data = mysqli_fetch_assoc($result_category)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    //echo $category_title;
    echo "<li class='nav-item bg-outline-success'>
        <a href='product.php?category=$category_id' class='nav-link'>
          <h4>$category_title</h4>
        </a>
      </li>";
  }
}
// tim kiems

function search_product()
{
  global $con;
  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];

    $search_query = "SELECT * FROM `products` where product_keyword like '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center text-danger' >Không có sản phẩm phù hợp </h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_img1 = $row['product_img1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4'>
           <div class='card mt-3'>
             <img src='./admin/product_img/$product_img1' alt='...'>
             <div class='card-body'>
               <h5 class='card-title'> $product_title</h5>
               <div class='star'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
               <p class='card-text'>$product_description</p>
               <p class='card-text'>đ$product_price/-</p>
               <a href='product.php?add_to_cart=$product_id' class='btn btn-outline-success'>Thêm vào giỏ</a>
               <a href='product_detail.php?product_id=$product_id' class='btn btn-outline-warning'>Chi tiết</a>
             </div>
           </div>
         </div>";
    }
  }
}
function view_detail()
{
  global $con;
  if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) { //Nếu không có danh mục hoặc thương hiệu được chỉ định trong URL, truy vấn SQL sẽ được sử dụng để lấy tất cả các sản phẩm từ cơ sở dữ liệu
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];

          $product_description = $row['product_description'];
          $product_img1 = $row['product_img1'];
          $product_img2 = $row['product_img2'];
          $product_img3 = $row['product_img3'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo "<div class='col-md-4'>
                              <div class='card mt-3'>
                                  <div class='slider'>
                                      <img src='./admin/product_img/$product_img1' class='card-img-top' alt='$product_title'>
                                      <img src='./admin/product_img/$product_img2' class='card-img-top' alt='$product_title'>
                                      <img src='./admin/product_img/$product_img3' class='card-img-top' alt='$product_title'>
                                  </div>   
                                                                
                              </div>
                          </div>
          
          <div class='col-md-8'>
          <div class='row'>
              <div class='col-md-12'>
                  <h4 class='text-center'>Thông tin sản phẩm</h4>
              </div>
              <div class='col-md-6'>
              <h3 class='card-title'> $product_title</h3>
                
                <div class='star'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
                    
                <p class='card-text'>Giá</p>
                <h5 class='card-title'> $product_price</h5>
                <p class='card-text'>Số lượng</p>
                
                <a href='product.php?add_to_cart=$product_id' class='btn btn-outline-success'>Thêm vào giỏ</a>
              </div>
              <p class='card-text'>$product_description</p>
              
              
          </div>
          </div>";
        }
      }
    }
  }
}
// get ip
function getIPAddress()
{
  // Check if the IP address is from shared internet
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  // Check if the IP address is from a proxy
  else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  // If not from shared internet or proxy, assume it's the remote address
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;  // Return the determined IP address
}

function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    
    $select_query = "Select * from `cart_details` where ip_address='$get_ip_add' AND product_id=$get_product_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
      echo "<script>alert('Sản phẩm đã trong giỏ')</script>";
      echo "<script>window.open('product.php','_self')</script>";
    } else {
      $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
      $result_query = mysqli_query($con, $insert_query);
      echo "<script>alert('Thêm thành công')</script>";
      echo "<script>window.open('product.php','_self')</script>";
    }
  }
}

// giỏ hàng

function get_user_detail()
{
  global $con;
  $username = $_SESSION['username'];
  $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
  $result_query = mysqli_query($con, $get_details);
  while ($row_query = mysqli_fetch_array($result_query)) {
    $user_id = $row_query['user_id'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_order'])) {
        if (!isset($_GET['delete_account'])) {
          echo '<div class="table">';
          echo '<div class="row">';
          echo '<div class="cell" style="background-color: #3E54AC; color: #fff;"><h4>Username:</h4></div>';
          echo '<div class="cell"><h4>' . $row_query['username'] . '</h4></div>';
          echo '</div>';
          echo '<div class="row">';
          echo '<div class="cell" style="background-color: #3E54AC; color: #fff;"><h4>Email:</h4></div>';
          echo '<div class="cell"><h4>' . $row_query['useremail'] . '</h4></div>';
          echo '</div>';
          echo '<div class="row">';
          echo '<div class="cell" style="background-color: #3E54AC; color: #fff;"><h4>Address:</h4></div>';
          echo '<div class="cell"><h4>' . $row_query['user_address'] . '</h4></div>';
          echo '</div>';
          echo '<div class="row">';
          echo '<div class="cell" style="background-color: #3E54AC; color: #fff;"><h4>Phone:</h4></div>';
          echo '<div class="cell"><h4>' . $row_query['phone'] . '</h4></div>';
          echo '</div>';
        }
      }
    }

    /*global $con;
  $user_id = 1;
  $query = "SELECT username, useremail, user_address, phone FROM user_table WHERE user_id = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  if ($user) {
  echo '<div class="table">';
  echo '<div class="row">';
  echo '<div class="cell" style="background-color: #3E54AC; color: #fff;"><h4>Username:</h4></div>';
  echo '<div class="cell"><h4>' . $user['username'] . '</h4></div>';
  echo '</div>';
  echo '<div class="row">';
  echo '<div class="cell" style="background-color: #3E54AC; color: #fff;"><h4>Email:</h4></div>';
  echo '<div class="cell"><h4>' . $user['useremail'] . '</h4></div>';
  echo '</div>';
  echo '<div class="row">';
  echo '<div class="cell" style="background-color: #3E54AC; color: #fff;"><h4>Address:</h4></div>';
  echo '<div class="cell"><h4>' . $user['user_address'] . '</h4></div>';
  echo '</div>';
  echo '<div class="row">';
  echo '<div class="cell" style="background-color: #3E54AC; color: #fff;"><h4>Phone:</h4></div>';
  echo '<div class="cell"><h4>' . $user['phone'] . '</h4></div>';
  echo '</div>';
  echo '</div>';
  

} else {
  echo "User not found.";
}
;
  */
  }
}
// Lấy hàng
function cart_item()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_add = getIPAddress();
    $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  } else {
    global $con;
    $get_ip_add = getIPAddress();
    $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

//tổng giá
function total_cart_price()
{
  global $con;
  $get_ip_add = getIPAddress();
  $total_price = 0;
  $cart_query = "SELECT * from `cart_details` where ip_address='$get_ip_add'";
  $result = mysqli_query($con, $cart_query);
  while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_products = "SELECT * from `products` where product_id='$product_id'";
    $result_products = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
      $product_price = array($row_product_price['product_price']);
      $product_values = array_sum($product_price);
      $total_price += $product_values;
    }
  }
  echo $total_price;
}

/*
function calculate_cart_total() {
  $get_ip_add = getIPAddress();
  $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
  $result = mysqli_query($con, $cart_query);
  $total_price = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['product_id'];
    $product_query = "SELECT * FROM products WHERE product_id='$product_id'";
    $product_result = mysqli_query($con, $product_query);
    $product_row = mysqli_fetch_assoc($product_result);
    $price = $product_row['product_price'];
    $quantity = $row['quantity'];
    $subtotal = $price * $quantity;
    $total_price += $subtotal;
  }
  return $total_price;
}
*/

?>

<link rel="stylesheet" type="text/css" href="./style.css">
<style>
  .pagination {
    display: inline-block;
    justify-content: center;
  }

  .pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
  }

  .pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
  }

  .pagination a:hover:not(.active) {
    background-color: #ddd;
  }
</style>