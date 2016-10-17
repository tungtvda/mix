<?php
require_once DIR . '/view/default/public.php';
function view_footer($data = array())
{
    $asign = array();

    $asign['Logo'] = $data['config'][0]->Logo;
    $asign['Name'] = $data['config'][0]->Name;

    $asign['Address'] = $data['config'][0]->Address;
    $asign['Phone'] = $data['config'][0]->Phone;
    $asign['Hotline'] = $data['config'][0]->Hotline;
    $asign['Email'] = $data['config'][0]->Email;
    $asign['Fax'] = $data['config'][0]->fax;

    $asign['Address_hcm'] = $data['config'][0]->Address_hcm;
    $asign['Phone_hcm'] = $data['config'][0]->Phone_hcm;
    $asign['Hotline_hcm'] = $data['config'][0]->Hotline_hcm;
    $asign['Fax_hcm'] = $data['config'][0]->fax_hcm;
    $asign['Email_hcm'] = $data['config'][0]->Email_hcm;

    $asign['twitter'] = $data['mangxahoi'][0]->twitter;
    $asign['youtube'] = $data['mangxahoi'][0]->youtube;
    $asign['facebook'] = $data['mangxahoi'][0]->facebook;
    $asign['google'] = $data['mangxahoi'][0]->google;
    $asign['rss'] = $data['mangxahoi'][0]->rss;

    $asign['contact_via']=returnLanguage('contact_via','Contact us via Social Network');

    $asign['about_us']=returnLanguage('about_us','About us');
    $asign['why_us']=returnLanguage('why_us','Why us');
    $asign['our_service']=returnLanguage('our_service','Our services');
    $asign['contact_footer']=returnLanguage('contact_us','Contact');

    $asign['mix_tourist']=returnLanguage('mix_tourist','Mix Tourist');

    $asign['customer_service']=returnLanguage('customer_service','Customer service');
    $asign['vietnam_visa']=returnLanguage('vietnam_visa','Vietnam visa');
    $asign['terms_codi']=returnLanguage('terms_codi','Terms and conditions');
    $asign['payment_method']=returnLanguage('payment_method','Payment Method');
    $asign['privacy_policy']=returnLanguage('privacy_policy','Privacy Policy');

    $asign['useful_links']=returnLanguage('useful_links','Privacy Policy');
    $asign['hanoi_office']=returnLanguage('hanoi_office','HANOI OFFICE');
    $asign['hcm_office']=returnLanguage('hcm_office','HOCHIMINH CITY OFFICE');
    $asign['faq']=returnLanguage('faq','FAQ');

    $asign['link'] = "";
    if(count($data['link'])>0)
    {
        $asign['link'] = print_item('link', $data['link']);
    }
    print_template($asign, 'footer');
}
