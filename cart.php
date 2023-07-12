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

    <title>Cart</title>
    <style>
        #cart_image {
            width: 100%;
            height: 80px;
            object-fit: contain;
        }
    </style>


    <!-- CARD IMAGE STYLING-->
</head>

<body>
    <!-- Conteiner start-->
    <div class="container-fluid">

        <!--=========================================== including functions.php page ==============================================-->
        <?php include 'functions.php'; ?>
        <!--================================================ including navbar =====================================================-->
        <?php include 'nav.php'; ?>



        <div class="container my-5">
            <form action="cart.php" method="post">
                <table class="table table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product name</th>
                            <th scope="col">Image</th>
                            <th scope="col">prize</th>
                            <th scope="col">Remove item</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <?php

                    ?>
                    <tbody>
                        <?php
                        include 'admin_panel/connection.php';

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
                                $product_title = $row_products['product_title'];
                                $product_price = $row_products['product_price'];
                                $product_cost = $row_products['product_price'];
                                $product_image_1 = $row_products['product_image_1'];

                                ?>

                                <tr>

                                    <th>
                                        <?php echo $product_title ?>
                                    </th>
                                    <td> <img <?php echo "src= echo admin_panel/product_image/$product_image_1"; ?>
                                            class="img img-fluid" id="cart_image" alt="img">
                                    </td>
                                    <td>
                                        <?php echo $product_cost ?>/-
                                    </td>
                                    <td>
                                        <input type="checkbox" name="removeitem[]" value=<?php echo $product_id ?>>
                                    </td>
                                    <td>
                                        <input type="submit" value="Remove item" name="remove_cart" class="bg-dark text-light">
                                        <?php
                                        echo '' . $remove_item = Delete_Cart_items() . '';
                                        ?>
                                    </td>
                                </tr>
                            <?php }
                        } ?>

                    </tbody>

                </table>
            </form>

            <div class="row mt-3">
                <div class="col-md-8">
                    <h5>Subtotal:
                        <?php Get_Total_Price(); ?>
                    </h5>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark"><a href="payment.php"> Buy itme</a></button>
                </div>

                <div class="col-md-2 ml-auto">
                    <a href="index.php"> <button class="btn btn-dark"> Continue Shopping</button> </a>
                </div>
            </div>
        </div>






    </div>
    <!-- Container end-->






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