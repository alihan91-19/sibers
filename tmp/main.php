<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container my-5">
    <?php 
    if ($isLogin){
      print '
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-info" href="' . PATH_BASE . '" role="button">Users</a>
        <a class="btn btn-success" href="' . PATH_BASE . '?req=add" role="button">Add new user</a>
        <a class="btn btn-danger" href="' . PATH_BASE . '?logout" role="button">Logout</a>
      </div>';
    }
    ?>
    <?php require_once $tmp . ".php"; ?>
  </div> 

</body>
</html>