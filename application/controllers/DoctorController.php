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
        $this->load->view('doctor/templates/NavigationTemplate');

        switch ($page) {
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

}
