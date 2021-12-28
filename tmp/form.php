<?php if(!empty($err)) print "<div class='danger'>{$err}</div>"; ?>
<?php if(!empty($message)){
   print "<div class='danger'>{$message}</div>";
} else {
?>

<form action="<?php print $actionPath;?>" method="post">

<input type="hidden" name="id" value="<?=(isset($id) ? $id : "")?>">

  <div class="row mb-3">
    <label for="inputLogin4" class="form-label">Login</label>
    <div class="col-sm-10">
      <input required type="text" name="login" class="form-control" id="inputLogin4" value="<?=(isset($data["login"]) ? $data["login"] : "")?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputLastname4" class="form-label">Lastname</label>
    <div class="col-sm-10">
      <input required type="text" name="lastname" class="form-control" id="inputLastname4" value="<?=(isset($data["lastname"]) ? $data["lastname"] : "")?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputFirstname4" class="form-label">Firstname</label>   
    <div class="col-sm-10">
      <input required type="text" name="firstname" class="form-control" id="inputFirstname4" value="<?=(isset($data["firstname"]) ? $data["firstname"] : "")?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword4" class="form-label">Password</label>
    <div class="col-sm-10">
      <input required type="password" name="password"class="form-control" id="inputPassword4">
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Sex</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="sex" value="1" id="flexRadioDefault1" <?=($data["sex"] == 1 ? "checked" : "") ?>>
        <label class="form-check-label" for="flexRadioDefault1">
          Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="sex" value="2" id="flexRadioDefault2" <?=($data["sex"] == 2 ? "checked" : "") ?>
>
        <label class="form-check-label" for="flexRadioDefault2">
          Female
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="sex" value="0" id="flexRadioDefault2" <?=($data["sex"] == 0 ? "checked" : "") ?>
>
        <label class="form-check-label" for="flexRadioDefault2">
          Undefined
        </label>
      </div>
    </div>
  </fieldset>
  <div class="row mb-3">
    <label for="inputBirthday4" class="form-label">Birthday</label>
    <div class="col-sm-10">
      <input required type="date" name="birthday" min="1921-12-27" max="<?=date()?>" class="form-control" id="inputBirthday4" value="<?=(isset($data["birthday"]) ? $data["birthday"] : "")?>">
    </div>
  </div> 
  <div class="form-check">
  <input class="form-check-input" name="isAdmin" type="checkbox" value="1" id="flexCheckDefault" <?=($data["isAdmin"] ? "checked" : "") ?>>
  <label class="form-check-label" for="flexCheckDefault">
    Admin
  </label>
</div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php } ?>