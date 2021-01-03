<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Model extends CI_Model
{
    public function contact()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'website' => htmlspecialchars($this->input->post('website', true)),
            'message' => htmlspecialchars($this->input->post('Message', true)),
        ];
        $this->db->insert('contact', $data);
    }
    public function register()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1', true), PASSWORD_BCRYPT)
        ];
        $this->db->insert('user', $data);
    }
    public function login()
    {
        $user = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $user])->row_array();
        if ($user > 0) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password is wrongs, please check again!
                </div>');
                redirect('home/sign_in');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username is not registered!
            </div>');
            redirect('home/sign_in');
        }
    }
}
