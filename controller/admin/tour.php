<?php
require_once '../../config.php';
require_once DIR.'/model/tourService.php';
require_once DIR.'/model/danhmuc_1Service.php';
require_once DIR.'/model/danhmuc_2Service.php';
require_once DIR.'/view/admin/tour.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new tour();
            $new_obj->id=$_GET["id"];
            tour_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/tour.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=tour_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/tour.php');
        }
        else
        {
            $data['tab1_class']='default-tab current';
        }
    }
    else
    {
        $data['tab1_class']='default-tab current';
    }
    $data['listfkey']['DanhMuc1Id']=danhmuc_1_getByAll();
    $data['listfkey']['DanhMuc2Id']=danhmuc_2_getByAll();
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_tour=tour_getByAll();
            foreach($List_tour as $tour)
            {
                if(isset($_GET["check_".$tour->id])) tour_delete($tour);
            }
            header('Location: '.SITE_NAME.'/controller/admin/tour.php');
        }
    }
    if(isset($_POST["DanhMuc1Id"])&&isset($_POST["DanhMuc2Id"])&&isset($_POST["name"])&&isset($_POST["name_cn"])&&isset($_POST["name_url"])&&isset($_POST["img"])&&isset($_POST["price"])&&isset($_POST["price_cn"])&&isset($_POST["durations"])&&isset($_POST["durations_cn"])&&isset($_POST["departure"])&&isset($_POST["destination"])&&isset($_POST["departure_time"])&&isset($_POST["vehicle"])&&isset($_POST["vehicle_en"])&&isset($_POST["hotel"])&&isset($_POST["schedule"])&&isset($_POST["schedule_cn"])&&isset($_POST["price_list"])&&isset($_POST["price_list_cn"])&&isset($_POST["content"])&&isset($_POST["content_cn"])&&isset($_POST["list_img"])&&isset($_POST["title"])&&isset($_POST["title_cn"])&&isset($_POST["keyword"])&&isset($_POST["keyword_cn"])&&isset($_POST["description"])&&isset($_POST["description_cn"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['DanhMuc1Id']))
       $array['DanhMuc1Id']='0';
       if(!isset($array['DanhMuc2Id']))
       $array['DanhMuc2Id']='0';
       if(!isset($array['promotion']))
       $array['promotion']='0';
       if(!isset($array['packages']))
       $array['packages']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['name_cn']))
       $array['name_cn']='0';
       if(!isset($array['name_url']))
       $array['name_url']='0';
       if(!isset($array['img']))
       $array['img']='0';
       if(!isset($array['price']))
       $array['price']='0';
       if(!isset($array['price_cn']))
       $array['price_cn']='0';
       if(!isset($array['durations']))
       $array['durations']='0';
       if(!isset($array['durations_cn']))
       $array['durations_cn']='0';
       if(!isset($array['departure']))
       $array['departure']='0';
       if(!isset($array['destination']))
       $array['destination']='0';
       if(!isset($array['departure_time']))
       $array['departure_time']='0';
       if(!isset($array['vehicle']))
       $array['vehicle']='0';
       if(!isset($array['vehicle_en']))
       $array['vehicle_en']='0';
       if(!isset($array['hotel']))
       $array['hotel']='0';
       if(!isset($array['schedule']))
       $array['schedule']='0';
       if(!isset($array['schedule_cn']))
       $array['schedule_cn']='0';
       if(!isset($array['price_list']))
       $array['price_list']='0';
       if(!isset($array['price_list_cn']))
       $array['price_list_cn']='0';
       if(!isset($array['content']))
       $array['content']='0';
       if(!isset($array['content_cn']))
       $array['content_cn']='0';
       if(!isset($array['list_img']))
       $array['list_img']='0';
       if(!isset($array['title']))
       $array['title']='0';
       if(!isset($array['title_cn']))
       $array['title_cn']='0';
       if(!isset($array['keyword']))
       $array['keyword']='0';
       if(!isset($array['keyword_cn']))
       $array['keyword_cn']='0';
       if(!isset($array['description']))
       $array['description']='0';
       if(!isset($array['description_cn']))
       $array['description_cn']='0';
      $new_obj=new tour($array);
        if($insert)
        {
            tour_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/tour.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            tour_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/tour.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=tour_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=tour_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_tour($data);
}
else
{
     header('location: '.SITE_NAME);
}
