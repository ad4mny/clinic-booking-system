<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DoctorModel extends CI_Model
{
    public function getAppointmentList()
    {
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->join('users', 'appointments.patientID = users.userID');
        $this->db->where('doctorID', $_SESSION['userID']);
        $this->db->where('patientID !=', NULL);
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

    public function getScheduleList()
    {
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->join('users', 'appointments.doctorID = users.userID');
        $this->db->where('doctorID', $_SESSION['userID']);
        $this->db->where('patientID', NULL);
        $this->db->where('status', 'Available');
        $this->db->order_by('appointmentID', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getAppointmentInfo($appointmentID)
    {
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->join('users', 'appointments.patientID = users.userID');
        $this->db->where('appointmentID', $appointmentID);
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

    public function setAppointmentUpdate($appointmentID, $description, $date, $time, $status)
    {
        $appointments = array(
            'description' => $description,
            'date' => $date,
            'time' => $time,
            'status' => $status
        );
        $this->db->where('appointmentID', $appointmentID);
        return $this->db->update('appointments', $appointments);
    }

    public function deleteAppointment($appointmentID)
    {
        $this->db->where('appointmentID', $appointmentID);
        return $this->db->delete('appointments');
    }

    public function addFollowup($appointmentID)
    {
        $followups = array(
            'appointmentID' => $appointmentID,
            'description' => 'Please Update',
            'date' => 'Date',
            'time' => 'Time',
            'status' => 'Upcoming'
        );
        return $this->db->insert('followups', $followups);
    }

    public function getFollowupInfo($followupID)
    {
        $this->db->select('*');
        $this->db->from('followups');
        $this->db->where('followupID', $followupID);
        $data = $this->db->get()->row_array();

        $this->db->select('*');
        $this->db->from('followups');
        $this->db->join('appointments', 'appointments.appointmentID = followups.appointmentID');
        $this->db->join('users', 'appointments.patientID = users.userID');
        $this->db->where('followupID', $followupID);
        $data['appointment'] = $this->db->get()->row_array();

        return $data;
    }

    public function setFollowupUpdate($followupID, $description, $date, $time, $status)
    {
        $followups = array(
            'description' => $description,
            'date' => $date,
            'time' => $time,
            'status' => $status
        );
        $this->db->where('followupID', $followupID);
        return $this->db->update('followups', $followups);
    }

    public function deleteFollowup($followupID)
    {
        $this->db->where('followupID', $followupID);
        return $this->db->delete('followups');
    }
    
    public function setUnavailable($appointmentID)
    {
        $this->db->where('appointmentID', $appointmentID);
        return $this->db->delete('appointments');
    }
}
