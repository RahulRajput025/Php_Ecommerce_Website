<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <!--  CSS LINK  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">


    <!--  FONT AWESOME LINK  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Side Navbar</title>
    <!-- Navbar items styling-->
    <style>
        #nav_item a {
            text-decoration: none;
            color: black;
        }
    </style>


</head>

<body>

    <!--================================================  Database Connection  =========================================================-->
    <?php include 'admin_panel/connection.php' ?>


    <!--=====================================================  Brands  =============================================================-->
    <nav class="navbar navbar-expand-md navbar-light bd-light flex-md-column flex-row  py-2 sticky-top mt-5 " id="sidebar">
        <button type="button" class="navbar-toggler border-0 order-1 btn-primary" data-toggle="collapse"
            data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="p-1">
            <h5 style="background-color:black; color:white;">Brands</h5>


            <div class="collapse navbar-collapse order-last" id="nav">
                <ul class="navbar-nav flex-column w-100">

                    <!--  Php script for brand insertion -->
                    <?php
                    $sql = "SELECT * FROM brands";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $brand_id = $row['brand_id'];
                        $brand_title = $row['brand_title'];
                        echo '
                    <li class="nav-item my-1 text-center" id="nav_item">
                    <a href="index.php?brand_id=' . $brand_id . '">' . $brand_title . '</a>
                    </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="p-1 mt-4">
            <h5 style="background-color:black; color:white;">categories</h5>

            <div class="collapse navbar-collapse order-last" id="nav">
                <ul class="navbar-nav flex-column w-100">

                    <!--  Php script for brand insertion -->
                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $category_id = $row['category_id'];
                        $category_title = $row['category_title'];
                        echo '
                    <li class="nav-item my-1 text-center" id="nav_item">
                    <a href="index.php?category_id=' . $category_id . '">' . $category_title . '</a>
                    </li>';
                    }
                    ?>
                </ul>
            </div>


        </div>
    </nav>




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
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="js/jquery.hislide.js"></script>
</body>

</html>