<?php
include "inc/header.php";
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 pt-5">
                <h2>update user Information</h2>
                <?php
                if (isset($_GET['id'])) {
                    $userId = $_GET['id'];
                    $query  = "SELECT * FROM student WHERE id ='$userId'";
                    $data   = mysqli_query($connection1, $query);
                    while ($row = mysqli_fetch_assoc($data)) {
                        $id     = $row['id'];
                        $name   = $row['name'];
                        $email  = $row['email'];
                        $phone  = $row['phone'];

                ?>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputId" class="form-label">id</label>
                                <input type="text" name="id" class="form-control" id="exampleInputId" aria-describedby="idHelp" value="<?php echo $id ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $name ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPhone" class="form-label">phone</label>
                                <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $phone ?>">
                            </div>

                            <button type="submit" name="save" value="save change" class="btn btn-primary">Submit</button>
                        </form>

                <?php
                    }
                }
                ?>

                <!--Update user data-->
                <?php
                if (isset($_POST['save'])) {
                    $id     = $_POST['id'];
                    $name   = $_POST['name'];
                    $email  = $_POST['email'];
                    $phone  = $_POST['phone'];

                    $query      = "UPDATE student SET id='$id', name='$name', email='$email', phone='$phone' WHERE id='$userId'";
                    $updateUser = mysqli_query($connection1, $query);

                    if ($updateUser) {
                        header("location:index1.php");
                    } else {
                        die("database connection Faild" . mysqli_error($connection1));
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