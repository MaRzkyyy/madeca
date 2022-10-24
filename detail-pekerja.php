<?php
error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email FROM tb_admin WHERE admin_id = 1" );
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE  product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE <html>
</html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Madeca</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">Madeca</a></h1>
        <ul>
            <li><a href="kerjaan.php">Pekerjaan</a></li>
        </ul>
        </div>
    </header>

    <!-- search -->
    <div  class="search">
        <div class="container">
            <form action="kerjaan.php" >
                <input type="text" name="search" placeholder="Cari Pekerjaan" value="<?php echo $_GET['search']?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat']?>">
                <input type="submit" name="cari" value="Cari Kerjaan">
            </form>
        </div>
    </div>
    <!-- detail pekerja-->
    <div class="section">
        <div class="container">
            Detail Pekerja
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image?>" width="100%">
                    <div class="col-2">
                        <h3><?php echo $p->product_name?></h3>
                        <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                        <p>Deskripsi :<br>
                            <?php echo $p->product_description ?>
                        </p>
                        <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text= Hai, saya tertarik dengan Anda. "target=_blank"><img src="img/wa.png" width="50px">Hubungin via Whatsapp</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <h4>Whatsapp</h4>
            <p><?php echo $a->admin_telp ?></p>
            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>
            <small>Copyright &copy; 2022 - Madeca.</small>
        </div>
    </div>
</body>
</html>