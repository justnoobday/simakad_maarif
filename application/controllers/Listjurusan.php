<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listjurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Listjurusan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','listjurusan/t_jurusan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Listjurusan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Listjurusan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jurusan' => $row->id_jurusan,
		'nama_jurusan' => $row->nama_jurusan,
	    );
            $this->template->load('template','listjurusan/t_jurusan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('listjurusan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('listjurusan/create_action'),
	    'id_jurusan' => set_value('id_jurusan'),
	    'nama_jurusan' => set_value('nama_jurusan'),
	);
        $this->template->load('template','listjurusan/t_jurusan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_jurusan' => $this->input->post('nama_jurusan',TRUE),
	    );

            $this->Listjurusan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('listjurusan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Listjurusan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('listjurusan/update_action'),
		'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
		'nama_jurusan' => set_value('nama_jurusan', $row->nama_jurusan),
	    );
            $this->template->load('template','listjurusan/t_jurusan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('listjurusan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jurusan', TRUE));
        } else {
            $data = array(
		'nama_jurusan' => $this->input->post('nama_jurusan',TRUE),
	    );

            $this->Listjurusan_model->update($this->input->post('id_jurusan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('listjurusan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Listjurusan_model->get_by_id($id);

        if ($row) {
            $this->Listjurusan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('listjurusan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('listjurusan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_jurusan', 'nama jurusan', 'trim|required');

	$this->form_validation->set_rules('id_jurusan', 'id_jurusan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_jurusan.xls";
        $judul = "t_jurusan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Jurusan");

	foreach ($this->Listjurusan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_jurusan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_jurusan.doc");

        $data = array(
            't_jurusan_data' => $this->Listjurusan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('listjurusan/t_jurusan_doc',$data);
    }

}

/* End of file Listjurusan.php */
/* Location: ./application/controllers/Listjurusan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-25 15:01:58 */
/* http://harviacode.com */