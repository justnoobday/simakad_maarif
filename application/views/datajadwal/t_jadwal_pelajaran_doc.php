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
        <h2>T_jadwal_pelajaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Matpel</th>
		<th>Id Kelas</th>
		<th>Hari</th>
		<th>Jam Mulai</th>
		<th>Jam Selesai</th>
		
            </tr><?php
            foreach ($datajadwal_data as $datajadwal)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $datajadwal->id_matpel ?></td>
		      <td><?php echo $datajadwal->id_kelas ?></td>
		      <td><?php echo $datajadwal->hari ?></td>
		      <td><?php echo $datajadwal->jam_mulai ?></td>
		      <td><?php echo $datajadwal->jam_selesai ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>