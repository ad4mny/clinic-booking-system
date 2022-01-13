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
}
