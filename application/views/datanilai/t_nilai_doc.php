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
        <h2>nilai List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Siswa</th>
		<th>Id Matpel</th>
		<th>Nilai Absensi</th>
		<th>Nilai Tugas</th>
		<th>Nilai Kuis</th>
		<th>Nilai Uts</th>
		<th>Nilai Uas</th>
		<th>Niali Akhir</th>
		
            </tr><?php
            foreach ($datanilai_data as $datanilai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $datanilai->id_siswa ?></td>
		      <td><?php echo $datanilai->id_matpel ?></td>
		      <td><?php echo $datanilai->nilai_absensi ?></td>
		      <td><?php echo $datanilai->nilai_tugas ?></td>
		      <td><?php echo $datanilai->nilai_kuis ?></td>
		      <td><?php echo $datanilai->nilai_uts ?></td>
		      <td><?php echo $datanilai->nilai_uas ?></td>
		      <td><?php echo $datanilai->niali_akhir ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>