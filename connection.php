<?php

 


  $dbhost  = "localhost";
  $dbuser  = "root";
  $dbpass  = "";
  $db      = "tododb";


  $conn=mysqli_connect($dbhost, $dbuser, $dbpass,$db);
  
  if($conn) {
     $query="CREATE TABLE tododata(
                  id int(11) PRIMARY KEY auto_increment,
                  item varchar(255) not null
                  )ENGINE=InnoDB ";
          mysqli_query($conn,$query);

	  

}else{
	echo "connection failed";
  }	
?>