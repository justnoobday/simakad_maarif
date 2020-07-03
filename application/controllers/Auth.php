<?php
Class Auth extends CI_Controller{
    
    
    
    function index(){
        $this->load->view('auth/login_siswa');
    }
    
    function cheklogin(){
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        // query chek users
        $this->db->where('email',$email);
        $this->db->where('password',  md5($password));
        $user       = $this->db->get('tbl_user');
        if($user->num_rows()>0){
            // retrive user data to session
            $this->session->set_userdata($user->row_array());
            redirect('user');
        }else{
            $this->session->set_flashdata('status_login','email atau password yang anda input salah');
            redirect('auth');
        }
    }

    function check_login_guru()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $this->db->where('email',$email);
        $this->db->where('password',$password);

        $user   = $this->db->get('t_user');
    }

    function login_guru()
    {
        $this->load->view('auth/login_guru');
    }
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
