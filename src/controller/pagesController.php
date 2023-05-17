<?php

  require("../model/Content.php");

  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = new Content();
    $name = $_POST["name"];
    $profile_icon = $_POST["profile_icon"];
    $profile_banner = $_POST["profile_banner"];
    $content->add_page($name, $profile_icon, $profile_banner);
  }
  

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="POST">
    <input type="text" name="name">
    <input type="text" name="profile_icon">
    <input type="text" name="profile_banner">
    <button type="submit">Submit</button>
  </form>
</body>
</html>