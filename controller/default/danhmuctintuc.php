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
$data['tour_PROMOTIONS']=tour_getByTop(3,'promotion=1 ','id desc');

$data['tour_packages_list']=tour_getByTop(5,'packages=1 ','id desc');

$data['tour_DESTINATIONS']=danhmuc_2_getByTop(6,'danhmuc1_id=6 ','position desc');


//echo $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$actual_link=str_replace('/','',$_SERVER['REQUEST_URI']);
$actual_link=str_replace('mix','',$actual_link);
$actual_link = preg_replace('/[0-9]+/', '', $actual_link);
$actual_link=str_replace('page-','',$actual_link);
$img_banner='';
switch($actual_link){
    case 'news':
        $dk="";
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=6;
        $data['count']=news_count($dk);
        $data['danhsach']=news_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/news/');
        $name=returnLanguageField('name', $data['menu'][6]);
        $data['banner']=array(
            'banner_img'=>$data['menu'][6]->img,
            'name'=>returnLanguageField('name', $data['menu'][6]),
            'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
        );
        $img_banner=$data['menu'][6]->img;
        $title=returnLanguageField('title', $data['menu'][6]);
        $description=returnLanguageField('keyword', $data['menu'][6]);
        $keyword=returnLanguageField('keyword', $data['menu'][6]);
        $active="news";
        break;
}
$data['link_anh']=$img_banner;

$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_danhmuctintuc($data);
show_left($data);
show_footer($data);
