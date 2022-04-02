<?php
  if(empty($_SESSION["email"])){
    header("location:index.php");
  }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container text-center">
    <div class="m-4">
      <h1 class="text-danger shadow-lg p-4 rounded">Welcome Page</h1>
      <a class="btn btn-danger shadow" href="logout.php">Logout</a>
    </div>
  </div>

</html>