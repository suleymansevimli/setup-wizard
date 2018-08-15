<?php
require('vendor/autoload.php');
use Thamaraiselvam\MysqlImport\Import;

  // bu alanda txt dosyamızda bulunan verilere ihtiyacımız var
  $file = fopen('../db.txt','r');
  $read = fread($file,filesize('../db.txt'));
  $close = fclose($file);
  $content = explode(".",$read);

  // filename haric hepsini dizi elemanlarımıza eşitliyoruz.
  $filename = 'test.sql';
  $username = $content[2];
  $password = $content[3];
  $database = $content[1];
  $host = $content[0];

  // Yeni bir class oluşturup arkamıza yaslanıyoruz
  $import = new Import($filename, $username, $password, $database, $host);

 ?>
