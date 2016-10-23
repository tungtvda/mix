<?php
require_once '../../config.php';
require_once DIR.'/model/requestService.php';
require_once DIR.'/view/admin/request.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    returnCountData();
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new request();
            $new_obj->id=$_GET["id"];
            request_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/request.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=request_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/request.php');
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
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_request=request_getByAll();
            foreach($List_request as $request)
            {
                if(isset($_GET["check_".$request->id])) request_delete($request);
            }
            header('Location: '.SITE_NAME.'/controller/admin/request.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["country"])&&isset($_POST["email"])&&isset($_POST["phone"])&&isset($_POST["arrival_date"])&&isset($_POST["departure_date"])&&isset($_POST["adults"])&&isset($_POST["children"])&&isset($_POST["children_under"])&&isset($_POST["length_trip"])&&isset($_POST["tour_style"])&&isset($_POST["destinations"])&&isset($_POST["accommodation"])&&isset($_POST["request"])&&isset($_POST["created"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['country']))
       $array['country']='0';
       if(!isset($array['email']))
       $array['email']='0';
       if(!isset($array['phone']))
       $array['phone']='0';
       if(!isset($array['arrival_date']))
       $array['arrival_date']='0';
       if(!isset($array['departure_date']))
       $array['departure_date']='0';
       if(!isset($array['adults']))
       $array['adults']='0';
       if(!isset($array['children']))
       $array['children']='0';
       if(!isset($array['children_under']))
       $array['children_under']='0';
       if(!isset($array['length_trip']))
       $array['length_trip']='0';
       if(!isset($array['tour_style']))
       $array['tour_style']='0';
       if(!isset($array['destinations']))
       $array['destinations']='0';
       if(!isset($array['accommodation']))
       $array['accommodation']='0';
       if(!isset($array['request']))
       $array['request']='0';
       if(!isset($array['status']))
       $array['status']='0';
       if(!isset($array['created']))
       $array['created']='0';
      $new_obj=new request($array);
        if($insert)
        {
            request_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/request.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            request_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/request.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=request_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=request_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_request($data);
}
else
{
     header('location: '.SITE_NAME);
}
