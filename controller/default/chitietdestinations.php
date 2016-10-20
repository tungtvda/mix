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

$link=link_chitiet_danhmuc_tour;
$actual_link=str_replace($link,'',$_SERVER['REQUEST_URI']);
$actual_link=str_replace('/','',$actual_link);
$actual_link = preg_replace('/[0-9]+/', '', $actual_link);
$actual_link=str_replace('page-','',$actual_link);
if(isset($_GET['Id'])){
    $actual_link= $_GET['Id'];
}
else{
    redict(SITE_NAME);
}
$danhmuc=danhmuc_2_getByTop(1,'name_url="'.$actual_link.'" and danhmuc1_id=6','');
if(count($danhmuc)>0){
    $danhmuc_1=danhmuc_1_getByTop(1,'id='.$danhmuc[0]->danhmuc1_id,'');
   if(count($danhmuc_1)>0)
   {
       $link_dm='';
       $active='';
       $link_dm=SITE_NAME.'/destinations/';

       $dk="danhmuc2_destinations=".$danhmuc[0]->id;
       $data['current']=isset($_GET['page'])?$_GET['page']:'1';
       $data['pagesize']=6;
       $data['count']=tour_count($dk);
       $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
       $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/destinations/'.$danhmuc[0]->name_url.'/');
       $name1=returnLanguageField('name', $danhmuc_1[0]);
       $name2=returnLanguageField('name', $danhmuc[0]);

       $data['banner']=array(
           'banner_img'=>$danhmuc[0]->banner,
           'name'=>returnLanguageField('name', $danhmuc[0]),
           'url'=>'<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a> <i class="icon-angle-right"></i><a  href="'.$link_dm.'">'.$name1.'</a> <i class="icon-angle-right"></i> <span>'.$name2.'</span>'
       );
       $data['link_anh']=$danhmuc[0]->banner;
       $title=returnLanguageField('title', $danhmuc[0]);
       $description=returnLanguageField('keyword', $danhmuc[0]);
       $keyword=returnLanguageField('keyword', $danhmuc[0]);

   }
    else{
        redict(SITE_NAME);
    }
}
else{
    redict(SITE_NAME);
}


$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,'');
show_banner($data);
show_danhmuctour($data);
show_left($data);
show_footer($data);
