<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datajadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Jadwal_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','datajadwal/t_jadwal_pelajaran_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jadwal_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jadwal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jadwal' => $row->id_jadwal,
		'id_matpel' => $row->id_matpel,
		'id_kelas' => $row->id_kelas,
		'hari' => $row->hari,
		'jam_mulai' => $row->jam_mulai,
		'jam_selesai' => $row->jam_selesai,
	    );
            $this->template->load('template','datajadwal/t_jadwal_pelajaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datajadwal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('datajadwal/create_action'),
	        'id_jadwal' => set_value('id_jadwal'),
	        'id_matpel' => set_value('id_matpel'),
	        'id_kelas' => set_value('id_kelas'),
	        'hari' => set_value('hari'),
	        'jam_mulai' => set_value('jam_mulai'),
	        'jam_selesai' => set_value('jam_selesai'),
            'data_kelas' => $this->Jadwal_model->show_data_kelas(),
            'data_matpel' => $this->Jadwal_model->show_data_matpel(),
	);
        $this->template->load('template','datajadwal/t_jadwal_pelajaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_matpel' => $this->input->post('id_matpel',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'hari' => $this->input->post('hari',TRUE),
		'jam_mulai' => $this->input->post('jam_mulai',TRUE),
		'jam_selesai' => $this->input->post('jam_selesai',TRUE),
	    );

            $this->Jadwal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('datajadwal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('datajadwal/update_action'),
		'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
		'id_matpel' => set_value('id_matpel', $row->id_matpel),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'hari' => set_value('hari', $row->hari),
		'jam_mulai' => set_value('jam_mulai', $row->jam_mulai),
		'jam_selesai' => set_value('jam_selesai', $row->jam_selesai),
	    );
            $this->template->load('template','datajadwal/t_jadwal_pelajaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datajadwal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jadwal', TRUE));
        } else {
            $data = array(
		'id_matpel' => $this->input->post('id_matpel',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'hari' => $this->input->post('hari',TRUE),
		'jam_mulai' => $this->input->post('jam_mulai',TRUE),
		'jam_selesai' => $this->input->post('jam_selesai',TRUE),
	    );

            $this->Jadwal_model->update($this->input->post('id_jadwal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('datajadwal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $this->Jadwal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('datajadwal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datajadwal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_matpel', 'id matpel', 'trim|required');
	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
	$this->form_validation->set_rules('hari', 'hari', 'trim|required');
	$this->form_validation->set_rules('jam_mulai', 'jam mulai', 'trim|required');
	$this->form_validation->set_rules('jam_selesai', 'jam selesai', 'trim|required');

	$this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_jadwal_pelajaran.xls";
        $judul = "t_jadwal_pelajaran";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Matpel");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Hari");
	xlsWriteLabel($tablehead, $kolomhead++, "Jam Mulai");
	xlsWriteLabel($tablehead, $kolomhead++, "Jam Selesai");

	foreach ($this->Jadwal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_matpel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hari);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jam_mulai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jam_selesai);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_jadwal_pelajaran.doc");

        $data = array(
            't_jadwal_pelajaran_data' => $this->Jadwal_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('datajadwal/t_jadwal_pelajaran_doc',$data);
    }

}

/* End of file Datajadwal.php */
/* Location: ./application/controllers/Datajadwal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 07:38:53 */
/* http://harviacode.com */