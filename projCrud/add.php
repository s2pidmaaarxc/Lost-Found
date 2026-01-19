<?php 
    include ('dbconnection.php');

    if(isset($_POST['save'])){
        if($_POST['item_name'] == "" || $_POST['location'] == ""){
            echo "<script>alert('Must filled item name and location');</script>";
        }else{
            $item_name = $_POST['item_name'];
            $description = $_POST['description'];
            $location = $_POST['location'];
            $status = $_POST['status'];

            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            
            if($img != ""){
                move_uploaded_file($tmp, "item_img/".$img);
            }

            $query = "insert into items (item_name, description, location, status, img) values
                ('$item_name', '$description', '$location', '$status', '$img')";

            mysqli_query($conn, $query);
            header("Location: index.php"); 
        }   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Lost & Found</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="item_name" placeholder="Item Name" required><br><br>
            <textarea name="description" placeholder="Description"></textarea><br><br>
            <input type="text" name="location" placeholder="Location"><br><br>
            <select name="status">
                <option>Lost</option>
                <option>Found</option>
                <option>Claimed</option>
            </select><br><br>
            <input type="file" name="img"><br><br>
            <button type="submit" name="save">Save</button>
        </form>
    </div>
    
</body>
</html>