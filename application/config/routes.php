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
$route['schedule/book/(:num)'] = 'PatientController/setScheduleBooking/$1';
$route['profile/update'] = 'PatientController/getProfileUpdate/$1';
$route['profile/update/submit'] = 'PatientController/setProfileUpdate';

$route['doctor/(:any)'] = 'DoctorController/index/$1';

$route['doctor/dashboard/appointment/view/(:num)'] = 'DoctorController/getAppointmentInfo/$1';
$route['doctor/dashboard/appointment/update/(:num)'] = 'DoctorController/getAppointmentUpdate/$1';
$route['doctor/dashboard/appointment/update/submit'] = 'DoctorController/setAppointmentUpdate';
$route['doctor/dashboard/appointment/delete/(:num)'] = 'DoctorController/deleteAppointment/$1';

$route['doctor/dashboard/followup/add/(:num)'] = 'DoctorController/addFollowup/$1';
$route['doctor/dashboard/followup/view/(:num)'] = 'DoctorController/getFollowupInfo/$1';
$route['doctor/dashboard/followup/update/(:num)'] = 'DoctorController/getFollowupUpdate/$1';
$route['doctor/dashboard/followup/update/submit'] = 'DoctorController/setFollowupUpdate';
$route['doctor/dashboard/followup/delete/(:num)'] = 'DoctorController/deleteFollowup/$1';

$route['doctor/schedule/unavailable/(:num)'] = 'DoctorController/setUnavailable/$1';