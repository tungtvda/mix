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
contact();

