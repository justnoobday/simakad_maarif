<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">LIST DATA PENDAFTAR</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
            <?php $this->view('alert/warning'); ?>
            <?php $this->view('alert/success'); ?>
        <?php echo anchor(site_url('ppdb/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('ppdb/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('ppdb/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
                    <div class="table-responsive">
        <table class="table table-bordered" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
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
		    <th>Action</th>
                </tr>
            </thead>
        </table>
                    </div>
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
                    ajax: {"url": "ppdb/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_pendaftaran",
                            "orderable": false
                        },{"data": "nama_lengkap"},{"data": "tempat_lahir"},{"data": "tanggal_lahir"},{"data": "nisn"},{"data": "asal_sekolah"},{"data": "alamat"},{"data": "no_telp_siswa"},{"data": "nama_wali"},{"data": "no_telp_wali"},{"data": "file_ijazah"},{"data": "file_skhun"},{"data": "file_foto"},{"data": "status_penerimaan"},
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
