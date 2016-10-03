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
switch($actual_link){
    case 'excursion-tours':
        $dk="DanhMuc1Id=2";
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=5;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/'.$_GET['Id'].'/');
        break;
}

$title=($data['menu'][0]->title)?$data['menu'][0]->title:'APT TRAVEL Viet Nam';
$description=($data['menu'][0]->description)?$data['menu'][0]->description:'APT TRAVEL Viet Nam';
$keywords=($data['menu'][0]->keyword)?$data['menu'][0]->keyword:'APT TRAVEL Viet Nam';
show_header($title,$description,$keywords,$data);
show_menu($data,'home');
//show_slide($data);
show_danhmuctour($data);
show_footer($data);
