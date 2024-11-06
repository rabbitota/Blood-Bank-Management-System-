<?php
    include "include/config.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM donor WHERE id=$id";
        $result = mysqli_query($connection,$query);
        if($result){
            $flag=1;
            header("location:search.php");
        }
    }
?>