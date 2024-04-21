<?php
    session_start();
    require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
      <div class="sidebar">
        <div class="logo">
            <ul class="menu">
               <li class="active">
                <a href="../Users/index.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
               </li>

               <li>
                <a href="../Users/index.php">
                    <i class="fas fa-user"></i>
                    <span>User</span>
                </a>
               </li>

               <li>
                <a href="../Registration/registration.php">
                    <i class="fas fa-users"></i>
                    <span>Client</span>
                </a>
               </li>

               <li>
                <a href="contact.php">
                    <i class="fas fa-address-book"></i>
                    <span>Contact</span>
                </a>
               </li>

               <li class="logout">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
               </li>
            </ul>
        </div>
      </div>

      <!-- Content -->

      <div class="main--content">
        <div class="header--wrapper">
           <div class="header--title">
              <span>Primary</span>
              <h2>Contact-Info</h2>
           </div>
               <div class="user--info">
                 <div class="search--box">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" placeholder="Search here..."> 
                 </div>
                    <img src="../Images/gallery1.jpeg" alt="">
                </div>
         </div>
         
         
         <div class="container mt-4">
         
         <?php include('message.php'); ?>

            <div class="row">
               <div class="col-md-12">
                   <div class="card">
                      <div class="card-header">
                          <h3>Manage Contact
                             <a href="add-user.php" class="btn btn-primary float-end">Add New</a>
                          </h3>
                      </div>

                      <div class="card-body">
                         <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $query = "SELECT * FROM information";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $information)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $information['user_id']; ?></td>
                                                <td><?= $information['firstName']; ?></td>
                                                <td><?= $information['lastName']; ?></td>
                                                <td><?= $information['email']; ?></td>
                                                <td><?= $information['phone']; ?></td>
                                                <td>
                    
                                                    <a href="edit-user.php?id=<?= $information['user_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_user" value="<?php $information['user_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                            </tbody>
                         </table> 
                      </div>
                   </div>
               </div>
            </div>
       </div>
      </div>

    
      <script src="hOver.js"></script>
      

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>