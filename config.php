<?php
    // ilk önce hatalarımızı yönettiğimiz error.php dosyamızı dahil ediyoruz
    require_once 'pages/error.php';

    //eğer sayfaya post olarak buton değeri gelmiş ve button değeri 1 e eşit ise;
    if (isset($_POST['button']) && $_POST['button'] == 1)  {

      // Post ile gelen veri tabanı bilgilerini burada en sade haliyle alıyoruz.
      $host = $_POST['dbHost'];
      $dbname = $_POST['dbName'];
      $dbUser = $_POST['dbUser'];
      $dbPass = $_POST['dbPass'];

      // aldığımız değerleri güvenlik açısından temizliyoruz.
      $host = htmlspecialchars(str_replace(" ","",$host));
      $dbname = htmlspecialchars(str_replace(" ","",$dbname));
      $dbUser = htmlspecialchars(str_replace(" ","",$dbUser));
      $dbPass = htmlspecialchars(str_replace(" ","",$dbPass));

      // tüm bunlara rağmen hala boş olup olmadığını herhangi bir değer için kontrol edelim
      # Password alanını kontrol etmek kendinize kalmış localhost'ta çalışanlar için aşağıdaki gibi,
      if (empty($host) || empty($dbname) || empty($dbUser)) {
        header("Location:index.php?error=empty");
      }

      // Host üzerinde çalışanlar için aşağıdaki gibi bir kullanım olmalıdır.
      
      /*
      | if (empty($host) || empty($dbname) || empty($dbUser)) {
      |    header("Location:index.php?error=empty");
      |   }
      */

      // Try-catch yapımızı oluşturuyoruz.
      #en son temizlenmiş halleriyle beraber try-catch değişkenlerimizi içerisine yerleştiriyoruz.
      try {

        $db = new PDO("mysql:host=$host;dbname=$dbname",$dbUser,$dbPass);

      } catch (PDOException $e) {

        // Hata mesajını daha ayrıntılı görmek için aşağıdaki fonksiyonu tanımlıyoruz.
        echo DbConnectionFailed($e);

      }





    }


 ?>
