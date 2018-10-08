<?php
require 'database.php';

$pdo = Database::connect();
$id = null;

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("location:index.php");
}

$sql = 'SELECT u.*,j.name FROM user AS u INNER JOIN job AS j ON u.job_id=j.id WHERE u.id =?';
$q = $pdo->prepare($sql);
$q->execute([$id]);
$data = $q->fetch(PDO::FETCH_ASSOC);
Database::disconnect();

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Crud en php</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="row">
        <h3> Edition</h3>
    </div>

    <a class="btn btn-success" href="index.php">Retour</a>



    <div class="row">
        <table class="table table-bordered">
            <thead>
            <th>Lastname</th>
            <th>Job</th>
            <th>Country</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Mail</th>
            </thead>
            <tbody>
            <td><?php echo $data['lastname'] ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['country'] ?></td>
            <td><?php echo $data['age'] ?></td>
            <td><?php echo $data['phone'] ?></td>
            <td><?php echo $data['mail'] ?></td>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>