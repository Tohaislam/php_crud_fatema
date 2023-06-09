   <?php
    include "inc/header.php";
    ?>
   <section>
       <div class="container">
           <div class="row">
               <div class="col-md-6 offset-3 pt-5">
                   <h2>Register new form</h2>
                   <form action="" method="POST">
                       <div class="mb-3">
                           <label for="exampleInputId" class="form-label">id</label>
                           <input type="number" name="id" class="form-control" id="exampleInputid" aria-describedby="idHelp">
                       </div>
                       <div class="mb-3">
                           <label for="exampleInputName" class="form-label">name</label>
                           <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                       </div>
                       <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">email</label>
                           <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                       </div>
                       <div class="mb-3">
                           <label for="exampleInputPhone" class="form-label">phone</label>
                           <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                       </div>

                       <button type="submit" name="send" value="save changes" class="btn btn-primary">Submit</button>
                   </form>
                   <?php

                    if (isset($_POST['send'])) {

                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];

                        $query = "INSERT INTO student(id, name, email, phone) VALUES('$id', '$name', '$email', '$phone')";
                        $addUser = mysqli_query($connection1, $query);

                        if ($addUser) {
                            header("location:index1.php");
                        } else {
                            die("database connection faild" . mysqli_error($connection1));
                        }
                    }

                    ?>
               </div>
           </div>
       </div>
   </section>

   <?php
    include "inc/footer.php";
    ?>