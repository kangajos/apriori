<?php 
include_once "database.php";
include_once "fungsi.php";
include_once "import/excel_reader2.php";

//object database class
$db_object = new database();

if (isset($_GET['updates'])) {

    $id_produk = $_POST['kode_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $query = "UPDATE produk SET nama_produk='$nama_produk',harga_beli='$harga_beli',harga_jual='$harga_jual',stok='$stok' WHERE id_produk='$id_produk'";
    $input = $db_object->db_query($query); ?>
    <script> alert('Data transaksi berhasil diubah'); location.replace("?menu=produk"); </script>
<?php }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produk WHERE  id_produk='$id'";
    $query = $db_object->db_query($query);
    $jumlah = $db_object->db_num_rows($query);
    while ($row = $db_object->db_fetch_array($query)) { ?>
        <form method="post" enctype="multipart/form-data" action="index.php?menu=editproduk&updates=yes">
            <div class="form-group">
                <div class="input-group">
                    <label>Kode Barang</label>
                    <input name="kode_produk" value="<?=$row['id_produk']?>" readonly type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>Nama Barang</label>
                    <input name="nama_produk" value="<?=$row['nama_produk']?>" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>Harga Beli</label>
                    <input name="harga_beli" value="<?=$row['harga_beli']?>" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>Harga Jual</label>
                    <input name="harga_jual" value="<?=$row['harga_jual']?>" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>Stok</label>
                    <input name="stok" value="<?=$row['stok']?>" type="number" class="form-control">
                </div>
            </div>
            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
       
   <?php }
}
 ?>