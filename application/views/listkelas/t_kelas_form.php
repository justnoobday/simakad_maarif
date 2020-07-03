<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA KELAS</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Kelas <?php echo form_error('nama_kelas') ?></td><td><input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?php echo $nama_kelas; ?>" /></td></tr>
	    <tr><td width='200'>Tingkat <?php echo form_error('tingkat') ?></td><td><?php echo form_dropdown('tingkat',array('X'=>'X','XI'=>'XI','XII'=>'XII'),$tingkat,array('class'=>'form-control'))?>
            </td></tr>
	    <tr><td width='200'>Id Jurusan <?php echo form_error('id_jurusan') ?></td><td>
                <?php echo cmb_dinamis('id_jurusan','t_jurusan','nama_jurusan','id_jurusan',$id_jurusan);?>
<!--                <input type="text" class="form-control" name="id_jurusan" id="id_jurusan" placeholder="Id Jurusan" value="--><?php //echo $id_jurusan; ?><!--" /></td></tr>-->
	    <tr><td width='200'>Id Wali Kelas <?php echo form_error('id_wali_kelas') ?></td><td>
<?php //echo cmb_dinamis('id_guru','t_guru','nama_guru','id_guru',$id_wali_kelas);?>
                        <input type="text" class="form-control" name="id_wali_kelas" id="id_wali_kelas" placeholder="Id Wali Kelas" value="<?php echo $id_wali_kelas; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('listkelas') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>