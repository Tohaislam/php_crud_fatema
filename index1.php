   <?php
    include "inc/header.php";
    ?>
   <section>
       <div class="container">
           <div class="row">
               <table class="table table-striped table-bordered pt-5 pb-5" id="example">
                   <thead>
                       <tr>
                           <th scope="col">si</th>--
                           <th scope="col">name</th>
                           <th scope="col">email</th>
                           <th scope="col">phone</th>
                           <th scope="col">action</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php
                        $query        = "SELECT * FROM student";
                        $allUser     = mysqli_query($connection1, $query);

                        while ($row   = mysqli_fetch_assoc($allUser)) {
                            $id         = $row['id'];
                            $name       = $row['name'];
                            $email      = $row['email'];
                            $phone      = $row['phone'];

                        ?>
                           <tr>
                               <th scope="row"><?php echo $id ?></th>
                               <td scope="row"><?php echo $name ?></td>
                               <td scope="row"><?php echo $email ?></td>
                               <td scope="row"><?php echo $phone ?></td>
                               <td>
                                   <div class="btn-group">
                                       <a href="updateUser.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">update</a>
                                       <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteUser<?php echo $id; ?>">delete</a>
                                   </div>
                               </td>
                               <!-- Delete User Conformation -->
                               <div class="modal fade" id="deleteUser<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h1 class="modal-title fs-5" id="exampleModalLabel">Do you conform to delete this user?</h1>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                           </div>
                                           <div class="modal-body">
                                               
                                                   <a href="index1.php?id=<?php echo $id ?>" type="submit" class="btn btn-danger">Confirm</a>
                                                   <a type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</a>
                                                
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </tr>

                       <?php

                        }
                        ?>
                   </tbody>
               </table>
               <!--Table End-->
               <!--DElete User SQL code-->
               <?php

                if ( isset($_GET['id']) ) {
                    $userID     = $_GET['id'];
                    $query      = "DELETE FROM student WHERE id = '$userID'";
                    $deleteUser = mysqli_query($connection1, $query);

                    if ( $deleteUser ) {
                        header("location:index1.php");
                    } else {
                        die("database connection Faild" . mysqli_error($connection1));
                    }
                }

                ?>


               <div class="pt-5 pb-5">
                   <a href="create.php" class="btn btn-primary">Create New </a>
               </div>
           </div>
       </div>

   </section>
   <?php
    include "inc/footer.php";
    ?>