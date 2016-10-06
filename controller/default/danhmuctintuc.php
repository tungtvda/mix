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

if(isset($_GET['Id']))
{
    $danhmuc_new=danhmuc_tintuc_getByTop('','name_url="'.$_GET['Id'].'"','');
    if(count($danhmuc_new)==0)
    {
        redict(SITE_NAME);
    }
    $dk="danhmuc_id=".$danhmuc_new[0]->id;
    $data['current']=isset($_GET['page'])?$_GET['page']:'1';
    $data['pagesize']=3;
    $data['count']=news_count($dk);
    $data['danhsach']=news_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
    $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/news/'.$danhmuc_new[0]->name_url.'/');
    $name_dm=returnLanguageField('name', $data['menu'][6]);
    $name=returnLanguageField('name', $danhmuc_new[0]);
    $data['banner']=array(
        'banner_img'=>$danhmuc_new[0]->img,
        'name'=>returnLanguageField('name', $danhmuc_new[0]),
        'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a><i class="icon-angle-right"></i><a  href="'.SITE_NAME.'/news/">'.$name_dm.'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
    );
    $img_banner=$danhmuc_new[0]->img;
    $title=returnLanguageField('title', $danhmuc_new[0]);
    $description=returnLanguageField('keyword', $danhmuc_new[0]);
    $keyword=returnLanguageField('keyword', $danhmuc_new[0]);
    $active="news";
}
else{
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
