<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" /><title>Pizza House Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h2>
            <a href="#showcase">
                <img src="img/pizza.png" alt="Pizza Image"> 
                <span class="highlight">Pizza</span> House&trade;
            </a>
        </h2>

        <nav>
            <ul>
                <li class="current">
                    <a href="index.html">Начало</a>
                </li>
                
            </ul>
        </nav>
    </header>
   
    <section id="benefits">
<?php

$name = $_POST["name"];
$phone = filter_input(INPUT_POST, "phone", FILTER_VALIDATE_INT);
$address = $_POST["address"];
$email = $_POST["email"];
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
$paket =filter_input(INPUT_POST, "paket", FILTER_VALIDATE_INT);
$number = filter_input(INPUT_POST, "number", FILTER_VALIDATE_INT);
$therms = $terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

if ( ! $terms) {
    die("Условията трябва да бъдат приети");
}   

$host = "localhost";
$dbname = "orders";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO user_orders (name, phone, address, email, type, paket, number)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sissiii",
                       $name, 
                       $phone, 
                       $address, 
                       $email, 
                       $type, 
                       $paket, 
                       $number);

mysqli_stmt_execute($stmt);

echo "Поръчката е приета!";

?>
 </section>
   


    <!-- Footer -->
    <footer>
        <p>
            <span class="highlight">pizzahousebg@gmail.com</span> / +359 2 150 2597 
                
        </p>

        <ul>
            <li>
                <a href ="https://www.facebook.com/profile.php?id=100090320109554" target="_blank">
                    <i class="fa fa-facebook-square fa-2x"></i>
                </a>
            </li>
        </ul>
    </footer>


    <!-- End of footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="app.js"></script>
</body>

</html>