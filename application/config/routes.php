<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//show
$route['show/(:any)'] = 'show/index/$1';

//user
//dashboard
$route['dashboard'] = 'user/dashboard/index';
$route['dashboard/biayadaftarulang'] = 'user/dashboard/biayadaftarulang';
$route['dashboard/agenda'] = 'user/dashboard/agenda';
$route['dashboard/hubungiadmin'] = 'user/dashboard/hubungiadmin';
//daftar
$route['daftar'] = 'user/daftar/index';
$route['daftar/bayarformulir'] = 'user/daftar/bayarformulir';
$route['daftar/editpendaftaran'] = 'user/daftar/editpendaftaran';
//formulir
$route['formulir'] = 'user/formulir/index';
$route['formulir/dataortu'] = 'user/formulir/dataortu';
$route['formulir/berkas'] = 'user/formulir/berkas';
$route['formulir/editdatadiri'] = 'user/formulir/editdatadiri';
$route['formulir/editdataortu'] = 'user/formulir/editdataortu';
$route['formulir/editberkas'] = 'user/formulir/editberkas';
//cetak formulir
$route['cetakformulir'] = 'user/cetakformulir/index';
$route['cetakformulir/proses'] = 'user/cetakformulir/proses';

//utils
//profil
$route['profil'] = 'utils/profil/index';
$route['editprofil'] = 'utils/edit_profile/index';
$route['changepass'] = 'utils/change_pass/index';

//admin
//dashboard
$route['admindashboard'] = 'admin/dashboard/index';
//scan
$route['scan'] = 'admin/scan/index';
//pendaftar
$route['pendaftar'] = 'admin/pendaftar/index';
$route['pendaftar/index'] = 'admin/pendaftar/index';
$route['pendaftar/index/(:any)'] = 'admin/pendaftar/index/$1';
$route['pendaftar/detail/(:any)'] = 'admin/pendaftar/detail/$1';
$route['pendaftar/changestatus'] = 'admin/pendaftar/changestatus';
//showuser
$route['showuser'] = 'admin/showuser/index';
$route['showuser/index'] = 'admin/showuser/index';
$route['showuser/index/(:any)'] = 'admin/showuser/index/$1';
$route['showuser/detail/(:any)'] = 'admin/showuser/detail/$1';
$route['showuser/changestatus'] = 'admin/showuser/changestatus';
$route['showuser/deleteuser'] = 'admin/showuser/deleteuser';
//showformulir
$route['showformulir'] = 'admin/showformulir/index';
$route['showformulir/index'] = 'admin/showformulir/index';
$route['showformulir/index/(:any)'] = 'admin/showformulir/index/$1';
$route['showformulir/detail'] = 'admin/showformulir/detail/';
$route['showformulir/detail/(:any)'] = 'admin/showformulir/detail/$1';
$route['showformulir/prosescetak/(:any)'] = 'admin/showformulir/prosescetak/$1';
//env
$route['pembayaran'] = 'admin/env/pembayaran/index';
$route['agenda'] = 'admin/env/agenda/index';
$route['kontakadmin'] = 'admin/env/kontakadmin/index';
