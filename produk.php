<?php
//session_start();
if (!isset($_SESSION['apriori_toko_id'])) {
    header("location:index.php?menu=forbidden");
}

include_once "database.php";
include_once "fungsi.php";
include_once "import/excel_reader2.php";
?>

<!--<section class="page_head">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 col-md-12 col-sm-12">-->
<!--                <div class="page_title">-->
<!--                    <h2>Input Nilai</h2>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<?php
//object database class
$db_object = new database();

$pesan_error = $pesan_success = "";
if (isset($_GET['pesan_error'])) {
    $pesan_error = $_GET['pesan_error'];
}
if (isset($_GET['pesan_success'])) {
    $pesan_success = $_GET['pesan_success'];
}



if (isset($_GET['delete'])) {
    $id_produk = $_GET['delete'];
    $sql = "DELETE FROM produk WHERE id_produk='$id_produk'";
    $db_object->db_query($sql);
    ?>
    <script> alert('Data transaksi berhasil dihapus'); location.replace("?menu=produk"); </script>
    <?php
}


if (isset($_GET['tambah_produk'])) {
    $kode_produk = $_POST['kode_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $query = "INSERT INTO produk (id_produk,nama_produk,harga_beli,harga_jual,stok) VALUES ('$kode_produk','$nama_produk','$harga_beli','$harga_jual','$stok')";
    $db_object->db_query($query);
    // echo $tanggal.'<br>'.$produk_isi;die();
    ?>
    <script> alert('Data berhasil disimpan'); location.replace("?menu=produk"); </script>
<?php } ?>
<!---->
<!--<div class="super_sub_content">-->
<!--    <div class="container">-->
        <div class="row">
            <!--UPLOAD EXCEL FORM-->
            
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Tambah Barang
                </button>

            </div>
            <br>
            <!--            <div class="col-3"></div>-->
            <!--            <div class="col-3"></div>-->


            <!--            <br>-->


            <!-- modal input -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
                        </div>
                        <form method="post" enctype="multipart/form-data"
                              action="index.php?menu=produk&tambah_produk=yes">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Kode Barang</label>
                                        <input name="kode_produk" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Nama Barang</label>
                                        <input name="nama_produk" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Harga Beli</label>
                                        <input name="harga_beli" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Harga Jual</label>
                                        <input name="harga_jual" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Stok</label>
                                        <input name="stok" type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Simpan" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <?php
            if (!empty($pesan_error)) {
                display_error($pesan_error);
            }
            if (!empty($pesan_success)) {
                display_success($pesan_success);
            }

            $sql = "SELECT * FROM produk";
            $query = $db_object->db_query($sql);
            $jumlah = $db_object->db_num_rows($query);
            // echo "<BR><p>Jumlah data: " . $jumlah . "</p><br>";
            if ($jumlah == 0) {
                echo "Data kosong...";
            } else {
                ?>
<!--                <div class="table-responsive">-->
                    <table class='table table-bordered table-striped table-hover'>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Berkaitan</th>
                            <th></th>
                        </tr>
                        <?php

                        $no = 1;
                        while ($row = $db_object->db_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row['id_produk'] . "</td>";
                            echo "<td>" . $row['nama_produk'] . "</td>";
                            echo "<td>" . $row['harga_beli'] . "</td>";
                            echo "<td>" . $row['harga_jual'] . "</td>";
                            echo "<td>" . $row['stok'] . "</td>";
                            $nama_barang = $row['nama_produk'];
                            echo "<td>";
                            $kuking = "SELECT max(confidence) AS konfiden, kombinasi1, kombinasi2 FROM `confidence` WHERE kombinasi2 LIKE '$nama_barang' OR kombinasi1 LIKE '$nama_barang'";
                            $query_cuy = $db_object->db_query($kuking);
                            // $kombo = $db_object->db_num_rows($query_cuy);
                            while ($baris = $db_object->db_fetch_array($query_cuy)) { 
                                if (!empty($baris['kombinasi1'])) {
                                    # code...
                                    echo $baris['kombinasi1'].'<br/>'.$baris['konfiden'].'%';
                                    }
                                 }
                            echo "</td>";
                            echo '<td><a class = "btn btn-danger btn-block" href="index.php?menu=produk&delete='.$row['id_produk'].'">Hapus</a>';
                            echo '<a class = "btn btn-warning btn-block" href="index.php?menu=editproduk&id='.$row['id_produk'].'">Edit</a></td>';
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </table>
<!--                </div>-->
                <?php
            }
            ?>
        </div>
<!--    </div>-->
<!--</div>-->


<?php
function get_produk_to_in($produk)
{
    $ex = explode(",", $produk);
    //$temp = "";
    for ($i = 0; $i < count($ex); $i++) {

        $jml_key = array_keys($ex, $ex[$i]);
        if (count($jml_key) > 1) {
            unset($ex[$i]);
        }

        //$temp = $ex[$i];
    }
    return implode(",", $ex);
}

?>

