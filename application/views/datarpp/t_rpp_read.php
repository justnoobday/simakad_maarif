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
        <h2 style="margin-top:0px">rpp Read</h2>
        <table class="table">
	    <tr><td>Judul Rpp</td><td><?php echo $judul_rpp; ?></td></tr>
	    <tr><td>Id Guru</td><td><?php echo $id_guru; ?></td></tr>
	    <tr><td>Id Matpel</td><td><?php echo $id_matpel; ?></td></tr>
	    <tr><td>Status Persetujuan</td><td><?php echo $status_persetujuan; ?></td></tr>
	    <tr><td>Catatan Revisi</td><td><?php echo $catatan_revisi; ?></td></tr>
	    <tr><td>Tanggal Upload</td><td><?php echo $tanggal_upload; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('datarpp') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>