<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datarpp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rpp_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','datarpp/t_rpp_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rpp_model->json();
    }

    public function read($id) 
    {
        $row = $this->Rpp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rpp' => $row->id_rpp,
		'judul_rpp' => $row->judul_rpp,
		'id_guru' => $row->id_guru,
		'id_matpel' => $row->id_matpel,
		'status_persetujuan' => $row->status_persetujuan,
		'catatan_revisi' => $row->catatan_revisi,
		'tanggal_upload' => $row->tanggal_upload,
	    );
            $this->template->load('template','datarpp/t_rpp_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datarpp'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('datarpp/create_action'),
	        'id_rpp' => set_value('id_rpp'),
	        'judul_rpp' => set_value('judul_rpp'),
	        'id_guru' => set_value('id_guru'),
	        'id_matpel' => set_value('id_matpel'),
	        'status_persetujuan' => set_value('status_persetujuan'),
	        'catatan_revisi' => set_value('catatan_revisi'),
	        'tanggal_upload' => set_value('tanggal_upload'),
            'data_guru' => $this->Rpp_model->show_data_guru(),
            'data_matpel' => $this->Rpp_model->show_data_matpel(),
	);
        $this->template->load('template','datarpp/t_rpp_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul_rpp' => $this->input->post('judul_rpp',TRUE),
		'id_guru' => $this->input->post('id_guru',TRUE),
		'id_matpel' => $this->input->post('id_matpel',TRUE),
		'status_persetujuan' => $this->input->post('status_persetujuan',TRUE),
		'catatan_revisi' => $this->input->post('catatan_revisi',TRUE),
		'tanggal_upload' => $this->input->post('tanggal_upload',TRUE),
	    );

            $this->Rpp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('datarpp'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rpp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('datarpp/update_action'),
		'id_rpp' => set_value('id_rpp', $row->id_rpp),
		'judul_rpp' => set_value('judul_rpp', $row->judul_rpp),
		'id_guru' => set_value('id_guru', $row->id_guru),
		'id_matpel' => set_value('id_matpel', $row->id_matpel),
		'status_persetujuan' => set_value('status_persetujuan', $row->status_persetujuan),
		'catatan_revisi' => set_value('catatan_revisi', $row->catatan_revisi),
		'tanggal_upload' => set_value('tanggal_upload', $row->tanggal_upload),
	    );
            $this->template->load('template','datarpp/t_rpp_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datarpp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rpp', TRUE));
        } else {
            $data = array(
		'judul_rpp' => $this->input->post('judul_rpp',TRUE),
		'id_guru' => $this->input->post('id_guru',TRUE),
		'id_matpel' => $this->input->post('id_matpel',TRUE),
		'status_persetujuan' => $this->input->post('status_persetujuan',TRUE),
		'catatan_revisi' => $this->input->post('catatan_revisi',TRUE),
		'tanggal_upload' => $this->input->post('tanggal_upload',TRUE),
	    );

            $this->Rpp_model->update($this->input->post('id_rpp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('datarpp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rpp_model->get_by_id($id);

        if ($row) {
            $this->Rpp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('datarpp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datarpp'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul_rpp', 'judul rpp', 'trim|required');
	$this->form_validation->set_rules('id_guru', 'id guru', 'trim|required');
	$this->form_validation->set_rules('id_matpel', 'id matpel', 'trim|required');
	$this->form_validation->set_rules('status_persetujuan', 'status persetujuan', 'trim|required');
	$this->form_validation->set_rules('catatan_revisi', 'catatan revisi', 'trim|required');
	$this->form_validation->set_rules('tanggal_upload', 'tanggal upload', 'trim|required');

	$this->form_validation->set_rules('id_rpp', 'id_rpp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_rpp.xls";
        $judul = "t_rpp";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Judul Rpp");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Guru");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Matpel");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Persetujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Catatan Revisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Upload");

	foreach ($this->Rpp_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul_rpp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_guru);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_matpel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_persetujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->catatan_revisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_upload);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_rpp.doc");

        $data = array(
            't_rpp_data' => $this->Rpp_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('datarpp/t_rpp_doc',$data);
    }

}

/* End of file Datarpp.php */
/* Location: ./application/controllers/Datarpp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 04:20:45 */
/* http://harviacode.com */