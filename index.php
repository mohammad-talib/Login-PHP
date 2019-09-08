<?php 
    require 'db.php';

    $sql= 'SELECT * FROM users';

    $statement = $conn->prepare($sql);

    $statement->execute();

    $people = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>
<body class="bg-info">


<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">DashBoard</a>
  <form class="form-inline">
    <a class="btn btn-danger" href="logout.php" role="button">LOG OUT</a>
  </form>
</nav>

<div class="container">

    <div class="card mt-5">
    
        <div class="card-header">
            <h2>ALL Users</h2>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>EMAIL</td>
                    <td>GENDER</td>
                    <td>Action</td>
                </tr>
                <?php foreach($people as $person):?>
                    <tr>
                        <td><?= $person->id; ?></td>
                        <td><?= $person->name; ?></td>
                        <td><?= $person->email; ?></td>
                        <td><?= $person->gender; ?></td>
                        <td>
                            <a href="edit.php?id=<?=$person->id ?>" class="btn btn-info">Edit</a>
                            <a onclick="return confirm('Are You Sure')" href="delete.php?id=<?=$person->id ?>" class="btn btn-danger">Delete</a>
                        </td>
                        
                    </tr>
                <?php endforeach;?>
            </table>
        
        </div>
    </div>

</div>

<?php require 'footer.php' ?>