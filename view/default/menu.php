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
    $asign['language']=returnLanguage('language','LANGUAGES');

    $asign['home']=returnLanguageField('name', $data['menu'][0]);
    $asign['Excursion']=returnLanguageField('name', $data['menu'][1]);
     $asign['Vacation']=returnLanguageField('name', $data['menu'][2]);
    $asign['Cruise']=returnLanguageField('name', $data['menu'][3]);
    $asign['Multi']=returnLanguageField('name', $data['menu'][4]);
    $asign['Vietnam']=returnLanguageField('name', $data['menu'][5]);

    $asign['home_mn'] = ($data['active'] == 'home') ? 'current' : '';
    $asign['Excursion_mn'] = ($data['active'] == 'Excursion') ? 'current' : '';
    $asign['Vacation_mn'] = ($data['active'] == 'Vacation') ? 'current' : '';
    $asign['Cruise_mn'] = ($data['active'] == 'Cruise') ? 'current' : '';
    $asign['Multi_mn'] = ($data['active'] == 'Multi') ? 'current' : '';
    $asign['Vietnam_mn'] = ($data['active'] == 'Vietnam') ? 'current' : '';



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
    $asign['danhmuc_subport'] ="";
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
                        </a>
                        <span>|</span>
                        <a href=\"\" class=\"skype_subpport\">
                            <i class=\"icon-skype-1\"></i>
                        </a>
                        <span>|</span>
                        <a href=\"\" class=\"yahoo_subpport\">
                            <i class=\"icon-yahoo\"></i>
                        </a>
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
