<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = 'http://localhost/job.btclbd.com/';
//$config['index_page'] = 'index.php';
$config['index_page'] = '';
$config['uri_protocol']	= 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = 'vendor/autoload.php';
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['allow_get_array'] = TRUE;
$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = 'thu23456789#[n,';
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;
$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();
$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';


//CUSTOM
$config['assets'] = 'assets/';
$config['randomHash'] = 'Nq100YTT65%';

$config['nologo_lg'] = 'nologo_lg.png';
$config['nologo_md'] = 'nologo_md.png';
$config['nologo_sm'] = 'nologo_sm.png';
$config['no_avatar'] = 'no-avatar.jpg';
$config['no_image'] = 'no-image.jpg';
$config['no_image_thumbnail'] = 'no-image-thumbnail.jpg';

$config['roles'] = array(
    '-1' => 'Super Admin',
    '1' => 'Administrator',
    '2' => 'Content Writer'
);
$config['option_yes_no'] = array('0' => 'No', '1' => 'Yes');
$config['option_publish'] = array('0' => 'Unpublished', '1' => 'Published');
$config['option_active'] = array('0' => 'Inactive', '1' => 'Active');

$config['app'] = array(
    'dir_upload' => './upload/',
    'backend' => array(
        'dir_theme' => 'assets/theme-general',
        'base_route' => 'backend',
        'dir_view' => 'backend/'
    ),
);
