<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA T_MATPEL</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Matpel <?php echo form_error('nama_matpel') ?></td><td><input type="text" class="form-control" name="nama_matpel" id="nama_matpel" placeholder="Nama Matpel" value="<?php echo $nama_matpel; ?>" /></td></tr>
	    <tr><td width='200'>Id Guru <?php echo form_error('id_guru') ?></td><td><input type="text" class="form-control" name="id_guru" id="id_guru" placeholder="Id Guru" value="<?php echo $id_guru; ?>" /></td></tr>
	    <tr><td width='200'>Semester <?php echo form_error('semester') ?></td><td><input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" value="<?php echo $semester; ?>" /></td></tr>
	    <tr><td width='200'>Tahun Ajaran Mulai <?php echo form_error('tahun_ajaran_mulai') ?></td><td><input type="text" class="form-control" name="tahun_ajaran_mulai" id="tahun_ajaran_mulai" placeholder="Tahun Ajaran Mulai" value="<?php echo $tahun_ajaran_mulai; ?>" /></td></tr>
	    <tr><td width='200'>Tahun Ajaran Selesai <?php echo form_error('tahun_ajaran_selesai') ?></td><td><input type="text" class="form-control" name="tahun_ajaran_selesai" id="tahun_ajaran_selesai" placeholder="Tahun Ajaran Selesai" value="<?php echo $tahun_ajaran_selesai; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_matpel" value="<?php echo $id_matpel; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('datamatapelajaran') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>