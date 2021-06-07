<?php


include 'vendor/autoload.php';
$users = (new Classes\User())->getAll();

?>

<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
<?php 
    session_start();
    if(isset($_GET['message'])){
        echo $_GET['message'];
    }
    ?>
<div class="container">
    <div class="row">
        <h1>User List</h1>
        <button class="btn btn-success" style="float:right"><a href="index.php">Add New User's</a></button>
        <table class="table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user->getFirstName(); ?></td>
                    <td><?php echo $user->getLastName(); ?></td>
                    <td><?php echo $user->getEmail(); ?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>
