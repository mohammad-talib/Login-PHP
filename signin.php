
<?php 
    session_start();
    require 'db.php';

    $message = '';

    if(isset($_POST['submit'])){
        if(empty($_POST['name']) || empty($_POST['password'])){
            $message = "Fill The Inputs";
        }else{
        $sql = 'SELECT * FROM users WHERE name=:name AND password=:password';
        $statement = $conn->prepare($sql);
        $statement->execute(
            array(
                'name' => $_POST['name'],
                'password' => $_POST['password']
            )
        );
        $count = $statement->rowCount();
        if($count > 0){
            $row= $statement->fetch(PDO::FETCH_ASSOC);
            $_SESSION['name'] = $_POST['name'];
            $_SESSION["rule"] = $row["rule"];
            if($_SESSION["rule"] == 'user'){
                header("Location: home.php");
            }else{
                header("Location: index.php");
            }

        }else{
            $message = "Wrong Data";
        }
        }
    }

?>

<?php require 'header.php' ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Sign In</h2>
        </div>

        <?php if(!empty($message)):?>

            <div class="alert alert-danger">

                <?php echo $message; ?>

            </div>
        <?php endif ?>
            
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                </div>

            </form>

        </div>
    </div>
</div>



<?php require 'footer.php' ?>