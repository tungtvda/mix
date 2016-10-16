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

$actual_link=str_replace('/','',$_SERVER['REQUEST_URI']);
$actual_link=str_replace('mix','',$actual_link);
$actual_link = preg_replace('/[0-9]+/', '', $actual_link);
$actual_link=str_replace('page-','',$actual_link);
$link='';
$active='';
switch($actual_link){

    case 'about-us':
        $id=1;
        $link=SITE_NAME.'/about-us/';
        break;
    case 'why-us':
        $id=2;
        $link=SITE_NAME.'/why-us/';
        break;
    case 'our-service':
        $id=3;
        $link=SITE_NAME.'/our-service/';
        break;
    case 'contact':
        $id=4;
        $link=SITE_NAME.'/contact/';
        break;
    case 'vietnam-visa':
        $id=5;
        $link=SITE_NAME.'/vietnam-visa/';
        $active='Vietnam';
        break;
    case 'terms-conditions':
        $id=6;
        $link=SITE_NAME.'/terms-conditions/';
        break;
    case 'payment-method':
        $id=7;
        $link=SITE_NAME.'/payment-method/';
        break;
    case 'privacy-policy':
        $id=8;
        $link=SITE_NAME.'/privacy-policy/';
        break;
    case 'faq':
        $id=9;
        $link=SITE_NAME.'/faq/';
        break;
    default:
        redict(SITE_NAME);
        break;

}
    $data['info']=info_mix_getById($id);
    if(count($data['info'])==0){
        redict(SITE_NAME);
    }

$title=returnLanguageField('title', $data['info'][0]);
$description=returnLanguageField('keyword', $data['info'][0]);
$keyword=returnLanguageField('keyword', $data['info'][0]);
$banner=$data['info'][0]->img;
$name=returnLanguageField('name', $data['info'][0]);
$url='<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a>';
$url.='<i class="icon-angle-right"></i><span>'.$name.'</span>';
$data['banner']=array(
    'banner_img'=>$banner,
    'name'=>$name,
    'url'=>$url,
    'link'=>$link
);
$data['link_anh']=$data['info'][0]->img;

$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_contact($data);
show_left($data);
show_footer($data);
contact();

