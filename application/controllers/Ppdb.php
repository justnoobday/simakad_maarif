<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ppdb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ppdb_model');
        $this->load->model('Datasiswa_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','ppdb/t_ppdb_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Ppdb_model->json();
    }

    public function terima($id)
    {
        $row = $this->Ppdb_model->get_by_id($id);
        if ($row->status_penerimaan=="Ditolak") {
            $datasiswa = array(
		'id_pendaftaran' => $row->id_pendaftaran,
		'nis' => "",
		'nisn' => $row->nisn,
		'nama_siswa' => $row->nama_lengkap,
		'id_kelas' => "1",
		'status_aktif' => "Aktif",
	    );
            $this->Datasiswa_model->insert($datasiswa);
            //ubah status penerimaan jadi diterima
            $datadaftar = array(
                'nama_lengkap' => $row->nama_lengkap,
                'tempat_lahir' => $row->tempat_lahir,
                'tanggal_lahir' => $row->tanggal_lahir,
                'nisn' => $row->nisn,
                'asal_sekolah' => $row->asal_sekolah,
                'alamat' => $row->alamat,
                'no_telp_siswa' => $row->no_telp_siswa,
                'nama_wali' => $row->nama_wali,
                'no_telp_wali' => $row->no_telp_wali,
                'file_ijazah' => $row->file_ijazah,
                'file_skhun' => $row->file_skhun,
                'file_foto' => $row->file_foto,
                'status_penerimaan' => "Diterima",
            );
            $this->Ppdb_model->update($id,$datadaftar);
            $this->session->set_flashdata('success', 'Status Siswa Berhasil Di Update!');
            redirect(site_url('ppdb'));
        } else {
            $this->session->set_flashdata('message', 'Siswa Sudah Diterima');
            redirect(site_url('ppdb'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ppdb/create_action'),
	    'id_pendaftaran' => set_value('id_pendaftaran'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'nisn' => set_value('nisn'),
	    'asal_sekolah' => set_value('asal_sekolah'),
	    'alamat' => set_value('alamat'),
	    'no_telp_siswa' => set_value('no_telp_siswa'),
	    'nama_wali' => set_value('nama_wali'),
	    'no_telp_wali' => set_value('no_telp_wali'),
	    'file_ijazah' => set_value('file_ijazah'),
	    'file_skhun' => set_value('file_skhun'),
	    'file_foto' => set_value('file_foto'),
	    'status_penerimaan' => set_value('status_penerimaan'),
	);
        $this->template->load('template','ppdb/t_ppdb_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'nisn' => $this->input->post('nisn',TRUE),
		'asal_sekolah' => $this->input->post('asal_sekolah',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telp_siswa' => $this->input->post('no_telp_siswa',TRUE),
		'nama_wali' => $this->input->post('nama_wali',TRUE),
		'no_telp_wali' => $this->input->post('no_telp_wali',TRUE),
		'file_ijazah' => $this->input->post('file_ijazah',TRUE),
		'file_skhun' => $this->input->post('file_skhun',TRUE),
		'file_foto' => $this->input->post('file_foto',TRUE),
		'status_penerimaan' => $this->input->post('status_penerimaan',TRUE),
	    );

            $this->Ppdb_model->insert($data);
            $this->session->set_flashdata('success', 'Calon Siswa Berhasil Di Tambahkan!');
            redirect(site_url('ppdb'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ppdb_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ppdb/update_action'),
		'id_pendaftaran' => set_value('id_pendaftaran', $row->id_pendaftaran),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'nisn' => set_value('nisn', $row->nisn),
		'asal_sekolah' => set_value('asal_sekolah', $row->asal_sekolah),
		'alamat' => set_value('alamat', $row->alamat),
		'no_telp_siswa' => set_value('no_telp_siswa', $row->no_telp_siswa),
		'nama_wali' => set_value('nama_wali', $row->nama_wali),
		'no_telp_wali' => set_value('no_telp_wali', $row->no_telp_wali),
		'file_ijazah' => set_value('file_ijazah', $row->file_ijazah),
		'file_skhun' => set_value('file_skhun', $row->file_skhun),
		'file_foto' => set_value('file_foto', $row->file_foto),
		'status_penerimaan' => set_value('status_penerimaan', $row->status_penerimaan),
	    );
            $this->template->load('template','ppdb/t_ppdb_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppdb'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pendaftaran', TRUE));
        } else {
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'nisn' => $this->input->post('nisn',TRUE),
		'asal_sekolah' => $this->input->post('asal_sekolah',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telp_siswa' => $this->input->post('no_telp_siswa',TRUE),
		'nama_wali' => $this->input->post('nama_wali',TRUE),
		'no_telp_wali' => $this->input->post('no_telp_wali',TRUE),
		'file_ijazah' => $this->input->post('file_ijazah',TRUE),
		'file_skhun' => $this->input->post('file_skhun',TRUE),
		'file_foto' => $this->input->post('file_foto',TRUE),
		'status_penerimaan' => $this->input->post('status_penerimaan',TRUE),
	    );

            $this->Ppdb_model->update($this->input->post('id_pendaftaran', TRUE), $data);
            $this->session->set_flashdata('success', 'Data Calon Siswa Berhasil Di Update!');
            redirect(site_url('ppdb'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ppdb_model->get_by_id($id);

        if ($row) {
            $this->Ppdb_model->delete($id);
            $this->session->set_flashdata('success', 'Data Calon Siswa Berhasil Di Hapus!');
            redirect(site_url('ppdb'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppdb'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('nisn', 'nisn', 'trim|required');
	$this->form_validation->set_rules('asal_sekolah', 'asal sekolah', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_telp_siswa', 'no telp siswa', 'trim|required');
	$this->form_validation->set_rules('nama_wali', 'nama wali', 'trim|required');
	$this->form_validation->set_rules('no_telp_wali', 'no telp wali', 'trim|required');
	$this->form_validation->set_rules('file_ijazah', 'file ijazah', 'trim|required');
	$this->form_validation->set_rules('file_skhun', 'file skhun', 'trim|required');
	$this->form_validation->set_rules('file_foto', 'file foto', 'trim|required');
	$this->form_validation->set_rules('status_penerimaan', 'status penerimaan', 'trim|required');

	$this->form_validation->set_rules('id_pendaftaran', 'id_pendaftaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_ppdb.xls";
        $judul = "t_ppdb";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Nisn");
	xlsWriteLabel($tablehead, $kolomhead++, "Asal Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Wali");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp Wali");
	xlsWriteLabel($tablehead, $kolomhead++, "File Ijazah");
	xlsWriteLabel($tablehead, $kolomhead++, "File Skhun");
	xlsWriteLabel($tablehead, $kolomhead++, "File Foto");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Penerimaan");

	foreach ($this->Ppdb_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nisn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telp_siswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telp_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file_ijazah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file_skhun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file_foto);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_penerimaan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_ppdb.doc");

        $data = array(
            't_ppdb_data' => $this->Ppdb_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('ppdb/t_ppdb_doc',$data);
    }

}

/* End of file Ppdb.php */
/* Location: ./application/controllers/Ppdb.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-21 22:37:19 */
/* http://harviacode.com */