<?php
    // ayarlar dosyamızı çağırıyoruz..
    require_once 'config.php';

    // hatalarımızı barındıran dosyamızı dahil ediyoruz
    require_once 'pages/error.php';

    //eğer kullanıcı form alanlarını doldururken bir hata yapmış ise error get değeri il bunu dönderelim
    if (isset($_GET['error'])) {

      //Kullanıcı boş mesaj göndermiş ise
      if ($_GET['error'] == "empty") {
          echo emptySend();
      }
    }
 ?>
 <!-- database bilgilerini alacağımız formumuzu oluşturuyoruz -->
<h1 style="text-align:center"> Welcom to Database Setup Wizard
</h1> <br>
   <form align="center" class="" action="config.php"  method="post">

      <label for="host">Host Adress : </label> <br>
      <input id="host" type="text" name="dbHost" value="<?php echo isset($_POST['dbHost']) ? $_POST['dbHost'] : "";  ?>"> <br> <br>

      <label for="dbName">Database Name : </label> <br>
      <input id="dbName" type="text" name="dbName" value="<?php echo isset($_POST['dbName']) ? $_POST['dbName'] : "";  ?>"> <br> <br>

      <label for="dbUser">Database User : </label> <br>
      <input id="dbUser" type="text" name="dbUser" value="<?php echo isset($_POST['dbUser']) ? $_POST['dbUser'] : "";  ?>"> <br> <br>

      <label for="dbPass">Database User Password : </label> <br>
      <input id="dbPass" type="text" name="dbPass" value="<?php echo isset($_POST['dbPass']) ? $_POST['dbPass'] : "";  ?>"> <br> <br>

      <button type="submit" name="button" value="1">Bağlan</button>

   </form>
