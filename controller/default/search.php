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

if(count($_GET)==1){
    if(isset($_GET['departure']))
    {
        $field_not=$_GET['departure'];
        $field=mb_strtolower(addslashes(strip_tags($_GET['departure'])));
        $dk='name LIKE "%' . $field . '%" or price LIKE "%' . $field . '%" or name_url LIKE "%' . $field . '%" or durations LIKE "%' . $field . '%" or departure LIKE "%' . $field . '%" or destination LIKE "%' . $field . '%" or inclusion LIKE "%' . $field . '%" or summary LIKE "%' . $field . '%" or highlights LIKE "%' . $field . '%"   ';
        $demkt=0;
        $dk_fil='name LIKE "%'.mb_strtolower(addslashes(strip_tags($_GET['departure']))).'%"';
        $data_style=danhmuc_2_getByTop('',$dk_fil,'');
        $arr_push=array();
        foreach($data_style as $row_style){
            array_push($arr_push,$row_style->id);
        }
        $tring_se=implode(',',$arr_push);
        if(count($data_style)>0){
            $dk.=" or DanhMuc2Id in ($tring_se)";
        }
        $dk_fil2='name LIKE "%'.mb_strtolower(addslashes(strip_tags($_GET['departure']))).'%"';

        $data_style_1=danhmuc_1_getByTop('',$dk_fil2,'');
        $arr_push_1=array();
        foreach($data_style_1 as $row_style_1){
            array_push($arr_push_1,$row_style_1->id);
        }
        $tring_se_1=implode(',',$arr_push_1);
        if(count($data_style_1)>0){
            $dk.=" or DanhMuc1Id in ($tring_se_1)";
        }


        $data['danhsach']=tour_getByTop('',$dk,'id desc');
        $dk_new='name LIKE "%' . $field . '%"';
        $data['danhsach_news']=news_getByTop('',$dk_new,'id desc');
        $key=$field;
    }
    else{
        redict(SITE_NAME);
    }
}
else{
    $demkt=1;
    $dk='';
    $field_not='';
    if(isset($_GET['departure'])&&$_GET['departure']!=""){
        $dk_fil='name LIKE "%'.mb_strtolower(addslashes(strip_tags($_GET['departure']))).'%"';
        $data_style=danhmuc_2_getByTop('',$dk_fil,'');
        $arr_push=array();
       foreach($data_style as $row_style){
            array_push($arr_push,$row_style->id);
        }
        $tring_se=implode(',',$arr_push);
        if(count($data_style)>0){
            $dk.=" DanhMuc2Id in ($tring_se)";

            $demkt=$demkt+1;
        }
        $dk_fil2='name LIKE "%'.mb_strtolower(addslashes(strip_tags($_GET['departure']))).'%"';

        $data_style_1=danhmuc_1_getByTop('',$dk_fil2,'');
        $arr_push_1=array();
        foreach($data_style_1 as $row_style_1){
            array_push($arr_push_1,$row_style_1->id);
        }
        $tring_se_1=implode(',',$arr_push_1);
        if(count($data_style_1)>0){
            if($demkt==1)
            {
                $dk.=" DanhMuc1Id in ($tring_se_1)";
                $demkt=$demkt+1;
            }
            else{
                $dk.=" or DanhMuc1Id in ($tring_se_1)";
                $demkt=$demkt+1;
            }

        }
        $field_not=returnLanguage('departure_detail','Style').' = '.$_GET['departure'];
    }
    if(isset($_GET['destination'])&&$_GET['destination']!=''){
        if($demkt==1)
        {
            $dk .=' destination LIKE "%'.mb_strtolower(addslashes(strip_tags($_GET['destination']))).'%"';
            $field_not.=returnLanguage('destination_detail','Destination').' = '.$_GET['destination'];
            $demkt=$demkt+1;
        }
        else
        {

            $dk .=' and  destination LIKE "%'.mb_strtolower(addslashes(strip_tags($_GET['destination']))).'%"';
            $field_not.=' and '.returnLanguage('destination_detail','Destination').' = '.$_GET['destination'];
        }
    }
    if(isset($_GET['duration'])&&$_GET['duration']!==''){
        if($_GET['duration']==1)
        {
            $dk .=' durations ="1 day" or durations="1/2 day"';
        }
        else{
            $dk .=' durations LIKE "%'.mb_strtolower(addslashes(strip_tags($_GET['duration']))).'%"';
        }
        if($demkt==1)
        {
            $field_not.=returnLanguage('durations','Duration').' = '.$_GET['duration'];
            $demkt=$demkt+1;
        }
        else
        {

            $dk .=' and '.$dk;
            $field_not.=' and '.returnLanguage('durations','Duration').' = '.$_GET['duration'];
        }
    }
    if(isset($_GET['price_from_to'])&&$_GET['price_from_to']!=''){
        if($_SESSION['language']=="cn"){
            $field="price_cn";
        }
        else{
            $field="price";
        }
        $ar_exlode=explode('-',$_GET['price_from_to']);
        if(isset($ar_exlode[0])&&isset($ar_exlode[1])){
            $field0=mb_strtolower(addslashes(strip_tags($ar_exlode[0])));
            $field1=mb_strtolower(addslashes(strip_tags($ar_exlode[1])));
            $find=" $field0 <= $field and $field <= $field1";
        }
        else{
            $field0=mb_strtolower(addslashes(strip_tags($ar_exlode[0])));
            $find="  $field = $field0";
        }
        if($demkt==1)
        {
            $dk .=$find;
            $field_not.=returnLanguage('price','Price').' = '.$_GET['price_from_to'];
            $demkt=$demkt+1;
        }
        else
        {

            $dk .=' and '.$find;
            $field_not.=' and '.returnLanguage('price','Price').' = '.$_GET['price_from_to'];
        }
    }

    $data['danhsach_news']=array();
    $data['danhsach']=tour_getByTop('',$dk,'id desc');
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
