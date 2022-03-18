<?php
    include_once('config.php');

    if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
    }else{
        $post_id = $_GET['id'];

        $get_data = "SELECT * FROM `posts` WHERE `id` = '$post_id'";
        $result = $conn->query($get_data);

        if($result->num_rows>0){
            $sql = "DELETE FROM `posts` WHERE `id` = '$post_id'";
         
            if($conn->query($sql) === TRUE)
            {
                header("location:index.php");
            }else{
                echo "Error:" .$conn->error;
            }
        }else{
            header("location:index.php");
        }
    }