<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
else{
    $studentId = $_SESSION['sess_studentId']; //This is the loggedin student ID value
    $id = $_GET['commentid']; // Comment ID from URL in GET Method
   // echo $id;
     if($id != ""){
        // Fix me here
        $sql = "delete from comment where id=:id "; 
        $deletecomment = $dbh->prepare($sql);
        $deletecomment-> bindParam(':id', $id);
        $deletecomment->execute();
        if($deletecomment != 0){
        $msg="Comment removed Succesfully! ";
        header("Location: comment.php");
        }
        else {
            $msg="You are not allowed to delete! ";
            header("Location: comment.php");
        }

    }
    else {
        $msg="You are not allowed to delete! ";
        header("Location: comment.php");
    }
}
?>
