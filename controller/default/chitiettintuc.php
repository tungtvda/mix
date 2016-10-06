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
echo $_GET['Id'];
exit;
if(isset($_GET['Id']))
{
    $name_url=addslashes($_GET['Id']);
    $data['news']=news_getByTop('','name_url="'.$name_url.'"','');
    if(count($data['news'])==0){
        redict(SITE_NAME);
    }
}
else{
    redict(SITE_NAME);
}
$title=returnLanguageField('title', $data['news'][0]);
$description=returnLanguageField('keyword', $data['news'][0]);
$keyword=returnLanguageField('keyword', $data['news'][0]);
$url='';
$danhmuc1=danhmuc_1_getByTop(1,'id="'.$data['news'][0]->danhmuc_id.'"','');
if(count($danhmuc1)){
    $banner=$danhmuc1[0]->img;
    $name_dm1=returnLanguageField('name', $data['menu'][6]);
    $link_dm1=SITE_NAME.'/news/';
    $name_dm2=returnLanguageField('name', $danhmuc1[0]);
    $link_dm2=SITE_NAME.'/news/'.$danhmuc1[0]->name_url.'/';
    $url.='<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a>';
    $url.='<i class="icon-angle-right"></i><a  href="'.$link_dm1.'">'.$name_dm1.'</a>';
    $url.='<i class="icon-angle-right"></i><a  href="'.$link_dm2.'">'.$name_dm2.'</a>';
}
else{
    redict(SITE_NAME);
}

$name_dm1=returnLanguageField('name', $data['tour'][0]);
$data['banner']=array(
    'banner_img'=>$banner,
    'name'=>$name_dm1,
    'url'=>$url
);

$data['tour_noibat']=tour_getByTop(6,'id!='.$data['tour'][0]->id.' and DanhMuc1Id='.$data['tour'][0]->DanhMuc1Id,'id desc');
$data['link_anh']=$data['tour'][0]->img;

$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_chitiettintuc($data);
show_left($data);
show_footer($data);
