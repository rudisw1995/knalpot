<?php
include './session.php';
include '../koneksi.php';
$nip = $_GET['nip'];
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/induk.css" />
        <script src="js/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="panelwrap">
            <div class="header">
                <?php include 'header.php'; ?> 
            </div>

            <div class="center_content">
                <div id="right_wrap">
                    <div id="right_content">
                        <h2>Edit Dosen</h2>
                        <?php
                        $kode_prodi = $_SESSION['kode_prodi'];
                        $a = mysql_query("select * from tbl_dosen where nip='$nip'");
                        $b = mysql_fetch_array($a);
                        ?>
                        <form action="simpan_edit_dosen.php" method="post"class="form">
                            <div class="form_row">
                                <label>NIP:</label>
                                <input type="text" class="form_input" name="nip" value="<?php echo $b['nip'] ?>"/>
                            </div>
                            <div class="form_row">
                                <label>NIDN:</label>
                                <input type="text" class="form_input" name="nidn" value="<?php echo $b['nidn'] ?>"/>
                            </div>
                            <div class="form_row">
                                <label>Nama:</label>
                                <input type="text" class="form_input" name="nama_dosen" value="<?php echo $b['nama_dosen'] ?>"/>
                            </div>
                            <div class="form_row">
                                <label>Kode Dosen:</label>
                                <input type="text" class="form_input" name="kd_dosen" value="<?php echo $b['kd_dosen'] ?>"/>
                            </div>
                            <div class="form_row">
                                <label>Password:</label>
                                <input type="text" class="form_input" name="pass" value="<?php echo $b['pass'] ?>"/>
                            </div>
                            <div class="form_row">
                                <label>Jenis Kelamin:</label>
                                <select class="form_select" name="jenkel">
                                    <option value="L" <?php
                                    $jenkel = $b['jenkel'];
                                    if ($jenkel == 'L') {
                                        echo 'selected';
                                    }
                                    ?>>Laki - Laki</option>
                                    <option value="P"<?php
                                    $jenkel = $b['jenkel'];
                                    if ($jenkel == 'P') {
                                        echo 'selected';
                                    }
                                    ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form_row">
                                <label>Status:</label>
                                <select class="form_select" name="status">
                                    <option value="aktif" <?php
                                    $status = $b['status'];
                                    if ($status == 'Aktif') {
                                        echo 'selected';
                                    }
                                    ?>>Aktif</option>
                                    <option value="tidak aktif"<?php
                                    $status = $b['status'];
                                    if ($status == 'tidak aktif') {
                                        echo 'selected';
                                    }
                                    ?>>Tidak Aktif</option>
                                </select>
                            </div>
                            <input type="hidden" name="kode_prodi" value="<?php echo $_SESSION['kode_prodi'] ?>"/>
                            <div class="form_row">
                                <input type="submit" class="form_submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div> 
                <div class="sidebar" id="sidebar">
                    <h2>Menu Kaprodi</h2>
                    <?php include 'menu.php' ?>                    
                </div>
                <div class="clear"></div>
            </div>
            <div class="footer">
                <?php include 'footer.php'; ?>
            </div>
        </div>
    </body>
</html>

