<?php include 'admin_panel/connection.php';




//php function to show all the products at homepage/index page
//this function is called in index.php
function show_All_Products()
{
    global $conn;
    if (!isset($_GET['category_id'])) {
        if (!isset($_GET['brand_id'])) {
            $query_show = "SELECT * FROM `products`";
            $result = mysqli_query($conn, $query_show);
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image_1 = $row['product_image_1'];

                echo "
            <div class='col-md-4 sm-9 mb-4'>
            <div class='card' style='width: 18rem;'>
        <img src='admin_panel/product_images/$product_image_1' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p> price:$product_price/-</p>
            <p class='card-text'>$product_description</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
            <a href='viewmore.php' class='btn btn-dark'>view more</a>
        </div></div></div>";
            }
        }
    }
}
// function ends here





// php function to show the products of a specific category at homepage/index page
//this function is called in index.php
function get_Category_Products()
{
    global $conn;
    if (isset($_GET['category_id'])) {
        $category = $_GET['category_id'];
        $query_show = "SELECT * FROM `products` WHERE category_id=$category";
        $result = mysqli_query($conn, $query_show);
        $num_of_rows = mysqli_num_rows($result);
        if ($num_of_rows == 0) {
            echo '<h2 class="text-center text-danger">Sorry! no stocks for this category</h2>';
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image_1 = $row['product_image_1'];

                echo "
                <div class='col-md-4 sm-9 mb-4'>
            <div class='card' style='width: 18rem;'>
        <img src='admin_panel/product_images/$product_image_1' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p> price:$product_price/-</p>
            <p class='card-text'>$product_description</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
            <a href='viewmore.php' class='btn btn-dark'>view more</a>
        </div></div></div>";
            }
        }
    }
}
//function ends here






//php function to show the products of a specific BRAND at homepage/index page
//this function is called in index.php
function get_Brand_Products()
{
    global $conn;
    if (isset($_GET['brand_id'])) {
        $brand = $_GET['brand_id'];
        $query_show = "SELECT * FROM `products` WHERE brand_id=$brand";
        $result = mysqli_query($conn, $query_show);
        $num_of_rows = mysqli_num_rows($result);
        if ($num_of_rows == 0) {
            echo '<h2 class="text-center text-danger">Sorry! no stocks for this Brand</h2>';
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image_1 = $row['product_image_1'];

                echo "
                <div class='col-md-4 sm-9 mb-4'>
                <div class='card' style='width: 18rem;'>
            <img src='admin_panel/product_images/$product_image_1' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p> price:$product_price/-</p>
                <p class='card-text'>$product_description</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
                <a href='viewmore.php' class='btn btn-dark'>view more</a>
            </div></div></div>";
            }
        }
    }
}
// function ends here




// to search a product
//this function is called in index.php
function Search_Products()
{
    global $conn;
    if (isset($_GET['search_data_product'])) {
        $search_product = $_GET['search_data'];
        $query_search = "SELECT * FROM `products` WHERE product_title like '%$search_product%'";
        $result = mysqli_query($conn, $query_search);
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo '
            <div class="col-md-4 sm-9 mb-4">
             <div class="card" style="width: 18rem;">
             <img src="images/shoe1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $product_title . '</h5>
                    <p> price:' . $product_price . '/-</p>
                    <p class="card-text">' . substr($product_description, 0, 35) . '...</p>
                    <a href="index.php?add_to_cart=' . $product_id . '" class="btn btn-dark">Add to Cart</a>
                    <a href="#" class="btn btn-dark">view more</a>
            </div></div></div>';
        }
    }
}
// function ends here





// function to get ip address of a user
//this function is called in index.php
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// function ends here






//cart function --> adding items in cart
//this function is called in index.php
function cart()
{
    global $conn;
    if (isset($_GET['add_to_cart'])) {
        $ip_address = getIPAddress();
        $product_id = $_GET['add_to_cart'];
        $select_query = " SELECT * FROM cart_details WHERE product_id='$product_id ' AND user_ip='$ip_address'";
        $result = mysqli_query($conn, $select_query);

        $row = mysqli_num_rows($result);
        if ($row > 0) {
            echo "<script> alert('This item is already present in cart') </script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `cart_details`(`product_id`, `user_ip`) VALUES ('$product_id','$ip_address')";
            $result_insert = mysqli_query($conn, $insert_query);
            echo "<script> alert('Item added to cart') </script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}
// function ends here







//cart function --> getting total price of all cart  items on HOMEPAGE/INDEXPAGE
//this function is called in nav.php
function Get_Total_Price()
{
    global $conn;
    $ip_address = getIPAddress();
    $total_price = 0;
    $select_query = " SELECT * FROM `cart_details` WHERE user_ip='$ip_address'";
    $result = mysqli_query($conn, $select_query);
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $query_products = "SELECT * FROM `products` WHERE product_id=$product_id ";
        $result_products = mysqli_query($conn, $query_products);
        while ($row_products = mysqli_fetch_array($result_products)) {
            $product_price = array($row_products['product_price']);
            $product_value = array_sum($product_price);
            $total_price += $product_value;
        }
    }
    echo $total_price;
}



function Delete_Cart_items()
{
    global $conn;
    if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
            echo $remove_id;
            $delete_query = "DELETE FROM `cart_details` WHERE product_id='$remove_id'";
            $result1 = mysqli_query($conn, $delete_query);
            if ($result1) {
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}

?>