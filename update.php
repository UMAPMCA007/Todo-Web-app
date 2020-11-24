<?php
session_start();
include('connection.php');

$id="";
$list="";
$button="";
$update="false";
    





if(isset($_POST['submit'])){

    $_SESSION['msg']="";
    $_SESSION['msg_type']="";

    $list    = $_POST['list'];
    
 
    if(!empty($list) ){
		
		
        $sql="INSERT INTO tododata(item) VALUES ('$list')";
        mysqli_query($conn,$sql);
        $_SESSION['msg']="Record Successfully Submitted";
        $_SESSION['msg_type']="success";
        header('location:index.php');
    }else{
		
		$_SESSION['msg']="Record not Submitted";
        $_SESSION['msg_type']="danger";
        header('location:index.php');
		
    }
}


if(isset($_GET['update'])){

    $id  = $_GET['update'];
    $update="true";
    $sql="SELECT * FROM tododata WHERE id= '$id'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        $list =$row['item'];
        

    }else{
        echo "0 result fount";
    }

}




if(isset($_POST['update'])) {

    $_SESSION['msg']="";
    $_SESSION['msg_type']="";

    $id = $_POST['id'];
    $list = $_POST['list'];
  
        $sql = "UPDATE tododata SET item='$list' WHERE id='$id'";
        mysqli_query($conn, $sql);
        $_SESSION['msg'] = "Record Successfully Updated";
        $_SESSION['msg_type'] = "success";
        header('location:index.php');
    
}

if(isset($_GET['delete'])) {
    $_SESSION['msg'] = "";
    $_SESSION['msg_type'] = "";

         $id = $_GET['delete'];

        $sql2 = "DELETE FROM tododata WHERE id='$id'";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {

            $_SESSION['msg'] = "Record Successfully Deleted";
            $_SESSION['msg_type'] = "danger";
            header('location:index.php');
        }
    


}


if(isset($_GET['submit'])){
    $_SESSION['msg']="";
    $_SESSION['msg_type']="";

    $id      = $_GET['submit'];
    
    $check   ="submited"; ;
 
    if(!empty($check) ){
		
		
        $sql="UPDATE tododata SET checked='$check' WHERE id='$id'";
        mysqli_query($conn,$sql);
        $_SESSION['msg']="Record Successfully Submitted";
        $_SESSION['msg_type']="success";
        header('location:index.php');
    }else{
		
		$_SESSION['msg']="Record not Submitted";
        $_SESSION['msg_type']="danger";
        header('location:index.php');
		
    }
}


	

			$sql="SELECT * FROM tododata ";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
		    $check=$row['checked'];
			if($check=="submited"){
			 $button= "Done";
			}else{ 
			$button="Submit";
		   }	
	
        
		   






?>