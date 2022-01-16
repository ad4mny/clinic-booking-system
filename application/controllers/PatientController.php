<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PatientController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PatientModel');
    }

    public function index($page = 'dashboard')
    {
        $this->load->view('templates/HeaderTemplate');
        $this->load->view('templates/NavigationTemplate');

        switch ($page) {
            case 'profile':
                $data['profiles'] = $this->getProfileInfo();
                $this->load->view('ProfileView', $data);
                break;
            case 'appointment':
                $data['schedules'] = $this->getAvailableAppointmentList();
                $this->load->view('AppointmentView', $data);
                break;
            default:
                $data['appointments'] = $this->getAppointmentList();
                $this->load->view('DashboardView', $data);
                break;
        }

        $this->load->view('templates/FooterTemplate');
    }

    public function getAppointmentList()
    {
        return $this->PatientModel->getAppointmentList();
    }

    public function getAvailableAppointmentList()
    {
        return $this->PatientModel->getAvailableAppointmentList();
    }

    public function setScheduleBooking($appointmentID)
    {
        if ($this->PatientModel->setScheduleBooking($appointmentID) != false) {
            $this->session->set_tempdata('notice', 'Success booking the appointment.');
        } else {
            $this->session->set_tempdata('error', 'Failed booking the appointment.');
        }
        redirect(base_url() . 'dashboard');
    }

    public function getProfileInfo()
    {
        return $this->PatientModel->getProfileInfo();
    }

    public function getProfileUpdate()
    {
        $data['profiles'] = $this->getProfileInfo();
        $this->load->view('templates/HeaderTemplate');
        $this->load->view('templates/NavigationTemplate');
        $this->load->view('ProfileUpdateView', $data);
        $this->load->view('templates/FooterTemplate');
    }

    public function setProfileUpdate()
    {
        $username = $this->input->post('username');
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');

        if ($this->PatientModel->setProfileUpdate($username, $firstName, $lastName) != false) {
            $this->session->set_tempdata('notice', 'Success updating the profile.');
        } else {
            $this->session->set_tempdata('error', 'Failed updating the profile.');
        }
        redirect(base_url() . 'profile');
    }
}
