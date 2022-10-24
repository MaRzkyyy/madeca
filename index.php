<?php
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
                <input type="text" name="search" placeholder="Cari Pekerjaan">
                <input type="submit" name="cari" value="Cari Kerjaan">
            </form>
        </div>
    </div>
    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC ");
                    if(mysqli_num_rows($kategori) > 0){
                        while($k = mysqli_fetch_array($kategori)){
                ?>
            <a href="kerjaan.php?kat=<?php echo $k['category_id'] ?>">          
                <div class="col-5">
                    <img src="img/icon-category.png" width="50px" style="margin-bottom:5px;">
                    <p><?php echo $k['category_name']?></p>
                </div>
            </a>  
                <?php }}else{ ?>
                    <p>Kategori tidak ada </p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--Calon pekerja-->
    <div class="section">
        <div class="container">
            <h3>CaPek</h3>
            <div class="box">
            <?php
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 8");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                    <a href="detail-pekerja.php?id=<?php echo $p['product_id'] ?>">
                    <div class="col-4">
                    <img src="produk/<?php echo $p['product_image'] ?>">
                    <p class="nama"><?php echo substr($p['product_name'], 0,30) ?></p>
                    <p class="harga">Rp.<?php echo number_format($p['product_price'] ) ?></p>
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