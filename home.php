<?php require 'header.php' ?>

<?php 

    session_start();

    if(isset($_SESSION['name'])){
        $message = $_SESSION['name'];
        
    }else{
        header("Location: signin.php");
    }

    

?>

<div class="jumbotron">
  <h1 class="display-4">Hello, <?php echo $message; ?>!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="logout.php" role="button">LOG OUT</a>
</div>

<?php require 'footer.php' ?>