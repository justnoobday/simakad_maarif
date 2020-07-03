<?php


class Rombel_model extends CI_Model
{

    public $table = 't_siswa';
    public $id = 'id_siswa';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables list siswa berdasarkan kelas
    function json($id_kelas) {
        $this->datatables->select('id_siswa,t_siswa.id_pendaftaran,nis,t_siswa.id_kelas,t_siswa.nisn,t_siswa.nama_siswa,t_ppdb.alamat,t_ppdb.tempat_lahir,t_ppdb.tanggal_lahir,t_siswa.status_aktif');
        $this->datatables->from('t_siswa');
        //add this line for join
        $this->datatables->join('t_ppdb', 't_siswa.id_pendaftaran = t_ppdb.id_pendaftaran');
        $this->datatables->join('t_kelas', 't_siswa.id_kelas = t_kelas.id_kelas');
        $this->datatables->where('t_siswa.id_kelas',$id_kelas);
        $this->datatables->add_column('action', anchor(site_url('datarombel/pindah_kelas/$1'),'<i class="fa fa-eye" aria-hidden="true"> Assign Kelas</i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ? \')"'),'id_siswa');
        return $this->datatables->generate();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

}