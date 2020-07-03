<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA NILAI</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr>
            <td width='200'>Id Siswa <?php echo form_error('id_siswa') ?></td>
            <td>
                <select name="id_siswa" id="id_siswa"  class="form-control">
                    <?php
                    if (empty($id_siswa)){
                        echo "<option value=''>-- Pilih --</option>";
                    }
                    else{
                        echo "<option value='".$id_siswa."'>".$id_siswa."</option>";
                    }
                    foreach ($data_siswa as $s){
                        echo "<option value='".$s->id_siswa."'>".$s->nama_siswa."</option>";
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
	    <tr><td width='200'>Nilai Absensi <?php echo form_error('nilai_absensi') ?></td><td><input type="number" class="form-control" name="nilai_absensi" id="nilai_absensi" placeholder="Nilai Absensi" value="<?php echo $nilai_absensi; ?>" /></td></tr>
	    <tr><td width='200'>Nilai Tugas <?php echo form_error('nilai_tugas') ?></td><td><input type="number" class="form-control" name="nilai_tugas" id="nilai_tugas" placeholder="Nilai Tugas" value="<?php echo $nilai_tugas; ?>" /></td></tr>
	    <tr><td width='200'>Nilai Kuis <?php echo form_error('nilai_kuis') ?></td><td><input type="number" class="form-control" name="nilai_kuis" id="nilai_kuis" placeholder="Nilai Kuis" value="<?php echo $nilai_kuis; ?>" /></td></tr>
	    <tr><td width='200'>Nilai Uts <?php echo form_error('nilai_uts') ?></td><td><input type="number" class="form-control" name="nilai_uts" id="nilai_uts" placeholder="Nilai Uts" value="<?php echo $nilai_uts; ?>" /></td></tr>
	    <tr><td width='200'>Nilai Uas <?php echo form_error('nilai_uas') ?></td><td><input type="number" class="form-control" name="nilai_uas" id="nilai_uas" placeholder="Nilai Uas" value="<?php echo $nilai_uas; ?>" /></td></tr>
	    <tr><td width='200'>Niali Akhir <?php echo form_error('niali_akhir') ?></td><td><input type="number" class="form-control" name="niali_akhir" id="niali_akhir" placeholder="Niali Akhir" value="<?php echo $niali_akhir; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nilai" value="<?php echo $id_nilai; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('datanilai') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>