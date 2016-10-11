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
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
//

//echo $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$dk="";
$data['current']=isset($_GET['page'])?$_GET['page']:'1';
$data['pagesize']=6;
$data['count']=video_count($dk);
$data['danhsach']=video_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
$data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/videos/');
$name=returnLanguageField('name', $data['menu'][10]);
$data['banner']=array(
    'banner_img'=>$data['menu'][10]->img,
    'name'=>returnLanguageField('name', $data['menu'][10]),
    'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
);
$img_banner=$data['menu'][10]->img;
$title=returnLanguageField('title', $data['menu'][10]);
$description=returnLanguageField('keyword', $data['menu'][10]);
$keyword=returnLanguageField('keyword', $data['menu'][10]);
$active="Excursion";
$img_banner='';

$data['link_anh']=$img_banner;

$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_videos($data);
show_left($data);
show_footer($data);
