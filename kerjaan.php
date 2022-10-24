<?php
error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email FROM tb_admin WHERE admin_id = 1" );
    $a = mysqli_fetch_object($kontak);
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

    <!--Calon pekerja-->
    <div class="section">
        <div class="container">
            <h3>CaPek</h3>
            <div class="box">
            <?php
                if($_GET['search'] != ''|| $_GET['kat'] != ''){
                    $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                }
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status= 1 $where ORDER BY product_id DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                    <a href="detail-pekerja.php?id=<?php echo $p['product_id'] ?>">
                    <div class="col-4">
                        <img src="produk/<?php echo $p['product_image'] ?>">
                        <p class="nama"><?php echo substr($p['product_name'],0,30)  ?></p>
                        <p class="harga">Rp. <?php echo number_format($p['product_price'])  ?></p>
                    </div>
                    </a>
                <?php }}else{ ?>
                    <p>Pekerja tidak ada </p>
                <?php } ?>
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