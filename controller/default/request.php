<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}

require_once DIR.'/controller/default/public.php';
require_once DIR . '/common/paging.php';
require_once DIR . '/common/redict.php';
require_once DIR . '/common/class.phpmailer.php';
require_once(DIR . "/common/Mail.php");
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
//
$data['country']=countries_getByTop('','','country_name asc');
$link=SITE_NAME.'/tour-request-form/';

$title=returnLanguageField('title', $data['menu'][12]);
$description=returnLanguageField('keyword', $data['menu'][12]);
$keyword=returnLanguageField('keyword', $data['menu'][12]);
$banner=$data['menu'][12]->img;
$name=returnLanguageField('name', $data['menu'][12]);
$url='<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a>';
$url.='<i class="icon-angle-right"></i><span>'.$name.'</span>';
$data['banner']=array(
    'banner_img'=>$banner,
    'name'=>$name,
    'url'=>$url,
    'link'=>$link
);
$data['link_anh']=$data['menu'][12]->img;


$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_request($data);
show_left($data);
show_footer($data);
//contact();
if(isset($_POST['name_contact'])){
    $name=addslashes(strip_tags($_POST['name_contact']));
    $mr=addslashes(strip_tags($_POST['mr']));
    $country=addslashes(strip_tags($_POST['country']));
    $email=addslashes(strip_tags($_POST['email']));
    $phone=addslashes(strip_tags($_POST['phone']));

    $arrival_date=addslashes(strip_tags($_POST['arrival_date']));
    $departure_date=addslashes(strip_tags($_POST['departure_date']));
    $adults=addslashes(strip_tags($_POST['adults']));
    $children=addslashes(strip_tags($_POST['children']));
    $children_under=addslashes(strip_tags($_POST['children_under']));
    $length=addslashes(strip_tags($_POST['length']));

    $tour_style_string='';
    $tour_type=$_POST['tour_type'];
    if(count($tour_type)>0)
    {
        foreach($tour_type as $row){
            $tour_style_string.=addslashes(strip_tags($row)).' </br>';
        }
    }
    $destinations_string='';
    $destinations=$_POST['destinations'];
    if(count($destinations)>0)
    {
        foreach($destinations as $row_d){
            $destinations_string.=addslashes(strip_tags($row_d)).' </br>';
        }
    }
    $accommodation=addslashes(strip_tags($_POST['accommodation']));
    $message_contact=addslashes(strip_tags($_POST['message_contact']));

    $new = new request();
    $new->name=$mr.$name;
    $new->country=$country;
    $new->email=$email;
    $new->phone=$phone;
    $new->arrival_date=$arrival_date;
    $new->departure_date=$departure_date;
    $new->adults=$adults;
    $new->children=$children;
    $new->children_under=$children_under;
    $new->length_trip=$length;
    $new->tour_style=$tour_style_string;
    $new->destinations=$destinations_string;
    $new->accommodation=$accommodation;
    $new->request=$message_contact;
    $new->status=0;
    $new->created=date(DATETIME_FORMAT);
    request_insert($new);
    echo "<script>alert('Request successfully')</script>";



}

