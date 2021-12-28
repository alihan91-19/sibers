<?php if($err) print "<div class='text-danger'>{$err}</div>"; ?>

<form action="<?php print PATH_BASE . "index.php"; ?>" method="post">
  <div class="mb-3">
    <label for="exampleInputLogin1" class="form-label">Login</label>
    <input type="text" name="login" class="form-control" id="exampleInputLogin1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>