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

    <title>nav</title>

    <!--  BUTTONS STYLING  -->
    <style>
        .btn a {
            text-decoration: none;
            color: white;
        }
    </style>


</head>

<body>
    <?php
    session_start();
    echo '

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">RajPuT Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">my cart<i class="fa fa-shopping-cart" aria-hidden="true"></i><sup>
                        </sup></a>
                </li>


            </ul>';

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<form class="d-flex" action="search_products.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    name="search_data">
                <input type="submit" value="search" class="btn btn-outline-primary" name="search_data_product">
            </form>
            <p class="text-light my-0 mx-2">'.$_SESSION['user_email'].'</p>
            <button class="btn btn-danger "> <a href="logout.php">logout</a> </button>
        </div>
    </nav>';
    } else {
        echo '<form class="d-flex" action="search_products.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    name="search_data">
                <input type="submit" value="search" class="btn btn-outline-primary" name="search_data_product">
            </form>
            <button class="btn btn-success mx-2"> <a href="login.php">Login</a> </button>
            <button class="btn btn-success "> <a href="register.php">Register</a> </button>
        </div>
    </nav>';

    }

    ?>



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