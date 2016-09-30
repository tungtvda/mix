<?php
require_once DIR . '/view/default/public.php';
function view_footer($data = array())
{
    $asign = array();
//    $asign['tag'] = "";
//    if(count($data['tag'])>0)
//    {
//        $asign['tag'] = print_item('tag', $data['tag']);
//    }
//    $asign['Link_ft'] = "";
//    if(count($data['Link_ft'])>0)
//    {
//        $asign['Link_ft'] = print_item('tag', $data['Link_ft']);
//    }
//
//    $asign['hotline'] = "";
//    if(count($data['hotline'])>0)
//    {
//        $asign['hotline'] = print_item('hotline', $data['hotline']);
//    }
//    $asign['truso'] = "";
//    if(count($data['truso'])>0)
//    {
//        $asign['truso'] = print_item('truso', $data['truso']);
//    }
//
//    $asign['Logo'] = $data['config'][0]->Logo;
//    $asign['Name'] = $data['config'][0]->Name;
//    $asign['Address'] = $data['config'][0]->Address;
//    $asign['Phone'] = $data['config'][0]->Phone;
//    $asign['Email'] = $data['config'][0]->Email;
//    $asign['Fax'] = $data['config'][0]->Fax;
//    if(isset($_SESSION['user_id']))
//    {
//        $asign['menu_user']=' <li><a href="'.SITE_NAME.'/tai-khoan.html"> hi: '.$_SESSION['user_name'].' </a></li>
//        <li><a href="'.SITE_NAME.'/cam-nhan.html"> Comments </a></li>
//        <li><a href="'.SITE_NAME.'/dang-xuat.html"> Logout </a></li>';
//
//    }
//    else{
//        $asign['menu_user']=' <li><a href="'.SITE_NAME.'/dang-ky.html"> Register </a> | <a href="'.SITE_NAME.'/dang-nhap.html"> Login </a></li>';
//    }
    print_template($asign, 'footer');
}
