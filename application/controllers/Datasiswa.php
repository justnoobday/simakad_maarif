<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Datasiswa_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','datasiswa/t_siswa_list');
    } 
    //json list siswa
    public function json() {
        header('Content-Type: application/json');
        echo $this->Datasiswa_model->json();
    }
    public function jsonmutasi() {
        header("Content-Type: application/json");
        echo $this->Datasiswa_model->jsonmutasi();
    }

    public function read($id) 
    {
        $row = $this->Datasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_siswa' => $row->id_siswa,
		'id_pendaftaran' => $row->id_pendaftaran,
		'nis' => $row->nis,
		'nisn' => $row->nisn,
		'nama_siswa' => $row->nama_siswa,
		'id_kelas' => $row->id_kelas,
		'status_aktif' => $row->status_aktif,
	    );
            $this->template->load('template','datasiswa/t_siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('datasiswa/create_action'),
	    'id_siswa' => set_value('id_siswa'),
	    'id_pendaftaran' => set_value('id_pendaftaran'),
	    'nis' => set_value('nis'),
	    'nisn' => set_value('nisn'),
	    'nama_siswa' => set_value('nama_siswa'),
	    'id_kelas' => set_value('id_kelas'),
	    'status_aktif' => set_value('status_aktif'),
	);
        $this->template->load('template','datasiswa/t_siswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pendaftaran' => $this->input->post('id_pendaftaran',TRUE),
		'nis' => $this->input->post('nis',TRUE),
		'nisn' => $this->input->post('nisn',TRUE),
		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'status_aktif' => $this->input->post('status_aktif',TRUE),
	    );

            $this->Datasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('datasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Datasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('datasiswa/update_action'),
		'id_siswa' => set_value('id_siswa', $row->id_siswa),
		'id_pendaftaran' => set_value('id_pendaftaran', $row->id_pendaftaran),
		'nis' => set_value('nis', $row->nis),
		'nisn' => set_value('nisn', $row->nisn),
		'nama_siswa' => set_value('nama_siswa', $row->nama_siswa),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'status_aktif' => set_value('status_aktif', $row->status_aktif),
	    );
            $this->template->load('template','datasiswa/t_siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_siswa', TRUE));
        } else {
            $data = array(
		'id_pendaftaran' => $this->input->post('id_pendaftaran',TRUE),
		'nis' => $this->input->post('nis',TRUE),
		'nisn' => $this->input->post('nisn',TRUE),
		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'status_aktif' => $this->input->post('status_aktif',TRUE),
	    );

            $this->Datasiswa_model->update($this->input->post('id_siswa', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('datasiswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Datasiswa_model->get_by_id($id);

        if ($row) {
            $this->Datasiswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('datasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datasiswa'));
        }
    }

    function pindah($id)
    {
        $row = $this->Datasiswa_model->get_by_id($id);
        if ($row->status_aktif=="Aktif")
        {
            $datasiswa = array(
                'id_pendaftaran' => $row->id_pendaftaran,
                'nis' => "",
                'nisn' => $row->nisn,
                'nama_siswa' => $row->nama_siswa,
                'id_kelas' => $row->id_kelas,
                'status_aktif' => "Tidak Aktif",
            );
            $this->Datasiswa_model->update($id,$datasiswa);
            $this->session->set_flashdata('success', 'Status Siswa Berhasil Diperbaharui!');
            redirect(site_url('datasiswa/mutasi'));
        }
        else{
            $this->session->set_flashdata('message', 'Siswa Sudah Berstatus Tidak Aktif!');
            redirect(site_url('datasiswa/mutasi'));
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

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_siswa.xls";
        $judul = "t_siswa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pendaftaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Nis");
	xlsWriteLabel($tablehead, $kolomhead++, "Nisn");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
    xlsWriteLabel($tablehead, $kolomhead++, "Asal sekolah");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Orang Tua/Wali");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Aktif");

	foreach ($this->Datasiswa_model->get_all_join() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pendaftaran);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nisn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_siswa);
        xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
        xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
        xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
        xlsWriteLabel($tablebody, $kolombody++, $data->asal_sekolah);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_wali);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_aktif);
	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_siswa.doc");

        $data = array(
            'datasiswa_data' => $this->Datasiswa_model->get_all_join(),
            'start' => 0
        );
        
        $this->load->view('datasiswa/t_siswa_doc',$data);
    }

    function mutasi()
    {
        $this->template->load('template','datasiswa/t_siswa_mutasi');
    }

}

/* End of file Datasiswa.php */
/* Location: ./application/controllers/Datasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-21 22:22:34 */
/* http://harviacode.com */