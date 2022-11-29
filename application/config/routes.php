<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Default_controller';
$route['404_override'] = 'Default_controller/error404';

$route['test'] = 'Default_controller/test';

//syncronise jobs
$route['sync_cron_jobs'] = 'Default_controller/sync_cron_jobs';
$route['secondCronjob'] = 'Default_controller/secondCronjob';

//Admin auth

$route['admin']='Auth_controller/admin';
$route['login'] = 'Auth_controller/login';
$route['admin/logout'] = 'Auth_controller/logout';
$route['translate_uri_dashes'] = FALSE;

//category

$route['admin/dashboard'] = 'admin/Admin_controller/index';
$route['admin/save_category']='admin/Admin_controller/save_category';
$route['admin/get_category'] = 'admin/Admin_controller/get_category';
$route['admin/update_category'] = 'admin/Admin_controller/update_category';

//Group

$route['admin/group'] = 'admin/Admin_controller/group';
$route['admin/save_group']='admin/Admin_controller/save_group';
$route['admin/get_group'] = 'admin/Admin_controller/get_group';
$route['admin/update_group'] = 'admin/Admin_controller/update_group';

//Records

$route['admin/records'] = 'admin/Admin_controller/records';
$route['admin/save_records']='admin/Admin_controller/save_records';
$route['admin/get_records'] = 'admin/Admin_controller/get_records';
$route['admin/update_records'] = 'admin/Admin_controller/update_records';
$route['admin/import'] = 'admin/Admin_controller/import';
$route['admin/importallnumbers'] = 'admin/Admin_controller/importallnumbers';

//Common Section

$route['admin/common_section'] = 'admin/Admin_controller/common_section';
$route['admin/get_common_records'] = 'admin/Admin_controller/get_common_records';
$route['admin/update_common_section'] = 'admin/Admin_controller/update_common_section';

//homepage

$route['demo'] = 'Default_controller/demo';
$route['demo1'] = 'Default_controller/demo1';
$route['(:any)'] = 'Default_controller/homescreen/$1';


