<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Crud</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <?php $results = mysqli_query($db, "SELECT * FROM task");?> // view list
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)){ ?>
            <tr>
                <td><?php echo $row['taskname']; ?></td>
                <td><?php echo $row['taskdescription']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" > Edit</a>
                </td>
                <td>
                <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                </td>

            </tr>
        <?php } ?>
    </table>
    <form method="post" action="server.php">
        <div class="input-group">
            <label>Task</label>
            <input type="text" name="name" value="">
        </div>
        <div class="input-group">
            <label>Description</label>
            <input type="text" name="description" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="save">Done</button>
        </div>
    </form>
</body>
<?php if(isset($_SESSION['message'])) :?>
    <div class="msg">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
    </div>
<?php endif ?>
</html>