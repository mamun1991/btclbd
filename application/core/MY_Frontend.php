<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Frontend extends CI_Controller {

    var $config;
    var $appConfig;

    function __construct(){
        parent::__construct();
        $this->load->model(array('m_settings', 'm_all'));
        
    }

    protected function getAppConfig($themeName){
        $configApp = $this->config->item('app');
		$dirUpload = $configApp['dir_upload'];
        $configTheme = $this->config->item($themeName);
        $themes = $configTheme['dir_theme'];
        $dirUploadLink = substr($dirUpload, 2);
        $appSettings = $this->m_settings->getSettings();
        $appName = $appSettings['app_name'];
        $appDesc = $appSettings['app_desc'];
        $appEmail = $appSettings['app_email'];
        $appLogo = $appSettings['app_logo'];
        $appIcon = $appSettings['app_icon'];
        $appMapLink = $appSettings['app_map_link'];
        $appMetaTag = $appSettings['app_meta_tag'];
        $appMetaDesc = $appSettings['app_meta_desc'];
        $appLinkWA = $appSettings['app_link_wa'];
        $appLinkIG = $appSettings['app_link_ig'];
        $appLinkFB = $appSettings['app_link_fb'];
        $appLinkTWT = $appSettings['app_link_twitter'];
        $appLinkLINKIN = $appSettings['app_link_linkedin'];
        $appAddress = $appSettings['app_address'];
        $appPhoneNumber = $appSettings['app_phone_number'];
        $appFeatSlider = $appSettings['app_feat_slider'];
        $appFeatBlog = $appSettings['app_feat_blog'];
        $appFeatContact = $appSettings['app_feat_contact'];
        $appFeatServices = $appSettings['app_feat_services'];
        $appFeatTestimony = $appSettings['app_feat_testimony'];
        $appFeatMember = $appSettings['app_feat_member'];
        $appFeatPortofolio = $appSettings['app_feat_portofolio'];
        $appFeatPricing = $appSettings['app_feat_pricing'];
        $appIntroStatus = $appSettings['app_intro_status'];
        $appIntroTitle = $appSettings['app_intro_title'];
        $appIntroDesc = $appSettings['app_intro_desc'];
        $appIntroImage = $appSettings['app_intro_image'];
        $appIntroLink1 = $this->getAppLink($appSettings['app_intro_link1']);
        $appIntroLink1_title = $appIntroLink1['title'];
        $appIntroLink1_url = $appIntroLink1['link'];
        $appIntroLink2 = $this->getAppLink($appSettings['app_intro_link2']);
        $appIntroLink2_title = $appIntroLink2['title'];
        $appIntroLink2_url = $appIntroLink2['link'];
        $appColorBgHeader = $appSettings['app_colorbg_header'];
        $appColorBgFooter = $appSettings['app_colorbg_footer'];
        $appColorTextHeader = $appSettings['app_colortext_header'];
        $appColorTextFooter = $appSettings['app_colortext_footer'];

        $appLogo = ($appLogo == '') ? $themes.'img/'.$this->config->item('nologo_lg') : $dirUploadLink.$appLogo;
        $appLogo = base_url().$appLogo;

        $appIcon = ($appIcon == '') ? $themes.'img/'.$this->config->item('nologo_sm') : $dirUploadLink.$appIcon;
        $appIcon = base_url().$appIcon;

        $appIntroImage = ($appIntroImage == '') ? $themes.'img/'.$this->config->item('no_image') : $dirUploadLink.$appIntroImage;
        $appIntroImage = base_url().$appIntroImage;
        
        return array(
            'name' => $appName, 'email' => $appEmail,'desc' => $appDesc, 'logo' => $appLogo, 'icon' => $appIcon, 'meta_tag' => $appMetaTag, 
            'map_link' => $appMapLink, 'meta_desc' => $appMetaDesc, 'link_wa' => $appLinkWA, 'link_ig' => $appLinkIG, 
            'link_fb' => $appLinkFB, 'link_twitter' => $appLinkTWT, 'link_linkedin' => $appLinkLINKIN, 'address' => $appAddress, 'phone_number' => $appPhoneNumber,
            'feat_slider' => $appFeatSlider, 'feat_blog' => $appFeatBlog, 'feat_contact' => $appFeatContact, 
            'feat_services' => $appFeatServices, 'feat_testimony' => $appFeatTestimony, 
            'feat_member' => $appFeatMember, 'feat_portofolio' => $appFeatPortofolio, 'feat_pricing' => $appFeatPricing,
            'intro_status' => $appIntroStatus, 'intro_title' => $appIntroTitle, 'intro_desc' => $appIntroDesc,
            'intro_image' => $appIntroImage, 'intro_link1' => $appIntroLink1, 'intro_link2' => $appIntroLink2, 
            'intro_link1_title' => $appIntroLink1_title, 'intro_link1_url' => $appIntroLink1_url,
            'intro_link2_title' => $appIntroLink2_title, 'intro_link2_url' => $appIntroLink2_url,
            'colorbg_header' => $appColorBgHeader, 'colorbg_footer' => $appColorBgFooter,
            'colortext_header' => $appColorTextHeader, 'colortext_footer' => $appColorTextFooter
        );
    }

    private function getAppLink($value = ''){
        $data = json_decode($value, true);
        return $data;
    }

    protected function template($config = array()){
        $configApp = $this->config->item('app');
        $themeName = $config['themeName'];
        $configTheme = $this->config->item($themeName);
        $cfgDirView = $configTheme['dir_view'];
        $fileView = $config['fileView'];
        $data = $config;
        $data['view'] = $cfgDirView.'/'.$fileView;
        $app = $this->getAppConfig($themeName);
        $data['app_settings'] = $app;
        
        $this->load->view($cfgDirView.'/template/index.php', $data);
    }
}
