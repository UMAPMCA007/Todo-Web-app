

<div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
              <?php
				$path      =$_SERVER['PHP_SELF']; 
				$menuactive= basename($path);
				  switch($menuactive){
					   case "properties.php":	  
				    		$properties='class="active"';
						    $title     ="<h2>Movies</h2>";
						    echo $title;
						  break;
						 case "contact.php":	  
				    		$contact   ='class="active"';
						    $title     ="<h2>Comment Us</h2>";
						    echo $title;
						  break; 
				  }
				  
				  
				  
			  ?>
                
               
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>