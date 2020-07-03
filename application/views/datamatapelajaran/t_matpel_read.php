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
        <h2 style="margin-top:0px">T_matpel Read</h2>
        <table class="table">
	    <tr><td>Nama Matpel</td><td><?php echo $nama_matpel; ?></td></tr>
	    <tr><td>Id Guru</td><td><?php echo $id_guru; ?></td></tr>
	    <tr><td>Semester</td><td><?php echo $semester; ?></td></tr>
	    <tr><td>Tahun Ajaran Mulai</td><td><?php echo $tahun_ajaran_mulai; ?></td></tr>
	    <tr><td>Tahun Ajaran Selesai</td><td><?php echo $tahun_ajaran_selesai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('datamatapelajaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>