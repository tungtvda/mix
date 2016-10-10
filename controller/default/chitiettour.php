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

 $link_action=$_SERVER['REQUEST_URI'];
$string_check= strchr($link_action,"/news/");
if($string_check!='')
{

    if(isset($_GET['Id']))
    {
        $name_url=addslashes(str_replace('news/','',$_GET['Id']));
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
    $danhmuc1=danhmuc_tintuc_getByTop(1,'id="'.$data['news'][0]->danhmuc_id.'"','');
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
    $active='news';
    $name_dm1=returnLanguageField('name', $data['news'][0]);
    $data['banner']=array(
        'banner_img'=>$banner,
        'name'=>$name_dm1,
        'url'=>$url
    );

    $data['tour_noibat']=news_getByTop(6,'id!='.$data['news'][0]->id.' and danhmuc_id='.$data['news'][0]->danhmuc_id,'id desc');
    $data['link_anh']=$data['news'][0]->img;
}
else{
    if(isset($_GET['Id']))
    {
        $name_url=addslashes($_GET['Id']);
        $data['tour']=tour_getByTop('','name_url="'.$name_url.'"','');
        if(count($data['tour'])==0){
            redict(SITE_NAME);
        }
    }
    else{
        redict(SITE_NAME);
    }
    $title=returnLanguageField('title', $data['tour'][0]);
    $description=returnLanguageField('keyword', $data['tour'][0]);
    $keyword=returnLanguageField('keyword', $data['tour'][0]);

    $danhmuc1=danhmuc_1_getByTop(1,'id="'.$data['tour'][0]->DanhMuc1Id.'" and id!=1','');
    $danhmuc2=danhmuc_2_getByTop(1,'id="'.$data['tour'][0]->DanhMuc2Id.'" and id!=1','');
    $url='<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a>';
    $active='';
    if(count($danhmuc1)>0){
        switch($data['tour'][0]->DanhMuc1Id)
        {
            case 2:
                $link_dm1=SITE_NAME.'/excursion-tours/';
                $active="Excursion";
                $id_menu=1;
                break;
            case 3:
                $link_dm1=SITE_NAME.'/vacation-packages/';
                $active="Vacation";
                $id_menu=2;
                break;
            case 4:
                $link_dm1=SITE_NAME.'/cruise-tours/';
                $active="Cruise";
                $id_menu=3;
                break;
            case 5:
                $link_dm1=SITE_NAME.'/multi-country/';
                $active="Multi";
                $id_menu=4;
                break;
            case 6:
                $link_dm1=SITE_NAME.'/destinations/';
                break;
        }
        $banner=$data['menu'][$danhmuc1[0]->id]->img;
        $name_dm1=returnLanguageField('name', $data['menu'][$id_menu]);
        $url.='<i class="icon-angle-right"></i><a  href="'.$link_dm1.'">'.$name_dm1.'</a>';
    }
    else{
        redict(SITE_NAME);
    }
;
    if(count($danhmuc2)>0){
        $banner=$danhmuc2[0]->banner;
        $name_dm1=returnLanguageField('name', $danhmuc2[0]);
        $link_dm2=SITE_NAME.'/tour/'.$danhmuc2[0]->name_url.'/';
        $url.='<i class="icon-angle-right"></i><a  href="'.$link_dm2.'">'.$name_dm1.'</a>';
    }
    $name_dm1=returnLanguageField('name', $data['tour'][0]);
    $data['banner']=array(
        'banner_img'=>$banner,
        'name'=>$name_dm1,
        'url'=>$url
    );

    $data['tour_noibat']=tour_getByTop(6,'id!='.$data['tour'][0]->id.' and DanhMuc1Id='.$data['tour'][0]->DanhMuc1Id,'id desc');
    $data['link_anh']=$data['tour'][0]->img;
}





$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
if($string_check!='')
{

    show_chitiettintuc($data);
}
else{
    show_chitiettour($data);
}

show_left($data);
show_footer($data);
