<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T_ppdb Read</h2>
        <table class="table">
	    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Nisn</td><td><?php echo $nisn; ?></td></tr>
	    <tr><td>Asal Sekolah</td><td><?php echo $asal_sekolah; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No Telp Siswa</td><td><?php echo $no_telp_siswa; ?></td></tr>
	    <tr><td>Nama Wali</td><td><?php echo $nama_wali; ?></td></tr>
	    <tr><td>No Telp Wali</td><td><?php echo $no_telp_wali; ?></td></tr>
	    <tr><td>File Ijazah</td><td><?php echo $file_ijazah; ?></td></tr>
	    <tr><td>File Skhun</td><td><?php echo $file_skhun; ?></td></tr>
	    <tr><td>File Foto</td><td><?php echo $file_foto; ?></td></tr>
	    <tr><td>Status Penerimaan</td><td><?php echo $status_penerimaan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ppdb') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>