<?php

require 'database.php';


if($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST))
{

    $name = htmlentities(trim($_POST['name']));

    $pdo = Database::connect();
    $sql = 'INSERT INTO job (name) VALUE (?)';
    $q = $pdo->prepare($sql);
    $q->execute(array($name));
    Database::disconnect();
    header('Location: add_job.php');
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Crud</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>


<div class="container">
    <div class="row">
        <h3>Ajouter un contact</h3>
    </div>

    <form method="post" action="add_job.php">
        <div class="control-group">
            <label class="control-label">Job</label>
            <input type="text" name="name" placeholder="Job">
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-success" name="submit" value="'submit">
            <a class="btn" href="index.php">Retour</a>
        </div>

    </form>


    <h3>Liste des job enregistrer</h3>

    <table class="table table-hover table-bordered">
        <thead>
        <th>#</th>
        <th>Name</th>
        </thead>
        <tbody>
        <?php
        $pdo = Database::connect();
        $sql = 'SELECT * FROM job';

        foreach ( $pdo->query($sql) as $job) {
            echo '<tr>';
            echo "<td>".$job['id']."</td>";
            echo "<td>".$job['name']."</td>";
            echo '</tr>';
        }
        Database::disconnect();
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
