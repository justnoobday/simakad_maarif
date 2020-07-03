<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listkelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Listkelas_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','listkelas/t_kelas_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Listkelas_model->json();
    }

    public function read($id) 
    {
        $row = $this->Listkelas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kelas' => $row->id_kelas,
		'nama_kelas' => $row->nama_kelas,
		'tingkat' => $row->tingkat,
		'id_jurusan' => $row->id_jurusan,
		'id_wali_kelas' => $row->id_wali_kelas,
	    );
            $this->template->load('template','listkelas/t_kelas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('listkelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('listkelas/create_action'),
	    'id_kelas' => set_value('id_kelas'),
	    'nama_kelas' => set_value('nama_kelas'),
	    'tingkat' => set_value('tingkat'),
	    'id_jurusan' => set_value('id_jurusan'),
	    'id_wali_kelas' => set_value('id_wali_kelas'),
	);
        $this->template->load('template','listkelas/t_kelas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
		'tingkat' => $this->input->post('tingkat',TRUE),
		'id_jurusan' => $this->input->post('id_jurusan',TRUE),
		'id_wali_kelas' => $this->input->post('id_wali_kelas',TRUE),
	    );

            $this->Listkelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('listkelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Listkelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('listkelas/update_action'),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'nama_kelas' => set_value('nama_kelas', $row->nama_kelas),
		'tingkat' => set_value('tingkat', $row->tingkat),
		'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
		'id_wali_kelas' => set_value('id_wali_kelas', $row->id_wali_kelas),
	    );
            $this->template->load('template','listkelas/t_kelas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('listkelas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kelas', TRUE));
        } else {
            $data = array(
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
		'tingkat' => $this->input->post('tingkat',TRUE),
		'id_jurusan' => $this->input->post('id_jurusan',TRUE),
		'id_wali_kelas' => $this->input->post('id_wali_kelas',TRUE),
	    );

            $this->Listkelas_model->update($this->input->post('id_kelas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('listkelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Listkelas_model->get_by_id($id);

        if ($row) {
            $this->Listkelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('listkelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('listkelas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kelas', 'nama kelas', 'trim|required');
	$this->form_validation->set_rules('tingkat', 'tingkat', 'trim|required');
	$this->form_validation->set_rules('id_jurusan', 'id jurusan', 'trim|required');
	$this->form_validation->set_rules('id_wali_kelas', 'id wali kelas', 'trim|required');

	$this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_kelas.xls";
        $judul = "t_kelas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Tingkat");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jurusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Wali Kelas");

	foreach ($this->Listkelas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tingkat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jurusan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_wali_kelas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_kelas.doc");

        $data = array(
            't_kelas_data' => $this->Listkelas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('listkelas/t_kelas_doc',$data);
    }

}

/* End of file Listkelas.php */
/* Location: ./application/controllers/Listkelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-25 15:05:45 */
/* http://harviacode.com */