<?php 
    require 'db.php';

    $id = $_GET['id'];
    
    $sql= 'SELECT * FROM users WHERE id=:id';

    $statement = $conn->prepare($sql);

    $statement->execute([':id' => $id]);

    $person = $statement->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = 'UPDATE users SET name=:name, email=:email, gender=:gender WHERE id=:id';
        
        $statement = $conn->prepare($sql);
         
        if($statement->execute([':name' => $name, ':email' => $email, ':gender' => $gender, ':id' => $id])){
            header("Location: index.php");
        }
    }

?>


<?php require 'header.php' ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update Person</h2>
        </div>

        <div class="card-body">
            <form method="post">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="<?= $person->name; ?>" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" value="<?= $person->gender; ?>" name="gender" id="gender" class="form-control">
                </div>
                <div class="form-group">
                    
                    <button type="submit" name="submit" class="btn btn-primary">Update person</button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php require 'footer.php' ?>