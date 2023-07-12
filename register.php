<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet" />

    <title>Registeration form</title>
</head>

<body>

    <?php
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
    // function ends here?>





    <?php
    /* CONDITION FOR POST METHOD*/
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        /* CONNECTION TO DATABASE */
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'ecommerce';

        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            die('sonnection unsuccessful' . mysqli_error($conn));
        }

        /* CREATE VARIABLES OF FORMS*/
        $username = $_POST['user_name'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $mobile = $_POST['user_mobile'];
        $address = $_POST['user_address'];
        $user_ip = getIPAddress();

        /* CONDITION TO CHECK FOR A UNIQYE EMAIL REGISTERATION*/
        /* sql query*/
        $sql = "SELECT * FROM `user` WHERE user_email='$email'";

        /* run the query*/
        $result = mysqli_query($conn, $sql);

        /* query to check rows*/
        $present = mysqli_num_rows($result);
        if ($present > 0) {
            echo "email already registered";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            /* query to insert data in database*/
            $query = "INSERT INTO `user`(`user_name`, `user_email`, `user_password`,`user_ip`, `user_mobile`, `user_address`) VALUES ('$username','$email','$hash','$user_ip','$mobile','$address')";
            $result_2 = mysqli_query($conn, $query);
            header("location:index.php");
        }
    }


    ?>




    <section class="vh-100 text-center" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" action="register.php" method="POST">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="user_name" id="user_name" class="form-control"
                                                    required />
                                                <label class="form-label" for="user_name">Your Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="user_email" id="user_email"
                                                    class="form-control" required />
                                                <label class="form-label" for="user_email">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="user_password" id="user_password"
                                                    class="form-control" required />
                                                <label class="form-label" for="user_password">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" name="user_mobile" id="user_mobile"
                                                    class="form-control" required />
                                                <label class="form-label" for="user_mobile">Mobile Number</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="user_address" id="user_address"
                                                    class="form-control" required />
                                                <label class="form-label" for="user_address">Address</label>
                                            </div>
                                        </div>


                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-dark btn-lg">Register</button>
                                        </div>

                                        <div>
                                            <p>already have an account? <a href="login.php">login</a>
                                            </p>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="js/bootstrap.bundle.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"></script>
</body>

</html>