<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	http://codeigniter.com/user_guide/general/routing.html
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

$route['About'] = "About";
$route['about'] = "About";
$route['Contact'] = "Contact";
$route['contact'] = "Contact";

$route['Services'] = "Services";
$route['services'] = "Services";


//$route['Services/(:any);"'] = "Services/getService/$1";
//$route['services/(:any);"'] = "Services/getService/$1";

$route['Services/getService/(:any);"'] = "Services/getService/$1";
$route['services/getService/(:any);"'] = "Services/getService/$1";


////$route['Deals'] = "Deals";
//$route['deals'] = "Deals";
$route['Courses'] = "Courses";
$route['courses'] = "Courses";
$route['categories'] = "Categories";
$route['Categories'] = "Categories";
$route['login'] = "Login";
$route['Login'] = "Login";
$route['login/validate_credentials'] = "Login/validate_credentials";
$route['Login/validate_credentials'] = "Login/validate_credentials";

$route['mlbs_home'] = "Mlbs_home";
$route['Mlbs_home'] = "Mlbs_home";

$route['mlbs_home/edit/(:any);"'] = "Mlbs_home/edit/$1";
$route['Mlbs_home/edit/(:any);"'] = "Mlbs_home/edit/$1";


$route['mlbs_about'] = "Mlbs_about";
$route['Mlbs_about'] = "Mlbs_about";

$route['mlbs_contact'] = "Mlbs_contact";
$route['Mlbs_contact'] = "Mlbs_contact";


$route['mlbs_contact/edit/(:any);'] = "Mlbs_contact/edit/$1";
$route['Mlbs_contact/edit/(:any);'] = "Mlbs_contact/edit/$1";





$route['mlbs_categories'] = "Mlbs_categories";
$route['Mlbs_categories'] = "Mlbs_categories";
$route['mlbs_categories/'] = "Mlbs_categories/";
$route['Mlbs_categories/'] = "Mlbs_categories/";


$route['mlbs_categories/edit/(:any);"'] = "Mlbs_categories/edit/$1";
$route['Mlbs_categories/edit/(:any);"'] = "Mlbs_categories/edit/$1";


$route['mlbs_imgList'] = "Mlbs_imgList";
$route['Mlbs_imgList'] = "Mlbs_imgList";

$route['mlbs_services'] = "Mlbs_services";
$route['Mlbs_services'] = "Mlbs_services";
$route['mlbs_services/edit/(:any);"'] = "Mlbs_services/edit/$1";
$route['Mlbs_services/edit/(:any);"'] = "Mlbs_services/edit/$1";

$route['mlbs_deals'] = "Mlbs_deals";
$route['Mlbs_deals'] = "Mlbs_deals";
$route['mlbs_deals/edit/(:any);"'] = "Mlbs_deals/edit/$1";
$route['Mlbs_deals/edit/(:any);"'] = "Mlbs_deals/edit/$1";
$route['mlbs_deals/add_deals/(:any);'] = "Mlbs_deals/add_deals/$1";
$route['Mlbs_deals/add_deals/(:any);'] = "Mlbs_deals/add_deals/$1";



$route['mlbs_courses'] = "Mlbs_courses";
$route['Mlbs_courses'] = "Mlbs_courses";


$route[''] = "Home";
$route['/'] = "Home";
$route['Home'] = "Home";
$route['home'] = "Home";
$route['default_controller'] = 'Home';
$route['404_override'] = 'yy';
$route['translate_uri_dashes'] = FALSE;
