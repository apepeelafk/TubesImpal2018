<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RAK.BUKU</title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">RAK.BUKU</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="publisher_list.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp; Penerbit</a></li>
              <li><a href="books.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Buku</a></li>
              <li><a href="pinjam.php"><span class=""></span>&nbsp; Pinjam</a></li>
              <li><a href="pengembalian.php"><span class=""></span>&nbsp; Kembali</a></li>
            </ul>
        </div>
      </div>
    </nav>
    <?php
      if(isset($title) && $title == "Index") {
    ?>
   
    <div class="jumbotron">
      <div class="container text-center">
        <h1>Selamat Datang di RAK.BUKU</h1>
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">