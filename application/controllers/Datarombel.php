<?php


class Datarombel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rombel_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rombel/rombel_view');
    }
    //json tabel siswa by kelas
    public function json($id) {
         {
            header('Content-Type: application/json');
            echo $this->Rombel_model->json($id);
         }
    }

    //json tampil siswa yang belum masuk ke kelas
    public function json_siswa_belum_masuk()
        {
            header('Content-Type: application/json');
            echo $this->Rombel_model->json_siswa_belum_masuk();
        }

    //tambah siswa pada kelas
    function pindah_kelas($id_siswa)
    {
        $row = $this->Rombel_model->get_by_id($id_siswa);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('datarombel/pindah_action'),
                'id_siswa' => set_value('id_siswa', $row->id_siswa),
                'id_pendaftaran' => set_value('id_pendaftaran', $row->id_pendaftaran),
                'nis' => set_value('nis', $row->nis),
                'nisn' => set_value('nisn', $row->nisn),
                'nama_siswa' => set_value('nama_siswa', $row->nama_siswa),
                'id_kelas' => set_value('id_kelas', $row->id_kelas),
                'status_aktif' => set_value('status_aktif', $row->status_aktif),
            );
            $this->template->load('template', 'datasiswa/t_siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Siswa Sudah Ada Dalam kelas');
            redirect(site_url('datarombel'));
        }

    }

    public function pindah_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->pindah_kelas($this->input->post('id_siswa', TRUE));
        } else {
            $data = array(
                'id_pendaftaran' => $this->input->post('id_pendaftaran',TRUE),
                'nis' => $this->input->post('nis',TRUE),
                'nisn' => $this->input->post('nisn',TRUE),
                'nama_siswa' => $this->input->post('nama_siswa',TRUE),
                'id_kelas' => $this->input->post('id_kelas',TRUE),
                'status_aktif' => $this->input->post('status_aktif',TRUE),
            );

            $this->Rombel_model->update($this->input->post('id_siswa', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('Datarombel'));
        }
    }

    public function _rules()
    {
        //$this->form_validation->set_rules('id_pendaftaran', 'id pendaftaran', 'trim|required');
        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('nisn', 'nisn', 'trim|required');
        $this->form_validation->set_rules('nama_siswa', 'nama siswa', 'trim|required');
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('status_aktif', 'status aktif', 'trim|required');

        $this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}