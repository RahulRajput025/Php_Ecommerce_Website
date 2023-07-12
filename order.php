<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <!--  CSS LINK  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--  FONT AWESOME LINK  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>orders</title>


</head>

<body>


    <div class="container-fluid">
        <?php
        include 'admin_panel/connection.php';
        include 'functions.php';

        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            echo $user_id;


            //getting total price of all items
        
            $ip_address = getIPAddress();
            $total_price_products = 0;
            $select_query = " SELECT * FROM `cart_details` WHERE user_ip='$ip_address'";
            $result = mysqli_query($conn, $select_query);

            //invoice number
            $invoice_number = mt_rand();

            //Number of products in order
            $count_products = mysqli_num_rows($result);

            //order status
            $status='pending';
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $query_products = "SELECT * FROM `products` WHERE product_id=$product_id ";
                $result_products = mysqli_query($conn, $query_products);
                while ($row_product_price = mysqli_fetch_array($result_products)) {
                    $product_price = array($row_product_price['product_price']);
                    $product_value = array_sum($product_price);
                    $subtotal = $total_price_products += $product_value;
                }
            }


            $sql_query="INSERT INTO `user_orders`(`user_id`, `amount_due`, `invoice_number`, `total_products`, `order_status`) VALUES ('$user_id','$subtotal','$invoice_number','$count_products','$status')";

            $result_query=mysqli_query($conn,$sql_query);
            if($result_query){
                echo "<script>window.open('profile.php', '_self')</script>";
            }

        }
        ?>

    </div>


    <!-- JAVA SCRIPT LINK  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>