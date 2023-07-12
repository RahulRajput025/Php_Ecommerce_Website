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

    <title>index page</title>


    <!-- CARD IMAGE STYLING-->
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
    </style>


</head>

<body>
    <!-- Conteiner start-->
    <div class="container-fluid">


        <!--================================================ including navbar =====================================================-->
        <?php include 'nav.php'; ?>

        <!--=========================================== including functions.php page ==============================================-->
        <?php include 'functions.php'; ?>

        <div class="row">

            <!--===============================================  Side Navbar  =====================================================-->
            <div class="col-md-2">
                <?php include 'sidenav.php'; ?>
            </div>







            <!--================================================  Product Cards  ==================================================-->
            <div class="col-10 justify-content-around">
                <div class="row">
                    <div class="row my-5">
                        <!--==============================  php logic to show products on homepage  ===============================-->
                        <?php include 'admin_panel/connection.php'; ?>
                        <?php

                        Search_Products(); //function to search a product
                        get_Category_Products(); //function to show category products on homepage
                        get_Brand_Products(); // function to show brand products on homepage
                        ?>
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