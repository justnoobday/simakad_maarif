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
        <h2>List Siswa</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Pendaftaran</th>
		<th>Nis</th>
		<th>Nisn</th>
		<th>Nama Siswa</th>
		<th>Id Kelas</th>
		<th>Status Aktif</th>
		
            </tr><?php
            foreach ($datasiswa_data as $datasiswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $datasiswa->id_pendaftaran ?></td>
		      <td><?php echo $datasiswa->nis ?></td>
		      <td><?php echo $datasiswa->nisn ?></td>
		      <td><?php echo $datasiswa->nama_siswa ?></td>
		      <td><?php echo $datasiswa->id_kelas ?></td>
		      <td><?php echo $datasiswa->status_aktif ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>