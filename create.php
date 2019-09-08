<?php 
    require 'db.php';
    $message = '';
    if(isset($_POST['submit'])){
        $sql = "INSERT INTO users (name, email, password, gender)
        VALUES ('$_POST[name]', '$_POST[email]', '$_POST[password]','$_POST[gender]')";
        $statement = $conn->prepare($sql);
        $state = $statement->execute();
        if($state){
            $message = 'data insertes successfuly';
        }
    }

?>




<?php require 'header.php' ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Sign Up</h2>
        </div>

        <div class="card-body">

        <?php if(!empty($message)):?>

            <div class="alert alert-success">
            
                <?php echo $message; ?>

            </div>
        <?php endif ?>
            <form method="post">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" id="gender" class="form-control">
                </div>
                <div class="form-group">
                    
                    <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php require 'footer.php' ?>