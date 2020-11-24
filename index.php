<?php
   
   include('includes/header.php');   
   include('includes/nav.php'); 
   include('connection.php');
   include('update.php');
   
        if(isset($_POST['search'])){
            $item=$_POST['content'];
            $sql="SELECT * FROM tododata WHERE CONCAT(id, item) LIKE '%$item%' ";
            $result=mysqli_query($conn,$sql);

        }else{
            $sql="SELECT * FROM tododata";
            $result=mysqli_query($conn,$sql);
        }




?>
     
	 <?php if(isset($_SESSION['msg'])) {?>

           <?php if(isset($_SESSION['msg'])){ ?>
               <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>"><?php echo $_SESSION['msg'] ;
                     unset($_SESSION['msg']);
               ?></div>
             <?php } ?>
	 
	    <?php } ?>
	 
	 
 <!-- ADVsense Here -->
    <div class="container-fluid lg">

          <!-- Page Heading -->    

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
		    
            <div class="card-header py-3">
               <h3>ToDo List</h3>
                <form class=" form-inline  float-sm-right" action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-1 small" placeholder="Search for Todo item.."  name="content">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="search">
                                <i class="fa fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

               <!-- data-->
            </div>
            <div class="card-body">
			
			     <div class=" row ">

                    <form class=" row justift-content-center  w-75 p-3 " action="" method="POST" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group justift-content-center ">
                            <label for="exampleInputEmail1"></label>
                            <input class="form-control w-100 p-3" type="text" placeholder="ToDo List" name="list"  value="<?php echo $list;?>">

                        </div>
                       
                        <div class="form-group ">
							<?php if($update=="true"){ ?>
								<button type="submit" class="btn btn-info bnt " name="update">Update</button>
							<?php }else{?>
								<button type="submit" class="btn btn-primary bnt" name="submit">Add</button>
							<?php } ?>
						</div>
                    </form>
			   
			   
			   
              <div class="table-responsive">
			     
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th style='text-align:center;' >ToDo Item</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php
                      
					  if(mysqli_num_rows($result)>0){
						$i=1;
						 while($row = mysqli_fetch_assoc($result)){
							    echo "<form method='post'>";
								 echo "<tr>
								         <td style='text-align:center; width:10px;'> ".$i."</td>
										 <td style='text-align:center; width:400px;'> ".$row['item']."</td>
										 <td style='width:100px;'><button class='btn btn-primary'><a href='index.php?update=".$row['id']."' style='color:white;text-decoration: none'/>Update</button></td>
										 <td style='width:100px;'><button class='btn btn-danger'><a href='update.php?delete=".$row['id']."' style='color:white;text-decoration: none'/>Delete</button></td>
									  </tr>";
							    
							 	echo "<form>";
							 $i++; 	
						 }
						
					     echo("</table>");
						 
					  }
					  
                   
					?>
                    
                  </tbody>
                </table>
              </div>
                

                </div>

            </div>
          </div>



        <!-- /.container-fluid -->
       
      </div>
	<!-- ADVsense Ends Here -->
    <!--footer--->
     <?php
    
     include('includes/footer.php');   
    
     ?>

    <!-- Bootstrap core JavaScript -->
    <?php
    
     include('includes/bcj.php');   
    
     ?>
    <!-- Additional Scripts -->
    <?php
    
     include('includes/ascript.php');   
    
     ?>
  </body>
</html>