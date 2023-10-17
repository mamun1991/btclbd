<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$configApp = $this->config->item('app');
$cfgDir = $configApp['backend']['dir_view'];
$cfgRoute = $configApp['backend']['base_route'];

$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home/tpl1'] = 'home/index';

$route['submit-contact'] = 'home/doSubmitContact';

$route[$cfgRoute.'/logout'] = $cfgDir.'Login/dologout';

$route[$cfgRoute.'/blog'] = $cfgDir.'FBlog/index';
$route[$cfgRoute.'/blog/(:num)'] = $cfgDir.'FBlog/index/$1';
$route[$cfgRoute.'/blog/add'] = $cfgDir.'FBlog/add';
$route[$cfgRoute.'/blog/view/(:any)'] = $cfgDir.'FBlog/view/$1';
$route[$cfgRoute.'/blog/edit/(:any)'] = $cfgDir.'FBlog/edit/$1';
$route[$cfgRoute.'/blog/delete/(:any)'] = $cfgDir.'FBlog/delete/$1';
$route[$cfgRoute.'/blog/save'] = $cfgDir.'FBlog/save';

$route[$cfgRoute.'/contact'] = $cfgDir.'FContact/index';
$route[$cfgRoute.'/contact/(:num)'] = $cfgDir.'FContact/index/$1';
$route[$cfgRoute.'/contact/add'] = $cfgDir.'FContact/add';
$route[$cfgRoute.'/contact/view/(:any)'] = $cfgDir.'FContact/view/$1';
$route[$cfgRoute.'/contact/edit/(:any)'] = $cfgDir.'FContact/edit/$1';
$route[$cfgRoute.'/contact/delete/(:any)'] = $cfgDir.'FContact/delete/$1';
$route[$cfgRoute.'/contact/save'] = $cfgDir.'FContact/save';

$route[$cfgRoute.'/portofolio'] = $cfgDir.'FPortofolio/index';
$route[$cfgRoute.'/portofolio/(:num)'] = $cfgDir.'FPortofolio/index/$1';
$route[$cfgRoute.'/portofolio/add'] = $cfgDir.'FPortofolio/add';
$route[$cfgRoute.'/portofolio/view/(:any)'] = $cfgDir.'FPortofolio/view/$1';
$route[$cfgRoute.'/portofolio/edit/(:any)'] = $cfgDir.'FPortofolio/edit/$1';
$route[$cfgRoute.'/portofolio/delete/(:any)'] = $cfgDir.'FPortofolio/delete/$1';
$route[$cfgRoute.'/portofolio/save'] = $cfgDir.'FPortofolio/save';

$route[$cfgRoute.'/services'] = $cfgDir.'FServices/index';
$route[$cfgRoute.'/services/(:num)'] = $cfgDir.'FServices/index/$1';
$route[$cfgRoute.'/services/add'] = $cfgDir.'FServices/add';
$route[$cfgRoute.'/services/view/(:any)'] = $cfgDir.'FServices/view/$1';
$route[$cfgRoute.'/services/edit/(:any)'] = $cfgDir.'FServices/edit/$1';
$route[$cfgRoute.'/services/delete/(:any)'] = $cfgDir.'FServices/delete/$1';
$route[$cfgRoute.'/services/save'] = $cfgDir.'FServices/save';

$route[$cfgRoute.'/slider'] = $cfgDir.'FSlider/index';
$route[$cfgRoute.'/slider/(:num)'] = $cfgDir.'FSlider/index/$1';
$route[$cfgRoute.'/slider/add'] = $cfgDir.'FSlider/add';
$route[$cfgRoute.'/slider/view/(:any)'] = $cfgDir.'FSlider/view/$1';
$route[$cfgRoute.'/slider/edit/(:any)'] = $cfgDir.'FSlider/edit/$1';
$route[$cfgRoute.'/slider/delete/(:any)'] = $cfgDir.'FSlider/delete/$1';
$route[$cfgRoute.'/slider/save'] = $cfgDir.'FSlider/save';

$route[$cfgRoute.'/team'] = $cfgDir.'FTeam/index';
$route[$cfgRoute.'/team/(:num)'] = $cfgDir.'FTeam/index/$1';
$route[$cfgRoute.'/team/add'] = $cfgDir.'FTeam/add';
$route[$cfgRoute.'/team/view/(:any)'] = $cfgDir.'FTeam/view/$1';
$route[$cfgRoute.'/team/edit/(:any)'] = $cfgDir.'FTeam/edit/$1';
$route[$cfgRoute.'/team/delete/(:any)'] = $cfgDir.'FTeam/delete/$1';
$route[$cfgRoute.'/team/save'] = $cfgDir.'FTeam/save';

$route[$cfgRoute.'/testimony'] = $cfgDir.'FTestimony/index';
$route[$cfgRoute.'/testimony/(:num)'] = $cfgDir.'FTestimony/index/$1';
$route[$cfgRoute.'/testimony/add'] = $cfgDir.'FTestimony/add';
$route[$cfgRoute.'/testimony/view/(:any)'] = $cfgDir.'FTestimony/view/$1';
$route[$cfgRoute.'/testimony/edit/(:any)'] = $cfgDir.'FTestimony/edit/$1';
$route[$cfgRoute.'/testimony/delete/(:any)'] = $cfgDir.'FTestimony/delete/$1';
$route[$cfgRoute.'/testimony/save'] = $cfgDir.'FTestimony/save';

$route[$cfgRoute.'/pricing'] = $cfgDir.'FPricing/index';
$route[$cfgRoute.'/pricing/(:num)'] = $cfgDir.'FPricing/index/$1';
$route[$cfgRoute.'/pricing/add'] = $cfgDir.'FPricing/add';
$route[$cfgRoute.'/pricing/view/(:any)'] = $cfgDir.'FPricing/view/$1';
$route[$cfgRoute.'/pricing/edit/(:any)'] = $cfgDir.'FPricing/edit/$1';
$route[$cfgRoute.'/pricing/delete/(:any)'] = $cfgDir.'FPricing/delete/$1';
$route[$cfgRoute.'/pricing/save'] = $cfgDir.'FPricing/save';

//echo '<pre>'.print_r($route, 1).'</pre>';