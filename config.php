<?php

/**
 * @author vdbkpro
 * @copyright 2013
 */
require_once 'language/en.php';
define("SITE_NAME", "http://localhost/mix");
define("DIR", dirname(__FILE__));
define('SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','mix');
define('CACHE',false);
define('DATETIME_FORMAT',"y-m-d H:i:s");
define('PRIVATE_KEY','hoidinhnvbk');
define('link_chitiet_danhmuc_tour','/mix/tour/');
session_start();
require_once DIR.'/common/minifi.output.php';
ob_start("minify_output");

//require_once 'language/en.php';
//define("SITE_NAME", "http://mixtourist.com");
//define("DIR", dirname(__FILE__));
//define('SERVER','localhost');
//define('DB_USERNAME','dulichado_mixcom');
//define('DB_PASSWORD','tAZDG1dcl');
//define('DB_NAME','dulichado_mixcom');
//define('CACHE',false);
//define('DATETIME_FORMAT',"y-m-d H:i:s");
//define('PRIVATE_KEY','hoidinhnvbk');
//define('link_chitiet_danhmuc_tour','/tour/');
//session_start();
//require_once DIR.'/common/minifi.output.php';
//ob_start("minify_output");

require_once DIR.'/model/contactService.php';
require_once DIR.'/model/requestService.php';
require_once DIR.'/model/booking_tourService.php';

function _returnGetParamSecurity($param)
{
    if (isset($_GET[$param])) {
        $param_val = addslashes(strip_tags($_GET[$param]));
        return $param_val;
    } else {
        return '';
    }
}

if(isset($_SESSION['lang']))
{
    if($_SESSION['lang']==1)
    {
        $_SESSION['language']="en";
    }
    else
    {
        $_SESSION['language']="cn";
    }
}
else
{
    $_SESSION['language']="en";
}

function returnLanguage($file_new,$file_old=''){

    $lang=$_SESSION['language'];
    if (file_exists('language/'.$lang.'.php')) {
        require_once('language/'.$lang.'.php');
    }
    else{
        require_once('language/en.php');
    }
    require_once('language/cn.php');
    $langClass="language_".$lang;
    $lang_objec = new $langClass;
    $lang_arr=$lang_objec->returnLang();
    if(isset($lang_arr[$file_new])){
        return $lang_arr[$file_new];
    }
    else{
        return $file_old;
    }
}
function returnLanguageField($field, $data){
    if($_SESSION['language']=="en"){
        return $data->$field;
    }
    else{
        $lang=$field.'_cn';
        return $data->$lang;
    }
}
function returnSearchDeparture(){
    $data['data']=tour_getByTop('','','departure asc');
    $data_arr=array();
    foreach($data['data'] as $row)
    {
        if(!in_array($row->departure,$data_arr)){
            array_push($data_arr,$row->departure);
        }
    }
    $string='';
    if(count($data_arr)>0){
        foreach($data_arr as $val){
            if($val!='')
            {
                $string .="<option value=\"".$val."\">".$val."</option>";
            }
        }
    }
    return $string;
}

function returnSearchDestination(){
    $data['data']=tour_getByTop('','','destination asc');
    $data_arr=array();
    foreach($data['data'] as $row)
    {
        if(!in_array($row->destination,$data_arr)){
            array_push($data_arr,$row->destination);
        }
    }
    $string='';
    if(count($data_arr)>0){
        foreach($data_arr as $val){
            if($val!='')
            {
                $string .="<option value=\"".$val."\">".$val."</option>";
            }
        }
    }
    return $string;
}

