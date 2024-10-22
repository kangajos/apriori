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

if (isset($_POST['submit'])) {
    // if(!$input_error){
    $data = new Spreadsheet_Excel_Reader($_FILES['file_data_transaksi']['tmp_name']);

    $baris = $data->rowcount($sheet_index = 0);
    $column = $data->colcount($sheet_index = 0);
    //import data excel dari baris kedua, karena baris pertama adalah nama kolom
    // $temp_date = $temp_produk = "";
    for ($i = 2; $i <= $baris; $i++) {
        for ($c = 1; $c <= $column; $c++) {
            $value[$c] = $data->val($i, $c);
        }

        // if($i==2){
        //     $temp_produk .= $value[3];
        // }
        // else{
        //     if($temp_date == $value[1]){
        //         $temp_produk .= ",".$value[3];
        //     }
        //     else{
        $table = "transaksi";
        // $produkIn = get_produk_to_in($temp_produk);
        $temp_date = format_date($value[1]);
        // echo $temp_date;die();
        $produkIn = $value[2];

        //mencegah ada jarak spasi
        $produkIn = str_replace(" ,", ",", $produkIn);
        $produkIn = str_replace("  ,", ",", $produkIn);
        $produkIn = str_replace("   ,", ",", $produkIn);
        $produkIn = str_replace("    ,", ",", $produkIn);
        $produkIn = str_replace(", ", ",", $produkIn);
        $produkIn = str_replace(",  ", ",", $produkIn);
        $produkIn = str_replace(",   ", ",", $produkIn);
        $produkIn = str_replace(",    ", ",", $produkIn);
        //$item1 = explode(",", $produkIn);


//                    $field_value = array("transaction_date"=>($temp_date),
//                        "produk"=>$produkIn);
//                    $query = $db_object->insert_record($table, $field_value);
//                    INSERT INTO transaksi (transaction_date, produk)
//                    VALUES
//                    ('2016-06-01', 'nipple pigeon L'),
//                    ('2016-06-01', 'nipple ninio'),
//                    ('2016-06-01', 'mamamia L36'),
//                    ('2016-06-01', 'sweety FP XL34')
        $sql = "INSERT INTO transaksi (transaction_date, produk) VALUES ";
        $value_in = array();
        //foreach ($item1 as $key => $isi) {
        //  $value_in[] = "('$temp_date' , '$isi' )";
        //}
        //$value_to_sql_in = implode(",", $value_in);
        //$sql .= $value_to_sql_in;
        $sql .= " ('$temp_date', '$produkIn')";
        $db_object->db_query($sql);

        //         $temp_produk = $value[3];
        //     }
        // }

        // $temp_date = $value[1];
    }
    ?>
    <script> location.replace("?menu=data_transaksi&pesan_success=Data berhasil disimpan"); </script>
    <?php
}

if (isset($_POST['delete'])) {
    $sql = "TRUNCATE transaksi";
    $db_object->db_query($sql);
    ?>
    <script> location.replace("?menu=data_transaksi&pesan_success=Data transaksi berhasil dihapus"); </script>
    <?php
}
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $db_object->db_query("DELETE FROM transaksi WHERE id='$id'");
    ?>
    <script> location.replace("?menu=data_transaksi&pesan_success=Data berhasil disimpan"); </script>
<?php }

if (isset($_GET['tambah_transaksi'])) {
    $tanggal = $_POST['tanggal'];
    $nama_produk = $_POST['nama_produk'];
    $produk_isi = null;
    foreach ($nama_produk as $key => $value) {
        $produk_isi .= $value . ',';
    }
    $db_object->db_query("INSERT INTO transaksi SET transaction_date='$tanggal' , produk='$produk_isi'");
    // echo $tanggal.'<br>'.$produk_isi;die();
    ?>
    <script> location.replace("?menu=data_transaksi&pesan_success=Data berhasil disimpan"); </script>
<?php }
?>
<!---->
<!--<div class="super_sub_content">-->
<!--    <div class="container">-->
        <div class="row">
            <!--UPLOAD EXCEL FORM-->
            <div class="col-md-8">
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <!--                                <label>Import data from excel</label>-->
                                <input name="file_data_transaksi" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-grup"><input name="submit" type="submit" value="Upload Data" class="btn btn-success"></div>

                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <button name="delete" type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i> Hapus Semua Transaksi
                                </button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Tambah Transaksi
                </button>
            </div>
            <!--            <div class="col-3"></div>-->
            <!--            <div class="col-3"></div>-->


            <!--            <br>-->


            <!-- modal input -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Tambah Transaksi</h4>
                        </div>
                        <form method="post" enctype="multipart/form-data"
                              action="index.php?menu=data_transaksi&tambah_transaksi=yes">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Tanggal</label>
                                        <input name="tanggal" type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Nama Barang</label><br/>
                                        <?php
                                        $barang = "SELECT * FROM produk";
                                        $barang_result = $db_object->db_query($barang);
                                        while ($baris = $db_object->db_fetch_array($barang_result)) {
                                            ?>

                                            <div class="col-md-4">
                                                <input name="nama_produk[]" value="<?= $baris['nama_produk'] ?>"
                                                       type="checkbox"> <?= $baris['nama_produk'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" value="add_transaksi" class="btn btn-primary">Save changes
                                </button>
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

            $sql = "SELECT * FROM transaksi";
            $query = $db_object->db_query($sql);
            $jumlah = $db_object->db_num_rows($query);
            // echo "<BR><p>Jumlah data: " . $jumlah . "</p><br>";
            if ($jumlah == 0) {
                echo "Data kosong...";
            } else {
                ?>
<!--                <div class="table-responsive">-->
                    <table class='table table-bordered table-striped  table-hover'>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Produk</th>
                            <th></th>
                        </tr>
                        <?php

                        $no = 1;
                        $return = "return confirm(\"Anda yakin ?\")";
                        while ($row = $db_object->db_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row['transaction_date'] . "</td>";
                            echo "<td>" . $row['produk'] . "</td>";
                            echo "<td> <a onclick='return confirm(\"sure to delete !\");' class='btn btn-block btn-danger' href='index.php?menu=data_transaksi&delete=".$row['id']."'>Hapus</a></td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </table>
                    <!-- <a href="" onclick="">ok</a> -->
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

