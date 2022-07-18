<?php
include_once('./config/config.php');

if (isset($_GET['u'])) {
    $url = $_GET['u'];
    $getUrlDb = mysqli_query($conn, "SELECT * FROM shorten WHERE shorten_url = '$url'");
    if (mysqli_num_rows($getUrlDb) > 0) {
        $getUrl = mysqli_fetch_assoc($getUrlDb)['base_url'];
        header("Location:" . $getUrl);
    } else {
        echo '<script>alert("The Url is not found in our DB")</script>';
    }
}
?>
<!DOCtype html>
<html lang="ar">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/sryle.css" />
    <title> -- Shorten - UR - URL -- </title>
</head>

<body>
    <div class="container">
        <div class="inner_container">
            <h1>Shorten - ur - URL</h1>
            <div class="open_form">
                <i class="fa-solid fa-link"></i>
            </div>
            <form>
                <input name="url" placeholder="Type link" />
                <button type="submit"> Shorten </button>
            </form>
            <div class="shortened_url">
                <p id="link">
                    <span> </span>
                    <i class="fa-solid fa-clone"></i>
                </p>
            </div>
            <div class="made__by">
                Made By
                <a href="https://www.linkedin.com/in/mohamed-reda-0450571b2/" target="_blank">Eng/ Mohamed Reda</a>
            </div>
            <h2>Made with love ❤️ in <span> Egypt </span></h2>
        </div>
    </div>
    </div>
    <script src="./assets/main.js"></script>
</body>

</html>
