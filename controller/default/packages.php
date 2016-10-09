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
    case 'packages':
        $dk="packages=1";
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=6;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/packages/');
        $name=returnLanguageField('name', $data['menu'][8]);
        $data['banner']=array(
            'banner_img'=>$data['menu'][8]->img,
            'name'=>returnLanguageField('name', $data['menu'][8]),
            'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
        );
        $img_banner=$data['menu'][8]->img;
        $title=returnLanguageField('title', $data['menu'][8]);
        $description=returnLanguageField('keyword', $data['menu'][8]);
        $keyword=returnLanguageField('keyword', $data['menu'][8]);
        $active="Excursion";
        break;
    case 'promotions':
        $dk="promotion=1";
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=6;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/promotions/');
        $name=returnLanguageField('name', $data['menu'][9]);
        $data['banner']=array(
            'banner_img'=>$data['menu'][9]->img,
            'name'=>returnLanguageField('name', $data['menu'][9]),
            'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
        );
        $img_banner=$data['menu'][9]->img;
        $title=returnLanguageField('title', $data['menu'][9]);
        $description=returnLanguageField('keyword', $data['menu'][9]);
        $keyword=returnLanguageField('keyword', $data['menu'][9]);
        $active="Excursion";
        break;


    default:
        redict(SITE_NAME);

}
$data['link_anh']=$img_banner;

$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_danhmuctour($data);
show_left($data);
show_footer($data);
