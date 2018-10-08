<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Crud en php</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<br>
<div class="container">
    <br>
    <div class="row">
        <h2>Crud en PHP</h2>
    </div>

    <div class="row">
        <a href="add.php" class="btn btn-success">
            Ajouter un user
        </a>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <th>Lastname</th>
                <th>Job</th>
                <th>Country</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Mail</th>
                <th>Actions</th>
                </thead>

                <tbody>
                <?php include 'database.php';

                $pdo = Database::connect();
                $sql = 'SELECT u.*,j.name FROM user AS u INNER JOIN job AS j ON u.job_id=j.id ORDER BY id DESC';
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['lastname'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['country'] . '</td>';
                    echo '<td>' . $row['age'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['mail'] . '</td>';
                    echo '<td>';

                    echo '<a class="btn btn-warning" href="read.php?id=' . $row['id'] . '">Read </a>';
                    echo '<a class="btn btn-primary" href="update.php?id=' . $row['id'] . '">Update </a>';
                    echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '">Delete </a>';
                    echo '</td>';
                    echo '</tr>';
                }
                Database::disconnect()
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
