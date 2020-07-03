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
        <h2 style="margin-top:0px">T_siswa Read</h2>
        <table class="table">
	    <tr><td>Id Pendaftaran</td><td><?php echo $id_pendaftaran; ?></td></tr>
	    <tr><td>Nis</td><td><?php echo $nis; ?></td></tr>
	    <tr><td>Nisn</td><td><?php echo $nisn; ?></td></tr>
	    <tr><td>Nama Siswa</td><td><?php echo $nama_siswa; ?></td></tr>
	    <tr><td>Id Kelas</td><td><?php echo $id_kelas; ?></td></tr>
	    <tr><td>Status Aktif</td><td><?php echo $status_aktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('datasiswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>