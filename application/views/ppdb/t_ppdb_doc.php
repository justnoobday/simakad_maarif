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
        <h2>T_ppdb List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Lengkap</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Nisn</th>
		<th>Asal Sekolah</th>
		<th>Alamat</th>
		<th>No Telp Siswa</th>
		<th>Nama Wali</th>
		<th>No Telp Wali</th>
		<th>File Ijazah</th>
		<th>File Skhun</th>
		<th>File Foto</th>
		<th>Status Penerimaan</th>
		
            </tr><?php
            foreach ($ppdb_data as $ppdb)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ppdb->nama_lengkap ?></td>
		      <td><?php echo $ppdb->tempat_lahir ?></td>
		      <td><?php echo $ppdb->tanggal_lahir ?></td>
		      <td><?php echo $ppdb->nisn ?></td>
		      <td><?php echo $ppdb->asal_sekolah ?></td>
		      <td><?php echo $ppdb->alamat ?></td>
		      <td><?php echo $ppdb->no_telp_siswa ?></td>
		      <td><?php echo $ppdb->nama_wali ?></td>
		      <td><?php echo $ppdb->no_telp_wali ?></td>
		      <td><?php echo $ppdb->file_ijazah ?></td>
		      <td><?php echo $ppdb->file_skhun ?></td>
		      <td><?php echo $ppdb->file_foto ?></td>
		      <td><?php echo $ppdb->status_penerimaan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>