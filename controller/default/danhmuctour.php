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
    case 'excursion-tours':
        $dk="DanhMuc1Id=2";
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=6;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/excursion-tours/');
        $name=returnLanguageField('name', $data['menu'][1]);
        $data['banner']=array(
            'banner_img'=>$data['menu'][1]->img,
            'name'=>returnLanguageField('name', $data['menu'][1]),
            'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
        );
        $img_banner=$data['menu'][1]->img;
        $title=returnLanguageField('title', $data['menu'][1]);
        $description=returnLanguageField('keyword', $data['menu'][1]);
        $keyword=returnLanguageField('keyword', $data['menu'][1]);
        $active="Excursion";
        break;
    case 'vacation-packages':
        $dk="DanhMuc1Id=3";
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=6;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/vacation-packages/');
        $name=returnLanguageField('name', $data['menu'][2]);
        $data['banner']=array(
            'banner_img'=>$data['menu'][2]->img,
            'name'=>returnLanguageField('name', $data['menu'][2]),
            'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
        );
        $img_banner=$data['menu'][2]->img;
        $title=returnLanguageField('title', $data['menu'][2]);
        $description=returnLanguageField('keyword', $data['menu'][2]);
        $keyword=returnLanguageField('keyword', $data['menu'][2]);
        $active="Vacation";
        break;
    case 'cruise-tours':
        $dk="DanhMuc1Id=4";
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=6;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/cruise-tours/');
        $name=returnLanguageField('name', $data['menu'][3]);
        $data['banner']=array(
            'banner_img'=>$data['menu'][3]->img,
            'name'=>returnLanguageField('name', $data['menu'][3]),
            'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
        );
        $img_banner=$data['menu'][3]->img;
        $title=returnLanguageField('title', $data['menu'][3]);
        $description=returnLanguageField('keyword', $data['menu'][3]);
        $keyword=returnLanguageField('keyword', $data['menu'][3]);
        $active="Cruise";
        break;
    case 'multi-country':
        $dk="DanhMuc1Id=5";
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=6;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/multi-country/');
        $name=returnLanguageField('name', $data['menu'][4]);
        $data['banner']=array(
            'banner_img'=>$data['menu'][4]->img,
            'name'=>returnLanguageField('name', $data['menu'][4]),
            'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
        );
        $img_banner=$data['menu'][4]->img;
        $title=returnLanguageField('title', $data['menu'][4]);
        $description=returnLanguageField('keyword', $data['menu'][4]);
        $keyword=returnLanguageField('keyword', $data['menu'][4]);
        $active="Multi";
        break;
    case 'destinations':
        $dk="danhmuc1_destinations=6";
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=6;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/destinations/');
        $name=returnLanguageField('name', $data['menu'][5]);
        $data['banner']=array(
            'banner_img'=>$data['menu'][5]->img,
            'name'=>returnLanguageField('name', $data['menu'][5]),
            'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
        );
        $img_banner=$data['menu'][5]->img;
        $title=returnLanguageField('title', $data['menu'][5]);
        $description=returnLanguageField('keyword', $data['menu'][5]);
        $keyword=returnLanguageField('keyword', $data['menu'][5]);
        $active="Multi";
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
