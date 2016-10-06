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
$danhmuc=danhmuc_2_getByTop(1,'name_url="'.$actual_link.'"','');
if(count($danhmuc)>0){
    $danhmuc_1=danhmuc_1_getByTop(1,'id='.$danhmuc[0]->danhmuc1_id,'');
   if(count($danhmuc_1)>0)
   {
       $link_dm='';
       $active='';
       switch($danhmuc_1[0]->id)
       {
           case 2:
               $link_dm=SITE_NAME.'/excursion-tours/';
               $active="Excursion";
               break;
           case 3:
               $link_dm=SITE_NAME.'/vacation-packages/';
               $active="Vacation";
               break;
           case 4:
               $link_dm=SITE_NAME.'/cruise-tours/';
               $active="Cruise";
               break;
           case 5:
               $link_dm=SITE_NAME.'/multi-country/';
               $active="Multi";
               break;
           case 6:
               $link_dm=SITE_NAME.'/destinations/';
               break;
       }
//        echo $danhmuc[0]->id;
//       exit;
       $dk="DanhMuc2Id=".$danhmuc[0]->id;
       $data['current']=isset($_GET['page'])?$_GET['page']:'1';
       $data['pagesize']=3;
       $data['count']=tour_count($dk);
       $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
       $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/tour/'.$danhmuc[0]->name_url.'/');
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
show_menu($data,$active);
show_banner($data);
show_danhmuctour($data);
show_left($data);
show_footer($data);
