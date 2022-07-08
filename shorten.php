<?php
include_once('./config/config.php');
if ($_POST['url']) {
    $url = mysqli_real_escape_string($conn, $_POST['url']);
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $uniqueId = substr(uniqid(), 4, 6);
        $getUrl = mysqli_query($conn, "SELECT * FROM shorten WHERE shorten_url = '$uniqueId'");
        while (mysqli_num_rows($getUrl) > 0) {
            $uniqueId = substr(uniqid(), 4, 6);
            $getUrl = mysqli_query($conn, "SELECT * FROM shorten WHERE shorten_url = '$uniqueId'");
        }
        if (mysqli_query($conn, "INSERT INTO shorten(base_url, shorten_url) values('$url','$uniqueId') ")) {
            echo $_SERVER['SERVER_NAME'].'/shorten-url/?u='.$uniqueId;
        } else {
            echo mysqli_error($conn);
        }
    } else {
        echo 'Enter Validation -- URL --';
    }
}
