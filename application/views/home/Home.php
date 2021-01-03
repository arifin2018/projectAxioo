<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_Model');
    }
    public function index()
    {
        $data['judul'] = "Halaman home";
        $this->load->view("templates/header", $data);
        $this->load->view("home/index");
        $this->load->view("templates/footer");
    }
    public function about()
    {
        $data['judul'] = "Halaman about";

        $this->load->view("templates/navbar", $data);
        $this->load->view("templates/header", $data);
        $this->load->view("home/about");
        $this->load->view("templates/footer");
    }
    public function contact()
    {
        $data['judul'] = "Halaman contact";
        $config = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim|min_length[4]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|trim|is_unique[contact.email]',
                'errors' => ['is_unique' => "This email has already registered!"]
            ],
            [
                'field' => 'website',
                'label' => 'Website',
                'rules' => 'required|trim|min_length[4]'
            ],
            [
                'field' => 'Message',
                'label' => 'Message',
                'rules' => 'required|trim'
            ],
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/navbar", $data);
            $this->load->view("templates/header", $data);
            $this->load->view("home/contact");
            $this->load->view("templates/footer");
        } else {
            $data['contact'] = $this->Home_Model->contact();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Thanks You! Your message has been created!
            </div>');
            redirect('home/contact');
        }
    }
    public function register()
    {
        $data['judul'] = "Halaman Register";
        $config = [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required|trim|min_length[3]|is_unique[user.username]',
                'errors' => ['is_unique' => "This username has already registered!"]
            ],
            [
                'field' => 'password1',
                'label' => 'Password',
                'rules' => 'required|matches[password2]|trim|min_length[4]',
                'errors' => array(
                    'matches' => "Password Doesn't matches",
                    'min_length' => "password's too short "
                ),
            ],
            [
                'field' => 'password2',
                'label' => 'Password',
                'rules' => 'required|trim'
            ],
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/navbar", $data);
            $this->load->view("templates/header", $data);
            $this->load->view("home/register");
            $this->load->view("templates/footer");
        } else {
            $data['register'] = $this->Home_Model->register();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Thanks You! Your account has been created. please log-in buddy!
            </div>');
            redirect('home/register');
        }
    }
    public function sign_in()
    {
        $data['judul'] = "Halaman Register";
        $config = [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required|trim|min_length[4]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[4]',
                'errors' => array(
                    'min_length' => "password's too short "
                ),
            ],
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/navbar", $data);
            $this->load->view("templates/header", $data);
            $this->load->view("home/sign_in");
            $this->load->view("templates/footer");
        } else {
            $data['login'] = $this->Home_Model->login();
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                You have been logout!
                </div>');
        redirect('home');
    }
}
