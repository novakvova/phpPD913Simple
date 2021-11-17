<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
//    echo "<h2>name = ".$_POST['name']."</h2>";
    $name=$_POST['name'];
    $description=$_POST['description'];
    $image=$_POST['image'];

    $conn = new PDO("mysql:host=localhost;dbname=local.pd913.com", "root", "");
    $sql = "INSERT INTO `news` (`name`, `description`,`image`) VALUES (?, ?, ?);";
    $conn->prepare($sql)->execute([$name,$description,$image]);
    header("Location: /");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Додати новину</title>
</head>
<?php

?>
<body>

<?php include "navbar.php"; ?>

<div class="container">
    <h1>Додати новину</h1>
    <form method="post">
        <div class="mb-3"">
            <label for="name" class="form-label">Назва</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="mb-3" class="form-label">
            <label for="description">Опис</label>
            <textarea class="form-control" rows="10" cols="35" id="description" name="description" placeholder="Enter email"></textarea>
        </div>
        <div class="mb-3" class="form-label">
            <label for="image">Фото</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Enter image">
        </div>
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </form>

</div>


<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>