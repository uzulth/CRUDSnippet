<?php

require 'database.php';


if($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST))
{
    $id = null;
    $lastname = htmlentities(trim($_POST['lastname']));
    $job = htmlentities(trim($_POST['job']));
    $age = htmlentities(trim($_POST['age']));
    $phone = htmlentities(trim($_POST['phone']));
    $mail = htmlentities(trim($_POST['mail']));
    $country = htmlentities(trim($_POST['country']));

    if (!empty($_GET['id']))
    {
        $id = $_REQUEST['id'];
    }elseif (null == $id)
    {
        header('Location: index.php');
    }

    $pdo = Database::connect();
    $sql = 'UPDATE user SET lastname=?,age=?,phone=?,mail=?,job_id=?,country=? WHERE id=?';
    $q = $pdo->prepare($sql);
    $q->execute(array($lastname,$age,$phone,$mail,$job,$country,$id));
    Database::disconnect();
    header('Location: index.php');
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

    <form method="post" action="add.php">
        <div class="control-group">
            <label class="control-label">Lastname</label>
            <input type="text" name="lastname" placeholder="Lastname">
        </div>
        <div class="control-group">
            <label class="control-label">Job</label>
            <select name="job">
                <?php
                $pdo = Database::connect();
                $sql = 'SELECT * FROM job ORDER BY id DESC';;
                foreach ($pdo->query($sql) as $row)
                {
                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                }
                Database::disconnect();
                ?>
            </select>
            <a href="add_job.php">+ add job</a>
        </div>
        <div class="control-group">
            <label class="control-label">Age</label>
            <input type="text" name="age" placeholder="Age">
        </div>
        <div class="control-group">
            <label class="control-label">Phone</label>
            <input type="text" name="phone" placeholder="Phone">
        </div>
        <div class="control-group">
            <label class="control-label">Mail</label>
            <input type="text" name="mail" placeholder="Mail">
        </div>
        <div class="control-group">
            <label class="control-label">Country</label>
            <input type="text" name="country" placeholder="Country">
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-success" name="submit" value="Submit">
            <a class="btn" href="index.php">Retour</a>
        </div>

    </form>
</div>

</body>
</html>
