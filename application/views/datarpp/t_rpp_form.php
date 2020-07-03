<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA RPP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Judul Rpp <?php echo form_error('judul_rpp') ?></td><td><input type="text" class="form-control" name="judul_rpp" id="judul_rpp" placeholder="Judul Rpp" value="<?php echo $judul_rpp; ?>" /></td></tr>
	    <tr>
            <td width='200'>Id Guru <?php echo form_error('id_guru') ?></td>
            <td>
                <select name="id_guru" id="id_guru"  class="form-control">
                    <?php
                    if (empty($id_guru)){
                        echo "<option value=''>-- Pilih --</option>";
                    }
                    else{
                        echo "<option value='".$id_guru."'>".$id_guru."</option>";
                    }
                    foreach ($data_guru as $g){
                        echo "<option value='".$g->id_guru."'>".$g->nama_guru."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
	    <tr>
            <td width='200'>Id Matpel <?php echo form_error('id_matpel') ?></td>
            <td>
                <select name="id_matpel" id="id_matpel"  class="form-control">
                    <?php
                    if (empty($id_matpel)){
                        echo "<option value=''>-- Pilih --</option>";
                    }
                    else{
                        echo "<option value='".$id_matpel."'>".$id_matpel."</option>";
                    }
                    foreach ($data_matpel as $m){
                        echo "<option value='".$m->id_matpel."'>".$m->nama_matpel."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
	    <tr>
            <td width='200'>Status Persetujuan <?php echo form_error('status_persetujuan') ?></td>
            <td>
                <input type="radio" name="status_persetujuan" id="status_persetujuan_D" value="Disetujui" <?php if ($status_persetujuan=="Disetujui") echo "checked"; ?>/><label for="Disetujui"> Disetujui</label><br>
                <input type="radio" name="status_persetujuan" id="status_persetujuan_R" value="Revisi" <?php if ($status_persetujuan=="Revisi") echo "checked"; ?>/><label for="Revisi"> Revisi</label><br>
            </td>
        </tr>
	    
        <tr><td width='200'>Catatan Revisi <?php echo form_error('catatan_revisi') ?></td><td> <textarea class="form-control" rows="3" name="catatan_revisi" id="catatan_revisi" placeholder="Catatan Revisi"><?php echo $catatan_revisi; ?></textarea></td></tr>
	    <tr><td width='200'>Tanggal Upload <?php echo form_error('tanggal_upload') ?></td><td><input type="datetime-local" class="form-control" name="tanggal_upload" id="tanggal_upload" placeholder="Tanggal Upload" value="<?php echo $tanggal_upload; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_rpp" value="<?php echo $id_rpp; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('datarpp') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>