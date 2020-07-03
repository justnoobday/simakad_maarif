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
        <h2 style="margin-top:0px">T_guru Read</h2>
        <table class="table">
	    <tr><td>Nipy</td><td><?php echo $nipy; ?></td></tr>
	    <tr><td>Nik</td><td><?php echo $nik; ?></td></tr>
	    <tr><td>Nama Guru</td><td><?php echo $nama_guru; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Induk</td><td><?php echo $induk; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dataguru') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>