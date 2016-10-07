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

if(count($_GET)==1){
    if(isset($_GET['departure']))
    {
        $field_not=$_GET['departure'];
        $field=mb_strtolower(addslashes(strip_tags($_GET['departure'])));
        $dk='name LIKE "%' . $field . '%"';
        $data['danhsach']=tour_getByTop('',$dk,'id desc');
        $data['danhsach_news']=news_getByTop('',$dk,'id desc');
        $key=$field;
    }
    else{
        redict(SITE_NAME);
    }
}
else{
//    $dk='id >0 ';
//    if(isset())
    $data['danhsach_news']=array();
    $data['danhsach'];
    $field_not='';
}
$name=returnLanguageField('name', $data['menu'][7]);
$data['banner']=array(
    'banner_img'=>$data['menu'][7]->img,
    'name'=>returnLanguageField('name', $data['menu'][7]),
    'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i> <span>'.$name.'</span>'
);
$img_banner=$data['menu'][7]->img;
$title=returnLanguageField('title', $data['menu'][7]);
$description=returnLanguageField('keyword', $data['menu'][7]);
$keyword=returnLanguageField('keyword', $data['menu'][7]);
$active="";

$data['link_anh']=$img_banner;
$resul_tour=returnLanguage('search_resul_tour','Search Results for');
$resul_news=returnLanguage('search_resul_news','Search Results for');
$data['search_resul_tour']=$resul_tour.' " <span style="color: red"> '.$field_not.'</span> "';
$data['search_resul_news']=$resul_news.' " <span style="color: red"> '.$field_not.'</span> "';
$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_search($data);
show_left($data);
show_footer($data);
