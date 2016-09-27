<?php
require_once '../../config.php';
require_once DIR.'/model/danhmuc_subportService.php';
require_once DIR.'/view/admin/danhmuc_subport.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new danhmuc_subport();
            $new_obj->id=$_GET["id"];
            danhmuc_subport_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_subport.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=danhmuc_subport_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/danhmuc_subport.php');
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
            $List_danhmuc_subport=danhmuc_subport_getByAll();
            foreach($List_danhmuc_subport as $danhmuc_subport)
            {
                if(isset($_GET["check_".$danhmuc_subport->id])) danhmuc_subport_delete($danhmuc_subport);
            }
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_subport.php');
        }
    }
    if(isset($_POST["lang_id"])&&isset($_POST["name"])&&isset($_POST["position"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['lang_id']))
       $array['lang_id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['position']))
       $array['position']='0';
      $new_obj=new danhmuc_subport($array);
        if($insert)
        {
            danhmuc_subport_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_subport.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            danhmuc_subport_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_subport.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=danhmuc_subport_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=danhmuc_subport_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_danhmuc_subport($data);
}
else
{
     header('location: '.SITE_NAME);
}
