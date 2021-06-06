<html>
<head>
    <title>User Crud</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <?php

   include 'vendor/autoload.php';
    $userClass = new Classes\User();
//        var_dump($user);
$user = (new Classes\User())->getById($_GET['id']);

    ?>
<div class="container">
    <div class="row">
        <h1>Edit User</h1>
        <form action="update.php" class="form" role="form" method="post">
            <div class="form-group">
                <input type="hidden" value="<?php echo $user->getId(); ?>" name="id">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $user->getEmail(); ?>">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control"  name="first_name" value="<?php echo $user->getFirstname(); ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $user->getLastName(); ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Update</button> 
            </div>
        </form>
    </div>
</div>
</body>
</html>