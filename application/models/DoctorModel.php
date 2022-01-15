<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DoctorModel extends CI_Model
{
    public function getAppointmentList()
    {
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->join('users', 'appointments.doctorID = users.userID');
        $this->db->where('doctorID', $_SESSION['userID']);
        $this->db->order_by('status', 'DESC');
        $this->db->order_by('appointmentID', 'DESC');
        $data = $this->db->get()->result_array();

        if ($data != false && $data != null) {
            foreach ($data as $key => $value) {
                $this->db->select('*');
                $this->db->from('followups');
                $this->db->where('appointmentID', $value['appointmentID']);
                $this->db->order_by('status', 'DESC');
                $data[$key]['followup'] = $this->db->get()->result_array();
            }
        }

        return $data;
    }
}
