<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dataguru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dataguru_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','dataguru/t_guru_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Dataguru_model->json();
    }

    public function read($id) 
    {
        $row = $this->Dataguru_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_guru' => $row->id_guru,
		'nipy' => $row->nipy,
		'nik' => $row->nik,
		'nama_guru' => $row->nama_guru,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tanggal_lahir' => $row->tanggal_lahir,
		'induk' => $row->induk,
	    );
            $this->template->load('template','dataguru/t_guru_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dataguru'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dataguru/create_action'),
	    'id_guru' => set_value('id_guru'),
	    'nipy' => set_value('nipy'),
	    'nik' => set_value('nik'),
	    'nama_guru' => set_value('nama_guru'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'induk' => set_value('induk'),
	);
        $this->template->load('template','dataguru/t_guru_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nipy' => $this->input->post('nipy',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama_guru' => $this->input->post('nama_guru',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'induk' => $this->input->post('induk',TRUE),
	    );

            $this->Dataguru_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('dataguru'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dataguru_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dataguru/update_action'),
		'id_guru' => set_value('id_guru', $row->id_guru),
		'nipy' => set_value('nipy', $row->nipy),
		'nik' => set_value('nik', $row->nik),
		'nama_guru' => set_value('nama_guru', $row->nama_guru),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'induk' => set_value('induk', $row->induk),
	    );
            $this->template->load('template','dataguru/t_guru_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dataguru'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_guru', TRUE));
        } else {
            $data = array(
		'nipy' => $this->input->post('nipy',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama_guru' => $this->input->post('nama_guru',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'induk' => $this->input->post('induk',TRUE),
	    );

            $this->Dataguru_model->update($this->input->post('id_guru', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dataguru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dataguru_model->get_by_id($id);

        if ($row) {
            $this->Dataguru_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dataguru'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dataguru'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nipy', 'nipy', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama_guru', 'nama guru', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('induk', 'induk', 'trim|required');

	$this->form_validation->set_rules('id_guru', 'id_guru', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_guru.xls";
        $judul = "t_guru";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nipy");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Guru");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Induk");

	foreach ($this->Dataguru_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nipy);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_guru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->induk);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_guru.doc");

        $data = array(
            't_guru_data' => $this->Dataguru_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('dataguru/t_guru_doc',$data);
    }

}

/* End of file Dataguru.php */
/* Location: ./application/controllers/Dataguru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-28 13:57:35 */
/* http://harviacode.com */