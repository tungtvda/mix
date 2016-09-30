<?php
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/locdautiengviet.php';

function view_menu($data = array())
{
    $asign = array();
//    print_r()
    $asign['email']=$data['config'][0]->Email;
    $asign['monday_saturday']=returnLanguage('monday_saturday','Monday to Saturday');
    $asign['online_support']=returnLanguage('online_support','Monday to Saturday');

    $asign['home']=returnLanguageField('name', $data['menu'][0]);
    $asign['Excursion']=returnLanguageField('name', $data['menu'][1]);
     $asign['Vacation']=returnLanguageField('name', $data['menu'][2]);
    $asign['Cruise']=returnLanguageField('name', $data['menu'][3]);
    $asign['Multi']=returnLanguageField('name', $data['menu'][4]);
    $asign['Vietnam']=returnLanguageField('name', $data['menu'][5]);

    $asign['Excursion_menu'] ="";
    if(count($data['Excursion_menu'])>0)
    {
        $asign['Excursion_menu'] = print_item('menu', $data['Excursion_menu']);
    }

    $asign['Vacation_menu'] ="";
    if(count($data['Vacation_menu'])>0)
    {
        $asign['Vacation_menu'] = print_item('menu', $data['Vacation_menu']);
    }
    $asign['Cruise_menu'] ="";
    if(count($data['Cruise_menu'])>0)
    {
        $asign['Cruise_menu'] = print_item('menu', $data['Cruise_menu']);
    }
    $asign['Multi_menu'] ="";
    if(count($data['Multi_menu'])>0)
    {
        $asign['Multi_menu'] = print_item('menu', $data['Multi_menu']);
    }
    $asign['Vietnam_menu'] ="";
    if(count($data['Vietnam_menu'])>0)
    {
        $asign['Vietnam_menu'] = print_item('menu', $data['Vietnam_menu']);
    }

//    $data['config']=$data['config'];
//    $data['active']=$data;
//    $data['menu']=$data['menu'];
    print_template($asign, 'menu');
}
