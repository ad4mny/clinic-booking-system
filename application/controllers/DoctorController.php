<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DoctorController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DoctorModel');
    }

    public function index($page = 'dashboard')
    {
        $this->load->view('doctor/templates/HeaderTemplate');

        switch ($page) {
            case 'schedule':
                $data['schedules'] = $this->getScheduleList();
                $this->load->view('doctor/ScheduleView', $data);
                break;
            default:
                $data['appointments'] = $this->getAppointmentList();
                $this->load->view('doctor/DashboardView', $data);
                break;
        }

        $this->load->view('doctor/templates/FooterTemplate');
    }

    public function getAppointmentList()
    {
        return $this->DoctorModel->getAppointmentList();
    }

    public function getScheduleList()
    {
        return $this->DoctorModel->getScheduleList();
    }

    public function getAppointmentInfo($appointmentID)
    {
        $data['appointments'] = $this->DoctorModel->getAppointmentInfo($appointmentID);
        $this->load->view('doctor/templates/HeaderTemplate');
        $this->load->view('doctor/AppointmentView', $data);
        $this->load->view('doctor/templates/FooterTemplate');
    }

    public function getAppointmentUpdate($appointmentID)
    {
        $data['appointments'] = $this->DoctorModel->getAppointmentInfo($appointmentID);
        $this->load->view('doctor/templates/HeaderTemplate');
        $this->load->view('doctor/AppointmentUpdateView', $data);
        $this->load->view('doctor/templates/FooterTemplate');
    }

    public function setAppointmentUpdate()
    {
        $appointmentID = $this->input->post('appointmentID');
        $description = $this->input->post('description');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $status = $this->input->post('status');

        if ($this->DoctorModel->setAppointmentUpdate($appointmentID, $description, $date, $time, $status) != false) {
            $this->session->set_tempdata('notice', 'Success updating the appointment.');
        } else {
            $this->session->set_tempdata('error', 'Failed updating the appointment.');
        }
        redirect(base_url() . 'doctor/dashboard');
    }

    public function deleteAppointment($appointmentID)
    {
        if ($this->DoctorModel->deleteAppointment($appointmentID) != false) {
            $this->session->set_tempdata('notice', 'Success deleting the appointment.');
        } else {
            $this->session->set_tempdata('error', 'Failed deleting the appointment.');
        }
        redirect(base_url() . 'doctor/dashboard');
    }

    public function addFollowup($appointmentID)
    {
        if ($this->DoctorModel->addFollowup($appointmentID) != false) {
            $this->session->set_tempdata('notice', 'Success adding a new followup.');
        } else {
            $this->session->set_tempdata('error', 'Error adding a new followup.');
        }
        redirect(base_url() . 'doctor/dashboard/appointment/view/' . $appointmentID);
    }

    public function getFollowupInfo($followupID)
    {
        $data['followups'] = $this->DoctorModel->getFollowupInfo($followupID);
        $this->load->view('doctor/templates/HeaderTemplate');
        $this->load->view('doctor/FollowupView', $data);
        $this->load->view('doctor/templates/FooterTemplate');
    }

    public function getFollowupUpdate($followupID)
    {
        $data['followups'] = $this->DoctorModel->getFollowupInfo($followupID);
        $this->load->view('doctor/templates/HeaderTemplate');
        $this->load->view('doctor/FollowupUpdateView', $data);
        $this->load->view('doctor/templates/FooterTemplate');
    }

    public function setFollowupUpdate()
    {
        $followupID = $this->input->post('followupID');
        $description = $this->input->post('description');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $status = $this->input->post('status');

        if ($this->DoctorModel->setFollowupUpdate($followupID, $description, $date, $time, $status) != false) {
            $this->session->set_tempdata('notice', 'Success updating the followup.');
        } else {
            $this->session->set_tempdata('error', 'Failed updating the followup.');
        }
        redirect(base_url() . 'doctor/dashboard');
    }

    public function deleteFollowup($followupID)
    {
        if ($this->DoctorModel->deleteFollowup($followupID) != false) {
            $this->session->set_tempdata('notice', 'Success deleting the follow up.');
        } else {
            $this->session->set_tempdata('error', 'Failed deleting the follow up.');
        }
        redirect(base_url() . 'doctor/dashboard');
    }
}
