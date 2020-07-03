<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>rpp List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul Rpp</th>
		<th>Id Guru</th>
		<th>Id Matpel</th>
		<th>Status Persetujuan</th>
		<th>Catatan Revisi</th>
		<th>Tanggal Upload</th>
		
            </tr><?php
            foreach ($datarpp_data as $datarpp)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $datarpp->judul_rpp ?></td>
		      <td><?php echo $datarpp->id_guru ?></td>
		      <td><?php echo $datarpp->id_matpel ?></td>
		      <td><?php echo $datarpp->status_persetujuan ?></td>
		      <td><?php echo $datarpp->catatan_revisi ?></td>
		      <td><?php echo $datarpp->tanggal_upload ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>