<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA ROMBEL</h3>
                    </div>
<!--get id kelas selected-->
                    <?php
                    if ($_POST==array())
                    {
                        $id_kelas = 1;
                    }
                    else
                    {
                        $id_kelas = $_POST['kelas'];
                    }
                    ?>
                    <div class="box-body">
                        <form action="" method="post">
                        <label>Pilih Kelas :</label>
                        <div style="padding-bottom: 20px;"'>
                        <?php echo cmb_dinamis('kelas','t_kelas','nama_kelas','id_kelas',$id_kelas)?>
                            <input name="btnpilihkelas" class="btn btn-default" type="submit" value="Pilih kelas">
                        </form>
                        <br>
                        <?php $this->view('alert/warning'); ?>
                        <?php $this->view('alert/success'); ?>

                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Id Pendaftaran</th>
                            <th>NIS</th>
                            <th>Id Kelas</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Alamat</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Status Aktif</th>
                            <th width="200px">Action</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "Datarombel/json/<?php echo $id_kelas?>", "type": "POST"},
            columns: [
                {
                    "data": "id_siswa",
                    "orderable": false
                },{"data": "id_pendaftaran"},{"data": "nis"},{"data": "id_kelas"},{"data": "nisn"},{"data": "nama_siswa"},{"data": "alamat"},{"data": "tempat_lahir"},{"data": "tanggal_lahir"},{"data": "status_aktif"},
                {
                    "data" : "action",
                    "orderable": false,
                    "className" : "text-center"
                }
            ],
            order: [[0, 'desc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>
