<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Новини</title>
</head>
<?php
$conn = new PDO("mysql:host=localhost;dbname=local.pd913.com", "root", "");
$reader = $conn->query("SELECT * FROM news");

?>
<body>

<?php include "navbar.php"; ?>
<div class="container">
    <h1>Головна сторінка</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($reader as $row) {
            echo "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['description']}</td>
            <td>
                <img src='/images/{$row['image']}' alt='Bear' width='100'/>
                
            </td>
            
            <td>
                <a href='#' class='btn btn-danger btnDelete' data-id='{$row['id']}' >Delete</a>
            </td>
        </tr>
        ";
        }
        ?>
        </tbody>
    </table>
</div>

<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/axios.min.js"></script>
<script>
    window.addEventListener("load",function() {
        var list=document.querySelectorAll(".btnDelete");
        for (let i=0; i<list.length; i++)
        {
            list[i].addEventListener("click", function(e) {
                e.preventDefault();
                const id = e.currentTarget.dataset.id;
                const data = new FormData();
                data.append("id", id);
                axios.post("/delete.php", data)
                    .then(resp => {
                        console.log(resp);
                       alert("server result "+ resp.data);
                    });
                //alert("click delete "+ id);
            });
        }
       //console.log("Load dom");
    });
</script>
</body>
</html>