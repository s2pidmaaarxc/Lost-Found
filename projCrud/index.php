<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h1>Lost & Found</h1>

        <a class="btn-add" href="add.php">+</a>
        
       
        <table>
            <tr>
                <th>Item Name</th>
                <th>Location</th>
                <th>Status</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php
            include ('dbconnection.php');
            $fetch = mysqli_query($conn, "select * from items order by id asc");
            $row = mysqli_num_rows($fetch);
            if($row > 0 ){
                while($dRow = mysqli_fetch_array($fetch)){
             ?>
            <tr>
                <td><?php echo $dRow['item_name']; ?></td>
                <td><?php echo $dRow['location'];?></td>
                <td><?php echo $dRow['status'];?></td>
                <td>
                    <a href="item_img/<?php echo $dRow['img'];?>" target="_blank">
                    <img src="item_img/<?php echo $dRow['img'];?>" alt="Item Photo" >
                    </a>
                </td>
                <td>
                    <a class="btn-update" href="edit.php?id=<?php echo $dRow['id']; ?>">Edit</a>
                    <a class="btn-delete" href="delete.php?id=<?php echo $dRow['id']; ?>" onclick="return confirm('Delete this item?')">Delete</a>
                </td>
            </tr>
            <?php   
                } 
             }
            ?>
        </table>
        <div class="table-end">.</div>
    </div>
</body>
</html>