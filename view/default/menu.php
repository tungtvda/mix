<?php
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/locdautiengviet.php';

function view_menu($data = array())
{
    $asign = array();
//    print_r()
    $asign['email']=$data['config'][0]->Email;
    $asign['monday_saturday']=returnLanguage('monday_saturday','Monday to Saturday');
    $asign['home']=returnLanguageField('name', $data['menu'][0]);
    $asign['Excursion']=returnLanguageField('name', $data['menu'][1]);
     $asign['Vacation']=returnLanguageField('name', $data['menu'][2]);
    $asign['Cruise']=returnLanguageField('name', $data['menu'][3]);
    $asign['Multi']=returnLanguageField('name', $data['menu'][4]);
    $asign['Vietnam']=returnLanguageField('name', $data['menu'][5]);
//    $data['config']=$data['config'];
//    $data['active']=$data;
//    $data['menu']=$data['menu'];
    print_template($asign, 'menu');
}
