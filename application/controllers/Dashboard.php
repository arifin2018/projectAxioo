<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_Model');
        if (!$this->session->userdata('username')) {
            redirect('NotFound');
        }
    }
    public function index()
    {
        $data['judul'] = "Halaman Dashboard";

        $config = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim|min_length[4]'
            ],
            [
                'field' => 'pnumber',
                'label' => 'Phone Number',
                'rules' => 'required|trim|is_unique[student.pnumber]|numeric|min_length[4]',
                'errors' => ['is_unique' => "This number phone has already registered!"]
            ],
            [
                'field' => 'school',
                'label' => 'School',
                'rules' => 'required|trim|min_length[4]'
            ],
            [
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required|valid_email|trim|is_unique[student.email]',
                'errors' => ['is_unique' => "This email has already registered!"]
            ],
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['department'] = $this->Dashboard_Model->getDepartment();
            $data['grade'] = $this->Dashboard_Model->getGrade();
            $this->load->view("templates/header", $data);
            $this->load->view("dashboard/index", $data);
            $this->load->view("templates/footer");
        } else {
            $data['register'] = $this->Dashboard_Model->insertData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Thanks You! Your student has been created!
            </div>');
            redirect('dashboard');
        }
    }
    public function student()
    {
        $data['studentData'] = $this->Dashboard_Model->getStudentAll();
        if ($this->input->post('keyword')) {
            $data['studentData'] = $this->Dashboard_Model->searchDataStudent();
        }
        $data['judul'] = "Halaman student";
        $this->load->view("templates/header", $data);
        $this->load->view("dashboard/student", $data);
        $this->load->view("templates/footer");
    }
    public function detail($id)
    {
        $data['judul'] = 'Halaman detail';
        $data['student'] = $this->Dashboard_Model->detailStudent($id);
        $this->load->view("templates/header", $data);
        $this->load->view("dashboard/detail", $data);
        $this->load->view("templates/footer");
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Dashboard";

        $config = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim|min_length[4]'
            ],
            [
                'field' => 'pnumber',
                'label' => 'Phone Number',
                'rules' => 'required|trim|numeric|min_length[4]',
                'errors' => ['is_unique' => "This number phone has already registered!"]
            ],
            [
                'field' => 'school',
                'label' => 'School',
                'rules' => 'required|trim|min_length[4]'
            ],
            [
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required|valid_email|trim',
                'errors' => ['is_unique' => "This email has already registered!"]
            ],
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['department'] = $this->Dashboard_Model->getDepartment();
            $data['student'] = $this->Dashboard_Model->detailStudent($id);
            $data['grade'] = $this->Dashboard_Model->getGrade();
            $this->load->view("templates/header", $data);
            $this->load->view("dashboard/edit", $data);
            $this->load->view("templates/footer");
        } else {
            $data['edit'] = $this->Dashboard_Model->editData($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Thanks You! Your student has been edited! </div>');
            redirect('dashboard/student');
        }
    }
    public function deleteStudent($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('student');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Thanks You! Your student has been deleted! </div>');
        redirect('dashboard/student');
    }
    public function excel()
    {
        $data['studentData'] = $this->Dashboard_Model->getStudentAll();
        require(APPPATH . 'PHPExcel-1.8/classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/classes/PHPExcel/writer/excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Nur Arifin");
        $objPHPExcel->getProperties()->setLastModifiedBy("Nur Arifin");
        $objPHPExcel->getProperties()->setTitle("Data Student");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Phone Number');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'School');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Grade');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Email');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Department');

        $baris = 2;
        $no = 1;
        foreach ($data['studentData'] as $dta) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $dta['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $dta['pnumber']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $dta['school']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $dta['grade']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $dta['email']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $dta['department']);
            $baris++;
        }
        $filename = "Data-Mahasiswa" . date("d-m-Y-H-i-s") . 'xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Data Student");

        header('Content-Type: application/vnd.openxml-formats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}
