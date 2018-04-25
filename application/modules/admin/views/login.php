<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url().'css/backend/login.css'?>">
</head>
<body>

<h2>Đăng nhập hệ thống</h2>
<form method="post" action="<?php echo base_url().'admin/auth_user';?>">
  <div class="imgcontainer">
    <img src="<?php echo base_url().'images/login.png' ?>" alt="Avatar" class="avatar">
    <p class="notify_error"><?php if(isset($error)){echo $error;} else{ echo "";}?></p>
  </div>
  <div class="container">
    <label for="email"><b>Tài khoản</b></label>
    <input type="text" placeholder="Nhập tài khoản" name="email" required>

    <label for="password"><b>Mật khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="password" required>
        
    <button type="submit">Đăng nhập</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Ghi nhớ
    </label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <input class="cancelbtn" type="reset" value="Hủy">
    <span class="psw">Quên <a href="#">mật khẩu?</a></span>
  </div>
</form>

</body>
</html>