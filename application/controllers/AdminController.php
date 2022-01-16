<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }

    public function index()
    {
        $data['appointments'] = $this->getAppointmentList();

        $this->load->view('admin/templates/HeaderTemplate');
        $this->load->view('admin/DashboardView', $data);
        $this->load->view('admin/templates/FooterTemplate');
    }

    public function getAppointmentList()
    {
        return $this->AdminModel->getAppointmentList();
    }

    public function setNewAppointment()
    {
        $description = $this->input->post('description');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $status = $this->input->post('status');

        if ($this->AdminModel->setNewAppointment($description, $date, $time, $status) != false) {
            $this->session->set_tempdata('notice', 'Success adding the appointment.');
        } else {
            $this->session->set_tempdata('error', 'Failed adding the appointment.');
        }
        redirect(base_url() . 'admin/dashboard');
    }

    public function deleteAppointment($appointmentID)
    {
        if ($this->AdminModel->deleteAppointment($appointmentID) != false) {
            $this->session->set_tempdata('notice', 'Success deleting the appointment.');
        } else {
            $this->session->set_tempdata('error', 'Failed deleting the appointment.');
        }
        redirect(base_url() . 'admin/dashboard');
    }
}
