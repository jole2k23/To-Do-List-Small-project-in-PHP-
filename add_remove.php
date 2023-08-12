<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $title = $_POST['title'];
    $description = $_POST['description'];
    if(isset($_POST['add_task'])) {
        if(!empty($_POST['title']) && !empty($_POST['description'])) {
            $sql = "INSERT INTO to_do_list (subject_title, subject_description) VALUES (?, ?)";
            $run = $connection->prepare($sql);
            $run->bind_param("ss", $title,$description);
            $run->execute();
            var_dump($run);
            header("location: index.php");
            $message['message'] = "Dodali ste novi task";  
        } else {
            echo "Niste popunili sve podatke";
        }
    } else {
        $sql = "DELETE FROM to_do_list";
        $run = $connection->prepare($sql);
        $run->execute();
        header("location: index.php");
        $message['message'] = "Izbrisali ste sve";  
    }
}


?>