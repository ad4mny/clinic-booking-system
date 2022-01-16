<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PatientModel extends CI_Model
{
    public function getAppointmentList()
    {
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->join('users', 'appointments.doctorID = users.userID');
        $this->db->where('patientID', $_SESSION['userID']);
        $this->db->order_by('appointmentID', 'DESC');
        $data = $this->db->get()->result_array();

        if ($data != false && $data != null) {
            foreach ($data as $key => $value) {
                $this->db->select('*');
                $this->db->from('followups');
                $this->db->where('appointmentID', $value['appointmentID']);
                $data[$key]['followup'] = $this->db->get()->result_array();
            }
        }

        return $data;
    }

    public function getAvailableAppointmentList()
    {
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->join('users', 'appointments.doctorID = users.userID');
        $this->db->where('patientID', NULL);
        $this->db->where('status', 'Available');
        $this->db->order_by('appointmentID', 'DESC');
        return $this->db->get()->result_array();
    }

    public function setScheduleBooking($appointmentID)
    {
        $appointments = array(
            'patientID' => $_SESSION['userID'],
            'status' => 'Upcoming'
        );
        $this->db->where('appointmentID', $appointmentID);
        return $this->db->update('appointments', $appointments);
    }

    public function getProfileInfo()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('userID', $_SESSION['userID']);
        return $this->db->get()->row_array();
    }

    public function setProfileUpdate($username, $firstName, $lastName)
    {
        $users = array(
            'username' => $username,
            'firstName' => $firstName,
            'lastName' => $lastName
        );
        $this->db->where('userID', $_SESSION['userID']);
        return $this->db->update('users', $users);
    }
    
}
