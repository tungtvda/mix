<?php
require_once '../../config.php';
require_once DIR.'/model/infoService.php';
require_once DIR.'/view/admin/info.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new info();
            $new_obj->id=$_GET["id"];
            info_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/info.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=info_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/info.php');
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
            $List_info=info_getByAll();
            foreach($List_info as $info)
            {
                if(isset($_GET["check_".$info->id])) info_delete($info);
            }
            header('Location: '.SITE_NAME.'/controller/admin/info.php');
        }
    }
    if(isset($_POST["id_lang"])&&isset($_POST["about_us"])&&isset($_POST["title_about"])&&isset($_POST["keyword_about"])&&isset($_POST["description_about"])&&isset($_POST["why_us"])&&isset($_POST["title_why"])&&isset($_POST["keyword_why"])&&isset($_POST["description_why"])&&isset($_POST["our_services"])&&isset($_POST["title_services"])&&isset($_POST["keyword_services"])&&isset($_POST["description_services"])&&isset($_POST["terms_conditions"])&&isset($_POST["title_conditions"])&&isset($_POST["keyword_conditions"])&&isset($_POST["description_conditions"])&&isset($_POST["payment_method"])&&isset($_POST["title_"])&&isset($_POST["keyword_"])&&isset($_POST["description_"])&&isset($_POST["privacy_policy"])&&isset($_POST["title_policy"])&&isset($_POST["keyword_policy"])&&isset($_POST["description_policy"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['id_lang']))
       $array['id_lang']='0';
       if(!isset($array['about_us']))
       $array['about_us']='0';
       if(!isset($array['title_about']))
       $array['title_about']='0';
       if(!isset($array['keyword_about']))
       $array['keyword_about']='0';
       if(!isset($array['description_about']))
       $array['description_about']='0';
       if(!isset($array['why_us']))
       $array['why_us']='0';
       if(!isset($array['title_why']))
       $array['title_why']='0';
       if(!isset($array['keyword_why']))
       $array['keyword_why']='0';
       if(!isset($array['description_why']))
       $array['description_why']='0';
       if(!isset($array['our_services']))
       $array['our_services']='0';
       if(!isset($array['title_services']))
       $array['title_services']='0';
       if(!isset($array['keyword_services']))
       $array['keyword_services']='0';
       if(!isset($array['description_services']))
       $array['description_services']='0';
       if(!isset($array['terms_conditions']))
       $array['terms_conditions']='0';
       if(!isset($array['title_conditions']))
       $array['title_conditions']='0';
       if(!isset($array['keyword_conditions']))
       $array['keyword_conditions']='0';
       if(!isset($array['description_conditions']))
       $array['description_conditions']='0';
       if(!isset($array['payment_method']))
       $array['payment_method']='0';
       if(!isset($array['title_']))
       $array['title_']='0';
       if(!isset($array['keyword_']))
       $array['keyword_']='0';
       if(!isset($array['description_']))
       $array['description_']='0';
       if(!isset($array['privacy_policy']))
       $array['privacy_policy']='0';
       if(!isset($array['title_policy']))
       $array['title_policy']='0';
       if(!isset($array['keyword_policy']))
       $array['keyword_policy']='0';
       if(!isset($array['description_policy']))
       $array['description_policy']='0';
      $new_obj=new info($array);
        if($insert)
        {
            info_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/info.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            info_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/info.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=info_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=info_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_info($data);
}
else
{
     header('location: '.SITE_NAME);
}
