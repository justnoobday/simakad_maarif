<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA JADWAL PELAJARAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

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
            <td width='200'>Id Kelas <?php echo form_error('id_kelas') ?></td>
            <td>
                <select name="id_kelas" id="id_kelas"  class="form-control">
                    <?php
                    if (empty($id_kelas)){
                        echo "<option value=''>-- Pilih --</option>";
                    }
                    else{
                        echo "<option value='".$id_kelas."'>".$id_kelas."</option>";
                    }
                    foreach ($data_kelas as $k){
                        echo "<option value='".$k->id_kelas."'>".$k->nama_kelas."</option>";
                    }
                    ?>
                </select>
            </td>        </tr>
	    <tr>
            <td width='200'>Hari <?php echo form_error('hari') ?></td>
            <td>
                <select name="hari" id="hari" class="form-control">
                    <?php
                    if (empty($hari)){
                        echo "<option value=''>-- Pilih --</option>";
                    }
                    else{
                        echo "<option value='".$hari."'>".$hari."</option>";
                    }
                    ?>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
            </td>
        </tr>
	    <tr><td width='200'>Jam Mulai <?php echo form_error('jam_mulai') ?></td><td><input type="time" class="form-control" name="jam_mulai" id="jam_mulai" placeholder="Jam Mulai" value="<?php echo $jam_mulai; ?>" /></td></tr>
	    <tr><td width='200'>Jam Selesai <?php echo form_error('jam_selesai') ?></td><td><input type="time" class="form-control" name="jam_selesai" id="jam_selesai" placeholder="Jam Selesai" value="<?php echo $jam_selesai; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('datajadwal') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>