<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">ASSIGN KELAS</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

                <table class='table table-bordered>'

                <tr><td width='200'>Id Pendaftaran <?php echo form_error('id_pendaftaran') ?></td><td><input type="text" class="form-control" name="id_pendaftaran" id="id_pendaftaran" placeholder="Id Pendaftaran" value="<?php echo $id_pendaftaran; ?>" readonly/></td></tr>
                <tr><td width='200'>Nis <?php echo form_error('nis') ?></td><td><input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" readonly /></td></tr>
                <tr><td width='200'>Nisn <?php echo form_error('nisn') ?></td><td><input type="text" class="form-control" name="nisn" id="nisn" placeholder="Nisn" value="<?php echo $nisn; ?>"  readonly/></td></tr>
                <tr><td width='200'>Nama Siswa <?php echo form_error('nama_siswa') ?></td><td><input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $nama_siswa; ?>" readonly /></td></tr>
                <tr><td width='200'>Id Kelas <?php echo form_error('id_kelas') ?></td><td>
                        <?php echo cmb_dinamis('id_kelas','t_kelas','nama_kelas','id_kelas',$id_kelas)?>
                        <input type="text" class="form-control" name="id_kelas" id="id_kelas" placeholder="Id Kelas" value="<?php echo $id_kelas; ?>" /></td></tr>
                <tr><td width='200'>Status Aktif <?php echo form_error('status_aktif') ?></td><td><?php echo form_dropdown('status_aktif',array('Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif','Drop_Out'=>'Drop Out'),$status_aktif,array('class'=>'form-control'));?></td></tr>
                <tr><td></td><td><input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>" />
                        <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                        <a href="<?php echo site_url('datasiswa') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
                </table></form>        </div>
</div>
</div>