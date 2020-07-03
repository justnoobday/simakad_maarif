<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datamatapelajaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Datamatapelajaran_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','datamatapelajaran/t_matpel_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Datamatapelajaran_model->json();
    }

    public function read($id) 
    {
        $row = $this->Datamatapelajaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_matpel' => $row->id_matpel,
		'nama_matpel' => $row->nama_matpel,
		'id_guru' => $row->id_guru,
		'semester' => $row->semester,
		'tahun_ajaran_mulai' => $row->tahun_ajaran_mulai,
		'tahun_ajaran_selesai' => $row->tahun_ajaran_selesai,
	    );
            $this->template->load('template','datamatapelajaran/t_matpel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datamatapelajaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('datamatapelajaran/create_action'),
	    'id_matpel' => set_value('id_matpel'),
	    'nama_matpel' => set_value('nama_matpel'),
	    'id_guru' => set_value('id_guru'),
	    'semester' => set_value('semester'),
	    'tahun_ajaran_mulai' => set_value('tahun_ajaran_mulai'),
	    'tahun_ajaran_selesai' => set_value('tahun_ajaran_selesai'),
	);
        $this->template->load('template','datamatapelajaran/t_matpel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_matpel' => $this->input->post('nama_matpel',TRUE),
		'id_guru' => $this->input->post('id_guru',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'tahun_ajaran_mulai' => $this->input->post('tahun_ajaran_mulai',TRUE),
		'tahun_ajaran_selesai' => $this->input->post('tahun_ajaran_selesai',TRUE),
	    );

            $this->Datamatapelajaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('datamatapelajaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Datamatapelajaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('datamatapelajaran/update_action'),
		'id_matpel' => set_value('id_matpel', $row->id_matpel),
		'nama_matpel' => set_value('nama_matpel', $row->nama_matpel),
		'id_guru' => set_value('id_guru', $row->id_guru),
		'semester' => set_value('semester', $row->semester),
		'tahun_ajaran_mulai' => set_value('tahun_ajaran_mulai', $row->tahun_ajaran_mulai),
		'tahun_ajaran_selesai' => set_value('tahun_ajaran_selesai', $row->tahun_ajaran_selesai),
	    );
            $this->template->load('template','datamatapelajaran/t_matpel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datamatapelajaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_matpel', TRUE));
        } else {
            $data = array(
		'nama_matpel' => $this->input->post('nama_matpel',TRUE),
		'id_guru' => $this->input->post('id_guru',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'tahun_ajaran_mulai' => $this->input->post('tahun_ajaran_mulai',TRUE),
		'tahun_ajaran_selesai' => $this->input->post('tahun_ajaran_selesai',TRUE),
	    );

            $this->Datamatapelajaran_model->update($this->input->post('id_matpel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('datamatapelajaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Datamatapelajaran_model->get_by_id($id);

        if ($row) {
            $this->Datamatapelajaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('datamatapelajaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datamatapelajaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_matpel', 'nama matpel', 'trim|required');
	$this->form_validation->set_rules('id_guru', 'id guru', 'trim|required');
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');
	$this->form_validation->set_rules('tahun_ajaran_mulai', 'tahun ajaran mulai', 'trim|required');
	$this->form_validation->set_rules('tahun_ajaran_selesai', 'tahun ajaran selesai', 'trim|required');

	$this->form_validation->set_rules('id_matpel', 'id_matpel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_matpel.xls";
        $judul = "t_matpel";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Matpel");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Guru");
	xlsWriteLabel($tablehead, $kolomhead++, "Semester");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Ajaran Mulai");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Ajaran Selesai");

	foreach ($this->Datamatapelajaran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_matpel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_guru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->semester);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_ajaran_mulai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_ajaran_selesai);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_matpel.doc");

        $data = array(
            't_matpel_data' => $this->Datamatapelajaran_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('datamatapelajaran/t_matpel_doc',$data);
    }

}

/* End of file Datamatapelajaran.php */
/* Location: ./application/controllers/Datamatapelajaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-28 21:42:35 */
/* http://harviacode.com */