<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA T_GURU</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nipy <?php echo form_error('nipy') ?></td><td><input type="text" class="form-control" name="nipy" id="nipy" placeholder="Nipy" value="<?php echo $nipy; ?>" /></td></tr>
	    <tr><td width='200'>Nik <?php echo form_error('nik') ?></td><td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" /></td></tr>
	    <tr><td width='200'>Nama Guru <?php echo form_error('nama_guru') ?></td><td><input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Nama Guru" value="<?php echo $nama_guru; ?>" /></td></tr>
	    <tr><td width='200'>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td><td>
                <?php echo form_dropdown('jenis_kelamin',array('L'=>'L','P'=>'P'),$jenis_kelamin,'class="form-control"')?></td></tr>
	    <tr><td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td><td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td></tr>
	    <tr><td width='200'>Induk <?php echo form_error('induk') ?></td><td>
                <?php echo form_dropdown('induk',array('Ya'=>'Ya','Tidak'=>'Tidak'),$induk,'class="form-control"')?></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('dataguru') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>