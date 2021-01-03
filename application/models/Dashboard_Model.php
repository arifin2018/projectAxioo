<?php

class Dashboard_Model extends CI_Model
{
    public function getGrade()
    {
        $query = $this->db->get('grade');
        return $query->result_array();
        // echo "halo";
    }
    public function getDepartment()
    {
        $query = $this->db->get('department');
        return $query->result_array();
    }
    public function insertData()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'pnumber' => htmlspecialchars($this->input->post('pnumber', true)),
            'school' => htmlspecialchars($this->input->post('school', true)),
            'grade' => htmlspecialchars($this->input->post('grade', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'department' => htmlspecialchars($this->input->post('department', true))
        ];
        $this->db->insert('student', $data);
    }
    public function getStudentAll()
    {
        $query = $this->db->get('student');
        return $query->result_array();
    }
    public function detailStudent($id)
    {
        return  $this->db->get_where('student', array('id' => $id))->row_array();
    }
    public function editData($id)
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'pnumber' => htmlspecialchars($this->input->post('pnumber', true)),
            'school' => htmlspecialchars($this->input->post('school', true)),
            'grade' => htmlspecialchars($this->input->post('grade', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'department' => htmlspecialchars($this->input->post('department', true))
        ];
        $this->db->where('id', $id);
        $this->db->update('student', $data);
    }
    public function searchDataStudent()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('name', $keyword);
        $res = $this->db->get('student')->result_array();
        return $res;
    }
}
