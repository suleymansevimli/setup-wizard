
<?php
require_once 'error.php';
//eğer kullanıcı form alanlarını doldururken bir hata yapmış ise error get değeri il bunu dönderelim
if (isset($_GET['error'])) {

  //Kullanıcı boş mesaj göndermiş ise
  if ($_GET['error'] == "empty") {
      echo emptySend();
  }
}

 ?>

<form align=center style="margin:5%;" class="" action="config.php" method="post">

  <label for="username">User Name</label> <br>
  <input type="text" name="username" id="username" value=""> <br> <br>

  <label for="password">Password</label> <br>
  <input type="password" name="pass" id="password" value=""> <br> <br>

  <label for="mail">E-Mail</label> <br>
  <input type="email" name="mail" id="mail" value=""> <br> <br>

  <button type="submit" name="button" value="1">Kayıt ol</button>
</form>
