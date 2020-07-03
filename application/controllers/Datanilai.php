<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datanilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Nilai_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','datanilai/t_nilai_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Nilai_model->json();
    }

    public function read($id) 
    {
        $row = $this->Nilai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nilai' => $row->id_nilai,
		'id_siswa' => $row->id_siswa,
		'id_matpel' => $row->id_matpel,
		'nilai_absensi' => $row->nilai_absensi,
		'nilai_tugas' => $row->nilai_tugas,
		'nilai_kuis' => $row->nilai_kuis,
		'nilai_uts' => $row->nilai_uts,
		'nilai_uas' => $row->nilai_uas,
		'niali_akhir' => $row->niali_akhir,
	    );
            $this->template->load('template','datanilai/t_nilai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datanilai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('datanilai/create_action'),
	        'id_nilai' => set_value('id_nilai'),
	        'id_siswa' => set_value('id_siswa'),
	        'id_matpel' => set_value('id_matpel'),
	        'nilai_absensi' => set_value('nilai_absensi'),
	        'nilai_tugas' => set_value('nilai_tugas'),
	        'nilai_kuis' => set_value('nilai_kuis'),
	        'nilai_uts' => set_value('nilai_uts'),
	        'nilai_uas' => set_value('nilai_uas'),
	        'niali_akhir' => set_value('niali_akhir'),
            'data_siswa' => $this->Nilai_model->show_data_siswa(),
            'data_matpel' => $this->Nilai_model->show_data_matpel(),
	);
        $this->template->load('template','datanilai/t_nilai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_siswa' => $this->input->post('id_siswa',TRUE),
		'id_matpel' => $this->input->post('id_matpel',TRUE),
		'nilai_absensi' => $this->input->post('nilai_absensi',TRUE),
		'nilai_tugas' => $this->input->post('nilai_tugas',TRUE),
		'nilai_kuis' => $this->input->post('nilai_kuis',TRUE),
		'nilai_uts' => $this->input->post('nilai_uts',TRUE),
		'nilai_uas' => $this->input->post('nilai_uas',TRUE),
		'niali_akhir' => $this->input->post('niali_akhir',TRUE),
	    );

            $this->Nilai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('datanilai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nilai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('datanilai/update_action'),
		'id_nilai' => set_value('id_nilai', $row->id_nilai),
		'id_siswa' => set_value('id_siswa', $row->id_siswa),
		'id_matpel' => set_value('id_matpel', $row->id_matpel),
		'nilai_absensi' => set_value('nilai_absensi', $row->nilai_absensi),
		'nilai_tugas' => set_value('nilai_tugas', $row->nilai_tugas),
		'nilai_kuis' => set_value('nilai_kuis', $row->nilai_kuis),
		'nilai_uts' => set_value('nilai_uts', $row->nilai_uts),
		'nilai_uas' => set_value('nilai_uas', $row->nilai_uas),
		'niali_akhir' => set_value('niali_akhir', $row->niali_akhir),
	    );
            $this->template->load('template','datanilai/t_nilai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datanilai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nilai', TRUE));
        } else {
            $data = array(
		'id_siswa' => $this->input->post('id_siswa',TRUE),
		'id_matpel' => $this->input->post('id_matpel',TRUE),
		'nilai_absensi' => $this->input->post('nilai_absensi',TRUE),
		'nilai_tugas' => $this->input->post('nilai_tugas',TRUE),
		'nilai_kuis' => $this->input->post('nilai_kuis',TRUE),
		'nilai_uts' => $this->input->post('nilai_uts',TRUE),
		'nilai_uas' => $this->input->post('nilai_uas',TRUE),
		'niali_akhir' => $this->input->post('niali_akhir',TRUE),
	    );

            $this->Nilai_model->update($this->input->post('id_nilai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('datanilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nilai_model->get_by_id($id);

        if ($row) {
            $this->Nilai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('datanilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datanilai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_siswa', 'id siswa', 'trim|required');
	$this->form_validation->set_rules('id_matpel', 'id matpel', 'trim|required');
	$this->form_validation->set_rules('nilai_absensi', 'nilai absensi', 'trim|required');
	$this->form_validation->set_rules('nilai_tugas', 'nilai tugas', 'trim|required');
	$this->form_validation->set_rules('nilai_kuis', 'nilai kuis', 'trim|required');
	$this->form_validation->set_rules('nilai_uts', 'nilai uts', 'trim|required');
	$this->form_validation->set_rules('nilai_uas', 'nilai uas', 'trim|required');
	$this->form_validation->set_rules('niali_akhir', 'niali akhir', 'trim|required');

	$this->form_validation->set_rules('id_nilai', 'id_nilai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_nilai.xls";
        $judul = "t_nilai";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Matpel");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Absensi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Tugas");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Kuis");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Uts");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Uas");
	xlsWriteLabel($tablehead, $kolomhead++, "Niali Akhir");

	foreach ($this->Nilai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_siswa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_matpel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nilai_absensi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nilai_tugas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nilai_kuis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nilai_uts);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nilai_uas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->niali_akhir);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_nilai.doc");

        $data = array(
            't_nilai_data' => $this->Nilai_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('datanilai/t_nilai_doc',$data);
    }

}

/* End of file Datanilai.php */
/* Location: ./application/controllers/Datanilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 05:35:54 */
/* http://harviacode.com */