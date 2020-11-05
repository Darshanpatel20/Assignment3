<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Home</title>
  </head>
  <body class="container">
      
      <?php include 'connection.php'; ?>
      
      <div class="row">
          <div class="col">
              <ul class="nav navbar-light bg-dark"">
                  <li><a href="index.php" class="nav-link">Home</a></li>
                  
                  <?php foreach($record as $menu): ?>
                  
                  <li class="nav-item active">
                      
                      <a href="index.php?page='<?php echo $menu['pg']; ?>'" class="nav-link"><?php echo $menu['pg']; ?></a>
                      
                  </li>
                  
                  <?php endforeach; ?>
                   <li><a href="form.php" class="nav-link">Create new record</a></li>
              </ul>
          </div>
      </div>
      
      <div class="row">
          <div class="col">
              <?php 
                    
                    if(isset($_GET['page']))
                    {
                        $pg = trim($_GET['page'], "'");
                        $record = $connection->query("select * from pages where pg='$pg'") or die($connection->error());
                        $single = $record->fetch_assoc();
                        
                        

                        $pg = $single['pg'];
                        $h1 = $single['h1'];
                        $h2 = $single['h2'];
                        $p1 = $single['p1'];
                        $p2 = $single['p2'];
                        $id = $single['id'];
                        $update = "updateform.php?update=" . $id;
                        $delete = "connection.php?delete=" .$id;
                        
                        echo "
                        
                        
                        <div class='card' style='width: 100%;'>
                            <div class='card-body'>
                                <h3 class='card-title'>{$pg}</h3>
                                <h4 class='card-title'>{$h1}</h4>                               
                                <h6 class='card-subtitle mb-2 text-muted'>{$h2}</h6>
                                <p class='card-text'>{$p1}</p>
                                <p class='card-text'>{$p2}</p>
                                <a href='{$update}' class='card-link'>Update</a>
                                <a href='{$delete}' class='card-link'>Delete</a>
                              </div>                         
                        </div>
                            
                        ";
                        
                    }
                    else
                    {

                        echo "
                        <!-- Image and text -->
                                <nav class='navbar navbar-light bg-light'>
                                <a class='navbar-brand' href='#'>
                                    <img src='Images/scp-pl.png' width='400' height= '400' class='d-inline-block align-top'  alt='' loading='lazy'>
                                SCP FOUNDATION
                              </a>
                        </nav>
                        
                        ";
                    }
              
              ?>
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>