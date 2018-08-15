<?php
    // hata dosyamızı ekliyoruz
    require_once 'error.php';

    // db.txt dosyamıza kaydettiğimiz verileri okuyoruz
    $file = fopen('../db.txt','r');
    $read = fread($file,filesize('../db.txt'));
    $close = fclose($file);

    # Eğer sağlıklı bir şekilde okuma işlemi yapabilmişmiyiz kontrol ediyoruz
    // print_r($oku);

    // Gelen içeriğimizi explode ile dizi haline getiriyoruz
    $content = explode(".",$read);
    # print_r($icerik);

    // Tekrardan try-catch yapımızı kuruyoruz ve gelen verileri içerisine ekliyoruz
    try {
      $db = new PDO("mysql:host=$content[0];dbname=$content[1]",$content[2],$content[3]);
    } catch (PDOException $e) {
        echo DbConnectionFailed($e);
    }


    // pages klasörü içerisindeki index.php'den gelen post değerlerini alıyoruz.
    if (isset($_POST['button']) && $_POST['button'] == "1" ) {

      $username = $_POST['username'];
      $pass = $_POST['pass'];
      $mail = $_POST['mail'];

      // Güvenlik kontrollerimizi yapıyoruz
      $username = htmlspecialchars(str_replace(" ","",$username));
      $pass = htmlspecialchars(str_replace(" ","",$pass));
      $mail = htmlspecialchars(str_replace(" ","",$mail));

      // boşluk kontrolümüzü yapıyoruz
      if (empty($username) || empty($pass) || empty($mail)) {
        // error.php dosyamıza yazdığımız boşluk fonksiyonunu tanımlıyoruz.
        header("Location:index.php?error=empty");
      }
    }
    // Güvenlik açısından eğer işlemimiz başarıyla tamamlanmışsa db.txt dosyamızı siliyoruz.
    if (isset($db)) {
      //  unlink('../db.txt');

      // Hali hazırda olan veri tabanını içeriye import etmek için aşağıdaki komutları kullanıyoruz
      # bu alanda github'da bulduğum arkadaşımızın hazırladığı class'dan yararlandım
      # yararlandığım class = https://github.com/thamaraiselvam/mysql-import
       require 'Dbimport.php';
       if (isset($import)) {
         setcookie("dbimport","1",time()+3600);
         $sorgu = $db->prepare("INSERT INTO kullanicilar SET mail=?,username=?,password = ?");
         $insert = $sorgu->execute([
            $mail,$username,$pass
         ]);
         if (isset($insert)) {
           echo "her şey başarıyla tamamlandı";
         }
       }

   }else{
     echo "veri tabanı güvenli olarak tamamlanamadı lütfen tekrar deneyin";
     exit;
   }




 ?>
