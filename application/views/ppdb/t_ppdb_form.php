<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PENDAFTAR</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Lengkap <?php echo form_error('nama_lengkap') ?></td><td><input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" /></td></tr>
	    <tr><td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td><td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td><td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td></tr>
	    <tr><td width='200'>Nisn <?php echo form_error('nisn') ?></td><td><input type="text" class="form-control" name="nisn" id="nisn" placeholder="Nisn" value="<?php echo $nisn; ?>" /></td></tr>
	    <tr><td width='200'>Asal Sekolah <?php echo form_error('asal_sekolah') ?></td><td><input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" value="<?php echo $asal_sekolah; ?>" /></td></tr>
	    
        <tr><td width='200'>Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td></tr>
	    <tr><td width='200'>No Telp Siswa <?php echo form_error('no_telp_siswa') ?></td><td><input type="text" class="form-control" name="no_telp_siswa" id="no_telp_siswa" placeholder="No Telp Siswa" value="<?php echo $no_telp_siswa; ?>" /></td></tr>
	    <tr><td width='200'>Nama Wali <?php echo form_error('nama_wali') ?></td><td><input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Nama Wali" value="<?php echo $nama_wali; ?>" /></td></tr>
	    <tr><td width='200'>No Telp Wali <?php echo form_error('no_telp_wali') ?></td><td><input type="text" class="form-control" name="no_telp_wali" id="no_telp_wali" placeholder="No Telp Wali" value="<?php echo $no_telp_wali; ?>" /></td></tr>
	    
        <tr><td width='200'>File Ijazah <?php echo form_error('file_ijazah') ?></td><td> <textarea class="form-control" rows="3" name="file_ijazah" id="file_ijazah" placeholder="File Ijazah"><?php echo $file_ijazah; ?></textarea></td></tr>
	    
        <tr><td width='200'>File Skhun <?php echo form_error('file_skhun') ?></td><td> <textarea class="form-control" rows="3" name="file_skhun" id="file_skhun" placeholder="File Skhun"><?php echo $file_skhun; ?></textarea></td></tr>
	    
        <tr><td width='200'>File Foto <?php echo form_error('file_foto') ?></td><td> <textarea class="form-control" rows="3" name="file_foto" id="file_foto" placeholder="File Foto"><?php echo $file_foto; ?></textarea></td></tr>
	    <tr><td width='200'>Status Penerimaan <?php echo form_error('status_penerimaan') ?></td><td><?php echo form_dropdown('status_penerimaan',array('Diterima'=>'Diterima','Ditolak'=>'Ditolak'),$status_penerimaan,array('class'=>'form-control'))?></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('ppdb') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>