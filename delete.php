<?php
require 'database.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("location:index.php");
}

$pdo = Database::connect();
$sql = 'DELETE FROM user WHERE id =?';
$q = $pdo->prepare($sql);
$q->execute([$id]);

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Crud en php</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/responsive.css">

    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
         data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false"
         data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>"/>
</head>
<body>
<div class="container">
    <div class="row">
        <h3> Entity id <?php echo $_GET['id']; ?> Deleted</h3>
    </div>

    <a class="btn btn-success" href="index.php">Retour</a>
</div>
</body>
</html>