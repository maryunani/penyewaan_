<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3 class="alert alert-info"> Edit Data Peminjaman</h3>
        <?php
        require 'setting.php';
        //menampilan data dalam table
        if (isset($_GET['url-id'])) {
            $input_id = $_GET['url-id'];
            $query = "SELECT * FROM tbl_data WHERE id ='$input_id'";
            $result = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_object($result);
        }
        //simpan data yang telah dirubah dalam table
        if (isset($_POST['simpan'])) {
            $txtnama = $_POST['txtnama'];
            $txtjk = $_POST['txtjk'];
            $txtps = $_POST['txtps'];
            $txtjumlah = $_POST['txtjumlah'];
            $txtpinjam = $_POST['txtpinjam'];
            $txtkembali = $_POST['txtkembali'];
            //update syntax dalam mysql
            $sql = "UPDATE tbl_data SET 
                         nama='$txtnama',jenis_kelamin='$txtjk',tgl_penyewaan='$txtpinjam',tgl_kembalian='$txtkembali'
                         ,Jumlah_ps='$txtjumlah' ,nama_ps='$txtbuku' WHERE id = $input_id";
            $result = mysqli_query($koneksi, $sql);
            //perulangan jika dia berhasil maka ke index dan data diperbarui
            if ($result) {
                header('location:home.php');
                //jika salah data tidak berhasil diperbarui dan menghasilkan error
            } else {
                echo 'Query Error' . mysqli_error($koneksi);
            }
        }
        ?>

        <form action="#" method="Post">
            <div class="mb-3">
                <label for="">nama</label>
                <input type="text" name="txtnama" class="form-control" value="<?= $data->nama; ?>">
            </div>

            <div class="mb-3">
            <label>Jenis Kelamin</label>
                <input type="text" name="txtjk" class="form-control" value="<?= $data->jenis_kelamin; ?>">
            </div>

            <div class="mb-3">
                <label for="">Nama Ps</label>
                <input type="text" name="txtps" class="form-control" value="<?= $data->nama_ps; ?>">
            </div>
            <div class="mb-3">
                <label for="">Jumlah Ps Yang Di Sewa</label>
                <input type="text" name="txtjumlah" class="form-control" value="<?= $data->Jumlah_ps; ?>">
            </div>

            <div class="mb-3">
                <label for="">Tanggal Pinjam Ps</label>
                <input type="kalender" name="txtpinjam" class="form-control" value="<?= $data->tgl_penyewaan; ?>">
            </div>
            <div class="mb-3">
                <label for="">Tanggal Kembalian Ps</label>
                <input type="kalender" name="txtkembali" class="form-control" value="<?= $data->tgl_kembalian; ?>">
            </div>

            <input type="submit" name="simpan" value="Simpan Perubahan Data" class="btn btn-primary">
            <a href="home.php" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</body>

</html>