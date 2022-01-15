<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'LoginController/index/login';
$route['register'] = 'LoginController/index/register';
$route['login/submit'] = 'LoginController/login';
$route['register/submit'] = 'LoginController/register';
$route['logout'] = 'LoginController/logout';

$route['(:any)'] = 'PatientController/index/$1';

$route['doctor/(:any)'] = 'DoctorController/index/$1';
$route['doctor/dashboard/appointment/view/(:num)'] = 'DoctorController/getAppointmentInfo/$1';
$route['doctor/dashboard/appointment/delete/(:num)'] = 'DoctorController/deleteAppoinment/$1';
$route['doctor/dashboard/followup/view/(:num)'] = 'DoctorController/getFollowupInfo/$1';
$route['doctor/dashboard/followup/delete/(:num)'] = 'DoctorController/deleteFollowup/$1';