<?php
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/locdautiengviet.php';

function view_menu($data = array())
{
    $asign = array();
//    print_r()

    $asign['email']=$data['config'][0]->Email;
    $asign['Logo']=$data['config'][0]->Logo;
    $asign['Name']=$data['config'][0]->Name;
    $asign['monday_saturday']=returnLanguage('monday_saturday','Monday to Saturday');
    $asign['online_support']=returnLanguage('online_support','Monday to Saturday');
    $asign['language']=returnLanguage('language','LANGUAGES');

    $asign['home']=returnLanguageField('name', $data['menu'][0]);
    $asign['Excursion']=returnLanguageField('name', $data['menu'][1]);
     $asign['Vacation']=returnLanguageField('name', $data['menu'][2]);
    $asign['Cruise']=returnLanguageField('name', $data['menu'][3]);
    $asign['Multi']=returnLanguageField('name', $data['menu'][4]);
    $asign['Vietnam']=returnLanguageField('name', $data['menu'][5]);
    $asign['new']=returnLanguageField('name', $data['menu'][6]);

    $asign['home_mn'] = ($data['active'] == 'home') ? 'current' : '';
    $asign['Excursion_mn'] = ($data['active'] == 'Excursion') ? 'current' : '';
    $asign['Vacation_mn'] = ($data['active'] == 'Vacation') ? 'current' : '';
    $asign['Cruise_mn'] = ($data['active'] == 'Cruise') ? 'current' : '';
    $asign['Multi_mn'] = ($data['active'] == 'Multi') ? 'current' : '';
    $asign['Vietnam_mn'] = ($data['active'] == 'Vietnam') ? 'current' : '';
    $asign['new_mn'] = ($data['active'] == 'news') ? 'current' : '';



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
    $asign['new_menu'] ="";
    if(count($data['new_menu'])>0)
    {
        $asign['new_menu'] = print_item('menu', $data['new_menu']);
    }
    $asign['danhmuc_subport'] ="";
    $asign['danhmuc_subport_top'] ="";
    if(count($data['danhmuc_subport'])>0)
    {
        foreach($data['danhmuc_subport'] as $dmtour1) {
            $id_dmtour2 = "danhmuc_id=" . $dmtour1->id;
            $data['subport'] = subport_getByTop('', $id_dmtour2, 'id desc');
            if (count($data['subport']) > 0) {
                $asign['danhmuc_subport'] .= " <div class=\"nicdark_space10\"></div><div class=\"nicdark_focus\">
                <label class=\"lable_subpport\">".returnLanguageField('name', $dmtour1)."</label>

                <div class=\"nicdark_space10\"></div>
                <ul class=\"subpport\">";
                foreach($data['subport'] as $subport) {
                    $asign['danhmuc_subport'] .= "<li>
                        <a href='tel:$subport->phone_format' class=\"mobi_subpport\">
                            <i class=\"icon-mobile\"></i>".$subport->phone."
                        </a>";
                    if($subport->skype!='')
                    {
                        $asign['danhmuc_subport'] .= " <a style='margin-left:10px' href=\"intent://send/$subport->skype#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end\" class=\"skype_subpport\">
                            <img src='".SITE_NAME."/view/default/themes/images/whatsapp.png' style='width:30px'>
                        </a>";
                    }

                    if($subport->yahoo!='')
                    {
                        $asign['danhmuc_subport'] .= "<a style='margin-left:10px' href=\"viber://add?number=$subport->yahoo\" class=\"yahoo_subpport\">
                             <img src='".SITE_NAME."/view/default/themes/images/viber.ico' style='width:30px'>
                        </a>";
                    }

                     $asign['danhmuc_subport'] .= "</li>";

                    $asign['danhmuc_subport_top'] .="<li>
                                            <i class=\"icon-phone\"></i> <a class=\"white title\" href=\"tel:$subport->phone\">$subport->phone_format</a>
                                            <span class=\"greydark2 nicdark_marginright10 nicdark_marginleft10 vc_hidden-sm vc_hidden-xs\">|</span>
                                        </li>";
                }

                $asign['danhmuc_subport'] .= "</ul>

            </div><div class=\"nicdark_space10\"></div>";
            }


        }
    }

    if($_SESSION['language']=="cn"){
        $asign['lang'] ="cn";
    }
    else{
        $asign['lang'] ="en";
    }
    print_template($asign, 'menu');
}
