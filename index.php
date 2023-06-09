<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Php Data Read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php
    include "db.php";
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pt-5">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputId" class="form-label">id</label>
                            <input type="number" name="id" class="form-control" id="exampleInputId" aria-describedby="idHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPhone" class="form-label">phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputphone">
                        </div>

                        <button type="submit" name="send" class="btn btn-primary">Submit</button>
                    </form>
                    <?php
                    if (isset($_POST['send'])) {
                        $id     = $_POST['id'];
                        $name   = $_POST['name'];
                        $email  = $_POST['email'];
                        $phone  = $_POST['phone'];
                        // echo $id ."<br>" . $name ."<br>" . $email ."<br>" . $phone;

                        $query = "INSERT INTO user(id, name, email, phone) VALUES ('$id', '$name',  '$email', '$phone')";

                        $addUser = mysqli_query($connection, $query);
                        if ($addUser) {
                            header("location:adduser.php");
                        } else {
                            die("database connection failed" . mysqli_error($connection));
                        }
                    }

                    ?>

                </div>
                <div class="col-md-6 pt-5">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query      = "SELECT * FROM user";
                            $alluser    = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($alluser)) {
                                $id     = $row['id'];
                                $name   = $row['name'];
                                $email  = $row['email'];
                                $phone  = $row['phone'];


                            ?>
                                <tr>
                                    <th scope="row"><?php echo $id ?></th>
                                    <th scope="row"><?php echo $name ?></th>
                                    <th scope="row"><?php echo $email ?></th>
                                    <th scope="row"><?php echo $phone ?></th>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>