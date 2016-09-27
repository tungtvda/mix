<?php
require_once '../../config.php';
require_once DIR.'/model/languageService.php';
require_once DIR.'/view/admin/language.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new language();
            $new_obj->id=$_GET["id"];
            language_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/language.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=language_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/language.php');
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
            $List_language=language_getByAll();
            foreach($List_language as $language)
            {
                if(isset($_GET["check_".$language->id])) language_delete($language);
            }
            header('Location: '.SITE_NAME.'/controller/admin/language.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["code"])&&isset($_POST["icon"])&&isset($_POST["active"])&&isset($_POST["default_lang"])&&isset($_POST["currency"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['code']))
       $array['code']='0';
       if(!isset($array['icon']))
       $array['icon']='0';
       if(!isset($array['active']))
       $array['active']='0';
       if(!isset($array['default_lang']))
       $array['default_lang']='0';
       if(!isset($array['currency']))
       $array['currency']='0';
      $new_obj=new language($array);
        if($insert)
        {
            language_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/language.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            language_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/language.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=language_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=language_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_language($data);
}
else
{
     header('location: '.SITE_NAME);
}
