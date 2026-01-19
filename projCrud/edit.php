<?php
    include ('dbconnection.php');

    $id = $_GET['id'];
    
    $fetch = mysqli_query($conn, "select * from items where id='$id'");
    $row = mysqli_fetch_array($fetch);

    if(isset($_POST['update'])){
        $item_name = $_POST['item_name'];
        $location = $_POST['location'];
        $status = $_POST['status'];
        $img = $_FILES['img']['name'];
        $tmp = $_FILES['img']['tmp_name'];

        if($img != ""){
            move_uploaded_file($tmp, "item_img/".$img);

            mysqli_query($conn, "update items set item_name = '$item_name', location = '$location', 
            status = '$status', img = '$img' where id = '$id'");
        } else {
            mysqli_query($conn, "update items set item_name = '$item_name', location = '$location', 
            status = '$status' where id = '$id'");
        }
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Lost & Found</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="item_name"  value="<?php echo $row['item_name']?>"><br><br>
            <input type="text" name="location"  value="<?php echo $row['location']?>"><br>
            <h5>Current Image:</h5>
            <a href="item_img/<?php echo $row['img'];?>" target="_blank">
                <img src="item_img/<?php echo $row['img'];?>" alt="Item Photo">
            </a><br>
            <input type="file" name="img"><br><br>
            <select name="status">
                <option <?php if($row['status']=="Lost") echo "selected";?>>Lost</option>
                <option <?php if($row['status']=="Found") echo "selected";?>>Found</option>
                <option <?php if($row['status']=="Claimed") echo "selected";?>>Claimed</option>
            </select><br><br>

            <button name="update">Update</button>
        </form>
    </div>
</body>
</html>