function returnSearchDurations(){
    $data['data']=tour_getByTop('','','durations asc');
    $data_arr=array();
    foreach($data['data'] as $row)
    {
        $name=returnLanguageField('durations', $row);
        if(!in_array($name,$data_arr)){
            array_push($data_arr,$name);
        }
    }
    $string='';
    if(count($data_arr)>0){
        foreach($data_arr as $val){
            if($val!='')
            {
                $string .="<option value=\"".$val."\">".$val."</option>";
            }
        }
    }
    return $string;
}
function returnSearchVehicle(){
    $data['data']=tour_getByTop('','','vehicle asc');
    $data_arr=array();
    foreach($data['data'] as $row)
    {
        $name=returnLanguageField('vehicle', $row);
        if(!in_array($name,$data_arr)){
            array_push($data_arr,$name);
        }
    }
    $string='';
    if(count($data_arr)>0){
        foreach($data_arr as $val){
            if($val!='')
            {
                $string .="<option value=\"".$val."\">".$val."</option>";
            }
        }
    }
    return $string;
}
function returnSearchHotel(){
    $data['data']=tour_getByTop('','','hotel asc');
    $data_arr=array();
    foreach($data['data'] as $row)
    {
        if(!in_array($row->hotel,$data_arr)){
            array_push($data_arr,$row->hotel);
        }
    }
    $string='';
    if(count($data_arr)>0){
        foreach($data_arr as $val){
            if($val!='')
            {
                $string .="<option value=\"".$val."\">".$val."</option>";
            }
        }
    }
    return $string;
}
function returnArrSearch($table, $field){
    $data['data']=tour_getByTop('','',$field.' asc');
    $data_arr=array();
    foreach($data['data'] as $row)
    {
        $name=returnLanguageField($field, $row);
        if(!in_array($name,$data_arr)){
            array_push($data_arr,$name);
        }
    }
    $string='';
    if(count($data_arr)>0){
        foreach($data_arr as $val){
            if($val!='')
            {
                $string .="<option value=\"".$val."\">".$val."</option>";
            }

        }
    }
    return $string;
}
function returnStart($number)
{
    $string='<i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i>';
    switch($number){
        case 1:
            $string='<i class="icon-star"></i><i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i>';
            break;
        case 2:
            $string='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i>';
            break;
        case 3:
            $string='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star" style="color: #dedada;"></i><i class="icon-star" style="color: #dedada;"></i>';
            break;
        case 4:
            $string='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star" style="color: #dedada;"></i>';
            break;
        case 5:
            $string='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>';
            break;

    }
    return $string;
}
function contact()
{
    if (isset($_POST['name_contact'])) {

        $ten=addslashes(strip_tags($_POST['name_contact']));

        $email=addslashes(strip_tags($_POST['email_contact']));
        $dienthoai=addslashes(strip_tags($_POST['phone_contact']));
        $diachi=addslashes(strip_tags($_POST['address_contact']));
        $noidung=addslashes(strip_tags($_POST['message_contact']));
        if($ten==""||$email==""||$dienthoai=="")
        {
            $mes=returnLanguage('mess_contact','Please fill in contact information');
            echo "<script>alert('$mes')</script>";
        }
        else
        {
            $new = new contact();
            $new->name_kh=$ten;
            $new->email=$email;
            $new->phone=$dienthoai;
            $new->address=$diachi;
            $new->content=$noidung;
            $new->status=0;
            $new->created=date(DATETIME_FORMAT);
            contact_insert($new);
//            $new = new booking_tour();
//
//            $new->tour_id=$ten;
//            $new->name_tour=$email;
//            $new->name_customer=$diachi;
//            $new->language=$dienthoai;
//            $new->email=$noidung;
//            $new->phone=$noidung;
//            $new->address=$noidung;
//            $new->departure_day=$noidung;
//            $new->adults=$noidung;
//            $new->children_5_10=$noidung;
//            $new->children_5=$noidung;
//            $new->price=$noidung;
//            $new->price_children=$noidung;
//            $new->price_children_under_5=$noidung;
//            $new->total_price=$noidung;
//            $new->request=$noidung;
//            $new->status=$noidung;
//            $new->created=date(DATETIME_FORMAT);
//            booking_tour_insert($new);

            $link_web=SITE_NAME;
            $mes=returnLanguage('contact_suc','Contact successfully');

            $message="";
            $subject = "mixtourist.com – Notifications customer contact";
            $message .='<div style="float: left; width: 100%">

                            <p>Tên khách hàng: <span style="color: #132fff; font-weight: bold">'.$ten.'</span>,</p>
                            <p>Email: <span style="color: #132fff; font-weight: bold">'.$email.'</span>,</p>
                            <p>Số điện thoại: <span style="color: #132fff; font-weight: bold">'.$dienthoai.'</span>,</p>
                            <p>Địa chỉ: <span style="color: #132fff; font-weight: bold">'.$diachi.'</span>,</p>
                            <p>Ngày gửi: <span style="color: #132fff; font-weight: bold">'.date(DATETIME_FORMAT).'</span>,</p>
                            <p>'.$noidung.'</p>


                        </div>';
            SendMail('sales@mixtourist.com', $message, $subject);
            echo "<script>alert('$mes')</script>";

            echo "<script>window.location.href='$link_web';</script>";

        }

    }
}
function returnCountData(){
    $count_contact=contact_count('status=0');
    $_SESSION['contact']=$count_contact;
    $count_request=request_count('status=0');
    $_SESSION['request']=$count_request;
    $count_booking=booking_tour_count('status=0');
    $_SESSION['booking']=$count_booking;
}