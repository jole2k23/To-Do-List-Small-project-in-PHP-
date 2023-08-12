<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>To Do List</title>
</head>
<body>
    <nav>
        <h2>TODOs List</h2>
    </nav>
    <div class="container">
    <section class="before-main">
        <h1>TODO List</h1>
    </section>
    <form action="add_remove.php" method="POST">
        Title: <input type="text" class="form-control" name="title">
        <p>Add an item to list</p>
        Description: <input type="text" class="form-control big" name="description"> 
        <div class="btns">
        <button type="submit" class="btn btn-primary green" style="background-color:green; font-family: sans-serif" name="add_task">Add to list</button>
        <button type="submit" class ="btn btn-primary red"style="background-color:red; font-family: sans-serif" name="clear_all_task">Clear list</button>
        </div>
    </form>
    <div class="list">
        <h2>Your LIST</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Task No.</th>
                    <th>Task Title</th>
                    <th>Task Description</th>
                    <th>Task Created</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $sql = "SELECT * from to_do_list";
                $run = $connection->prepare($sql);
                $run->execute();
                $results = $run->get_result();
             
                while ($row = $results->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['subject_title'] . '</td>';
                    echo '<td>' . $row['subject_description'] . '</td>';
                    echo '<td>' . $row['created_at'] . '</td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>
