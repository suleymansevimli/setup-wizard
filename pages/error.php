<?php

  // veri tabanı bağlantısında karşılaşılan herhangi bir hatada geri dönüt verecek olan fonksiyonumuz
  function DbConnectionFailed($e){

    // ilk önce $e değişkeni içerisinde neler varmış bakalım.
    # print_r($e);

    // $e değişkeni bize bir obje dönderdiyor ve içerisindeki nesnelere ulaşıyoruz.
    #Örn: $e->getMessage();
    return
    "<h1 style=\"text-align:center;margin:5%;\"> Oh No! </h1>
    <table style=\"text-align:center;\" heigt=\"500\" width=\"800\" align=\"center\" cellspacing=\"15\" cellpadding=\"15\" border=\"4\">
      <tr>
        <td> Error Message </td>
        <td> Error Code </td>
        <td> Error File  </td>
        <td> Error Line </td>
      </tr>
      <tr>
        <td> ".$e->getMessage()." </td>
        <td>".$e->getCode()." </td>
        <td> ".$e->getFile()." </td>
        <td> ".$e->getLine()." </td>
      </tr>
    </table>
    <a href=\"index.php\">Go to Homepage</a>";
  }


    // boş olarak dönen değerlerden sonra ekrana basılacak olan hata mmesajı
    function emptySend(){
      return "<h3 style=\"text-align:center;border:2px dotted red;\">Lütfen form alanlarını boş bırakmayınız !! </h3>";
    }
 ?>
