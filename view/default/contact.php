<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_contact($data = array())
{
    $asign = array();
//
    $asign['img']= $data['info'][0]->img;
//    $asign['created']= $data['info'][0]->created;
    $asign['name_dm']= $data['banner']['name'];
    $asign['link']= $data['banner']['link'];
    $asign['content']=returnLanguageField('content', $data['info'][0]);
////
////
////
//    $asign['related_rticles']=returnLanguage('related_rticles','Related articles');
//    $asign['new_left']=returnLanguage('new_left','News');
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

    $asign['hanoi_office']=returnLanguage('hanoi_office','HANOI OFFICE');
    $asign['hcm_office']=returnLanguage('hcm_office','HOCHIMINH CITY OFFICE');
    $asign['email']=returnLanguage('email','email');
    $asign['address']=returnLanguage('address','Address');
    $asign['phone']=returnLanguage('phone','Phone');
    $asign['message']=returnLanguage('message','Message');
    $asign['name']=returnLanguage('name','Name');
    $asign['contact_us']=returnLanguage('contact_us','CONTACT US');
    $asign['send']=returnLanguage('send','Please fill in contact information');
    print_template($asign, 'contact');
}



