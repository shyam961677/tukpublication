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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin-login'] = 'admin/login/index';
$route['admin-authenticate'] = 'admin/login/authenticate';
$route['admin-logout'] = 'admin/login/logout';
$route['admin-dashboard'] = 'admin/dashboard/index';

$route['admin-list'] = 'admin/admin/index';
$route['create-admin'] = 'admin/admin/create';
$route['store-admin'] = 'admin/admin/store';
$route['edit-admin/(:num)'] = 'admin/admin/edit/$1';   
$route['delete-admin/(:num)'] = 'admin/admin/delete/$1'; 
$route['update-admin'] = 'admin/admin/update'; 
$route['show-admin/(:num)'] = 'admin/admin/show/$1'; 

$route['user-list'] = 'admin/users/index';
$route['create-user'] = 'admin/users/create';
$route['store-user'] = 'admin/users/store';
$route['edit-user/(:num)'] = 'admin/users/edit/$1';   
$route['delete-user/(:num)'] = 'admin/users/delete/$1'; 
$route['update-user'] = 'admin/users/update'; 
$route['show-user/(:num)'] = 'admin/users/show/$1'; 
$route['get-states'] = 'admin/users/get_states';
$route['get-cities'] = 'admin/users/get_cities';

$route['import-user'] = 'admin/users/import';
$route['import-store'] = 'admin/users/importStore';

$route['user-role'] = 'admin/role/index';
$route['create-role'] = 'admin/role/create';
$route['store-role'] = 'admin/role/store';
$route['edit-role/(:num)'] = 'admin/role/edit/$1';   
$route['delete-role/(:num)'] = 'admin/role/delete/$1'; 
$route['update-role'] = 'admin/role/update';   
$route['assign-permissions/(:num)'] = 'admin/role/assign_permissions/$1';        
$route['save-permissions'] = 'admin/role/save_permissions';        

$route['modules-list'] = 'admin/modules/index';
$route['create-modules'] = 'admin/modules/create';
$route['store-modules'] = 'admin/modules/store';  
$route['edit-modules/(:num)'] = 'admin/modules/edit/$1';   
$route['delete-modules/(:num)'] = 'admin/modules/delete/$1'; 
$route['update-modules'] = 'admin/modules/update'; 

$route['action-list'] = 'admin/modules/actionList';
$route['create-action'] = 'admin/modules/createAction';
$route['store-action'] = 'admin/modules/storeAction';  
$route['edit-action/(:num)'] = 'admin/modules/editAction/$1';   
$route['delete-action/(:num)'] = 'admin/modules/deleteAction/$1'; 
$route['update-action'] = 'admin/modules/updateAction';        

$route['category-list'] = 'admin/category/index';
$route['category-create'] = 'admin/category/create';
$route['category-store'] = 'admin/category/store';
$route['delete-category/(:num)'] = 'admin/category/deleteCategry/$1'; 
$route['edit-category/(:num)'] = 'admin/category/editCategry/$1';   
$route['category-update'] = 'admin/category/update';

$route['articles-list'] = 'admin/articles/index';
$route['articles-create'] = 'admin/articles/create';
$route['articles-store'] = 'admin/articles/store';
$route['delete-articles/(:num)'] = 'admin/articles/deleteCategry/$1'; 
$route['edit-articles/(:num)'] = 'admin/articles/editCategry/$1';   
$route['articles-update'] = 'admin/articles/update';


/*---------------------User End---------------------------------*/

