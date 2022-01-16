<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    public function getAppointmentList()
    {
        $this->db->select('*');
        $this->db->from('appointments');
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

    public function getDoctorList()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', '1');
        return $this->db->get()->result_array();
    }

    public function setNewAppointment($doctorID, $description, $date, $time, $status)
    {
        $appointments = array(
            'doctorID' => $doctorID,
            'patientID' => NULL,
            'description' => $description,
            'date' => $date,
            'time' => $time,
            'status' => $status
        );

        return $this->db->insert('appointments', $appointments);
    }

    public function deleteAppointment($appointmentID)
    {
        $this->db->where('appointmentID', $appointmentID);
        return $this->db->delete('appointments');
    }

    public function getPatientList()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', '0');
        return $this->db->get()->result_array();
    }
}
