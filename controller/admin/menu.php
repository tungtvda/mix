<?php
require_once '../../config.php';
require_once DIR.'/model/menuService.php';
require_once DIR.'/view/admin/menu.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new menu();
            $new_obj->id=$_GET["id"];
            menu_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/menu.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=menu_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/menu.php');
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
            $List_menu=menu_getByAll();
            foreach($List_menu as $menu)
            {
                if(isset($_GET["check_".$menu->id])) menu_delete($menu);
            }
            header('Location: '.SITE_NAME.'/controller/admin/menu.php');
        }
    }
    if(isset($_POST["lang_id"])&&isset($_POST["home"])&&isset($_POST["title"])&&isset($_POST["keyword"])&&isset($_POST["description"])&&isset($_POST["excursion_tours"])&&isset($_POST["excursion_tours_img"])&&isset($_POST["title_excursion"])&&isset($_POST["keyword_excursion"])&&isset($_POST["description_excursion"])&&isset($_POST["vacation_packages"])&&isset($_POST["vacation_packages_img"])&&isset($_POST["title_vacation"])&&isset($_POST["keyword_vacation"])&&isset($_POST["description_vacation"])&&isset($_POST["cruise_tours"])&&isset($_POST["cruise_tours_img"])&&isset($_POST["title_cruise"])&&isset($_POST["keyword_cruise"])&&isset($_POST["description_cruise"])&&isset($_POST["multi_country"])&&isset($_POST["multi_country_img"])&&isset($_POST["title_country"])&&isset($_POST["keyword_country"])&&isset($_POST["description_country"])&&isset($_POST["vietnam_visa"])&&isset($_POST["vietnam_visa_img"])&&isset($_POST["title_vietnam_visa"])&&isset($_POST["keyword_vietnam_visa"])&&isset($_POST["description_vietnam_visa"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['lang_id']))
       $array['lang_id']='0';
       if(!isset($array['home']))
       $array['home']='0';
       if(!isset($array['title']))
       $array['title']='0';
       if(!isset($array['keyword']))
       $array['keyword']='0';
       if(!isset($array['description']))
       $array['description']='0';
       if(!isset($array['excursion_tours']))
       $array['excursion_tours']='0';
       if(!isset($array['excursion_tours_img']))
       $array['excursion_tours_img']='0';
       if(!isset($array['title_excursion']))
       $array['title_excursion']='0';
       if(!isset($array['keyword_excursion']))
       $array['keyword_excursion']='0';
       if(!isset($array['description_excursion']))
       $array['description_excursion']='0';
       if(!isset($array['vacation_packages']))
       $array['vacation_packages']='0';
       if(!isset($array['vacation_packages_img']))
       $array['vacation_packages_img']='0';
       if(!isset($array['title_vacation']))
       $array['title_vacation']='0';
       if(!isset($array['keyword_vacation']))
       $array['keyword_vacation']='0';
       if(!isset($array['description_vacation']))
       $array['description_vacation']='0';
       if(!isset($array['cruise_tours']))
       $array['cruise_tours']='0';
       if(!isset($array['cruise_tours_img']))
       $array['cruise_tours_img']='0';
       if(!isset($array['title_cruise']))
       $array['title_cruise']='0';
       if(!isset($array['keyword_cruise']))
       $array['keyword_cruise']='0';
       if(!isset($array['description_cruise']))
       $array['description_cruise']='0';
       if(!isset($array['multi_country']))
       $array['multi_country']='0';
       if(!isset($array['multi_country_img']))
       $array['multi_country_img']='0';
       if(!isset($array['title_country']))
       $array['title_country']='0';
       if(!isset($array['keyword_country']))
       $array['keyword_country']='0';
       if(!isset($array['description_country']))
       $array['description_country']='0';
       if(!isset($array['vietnam_visa']))
       $array['vietnam_visa']='0';
       if(!isset($array['vietnam_visa_img']))
       $array['vietnam_visa_img']='0';
       if(!isset($array['title_vietnam_visa']))
       $array['title_vietnam_visa']='0';
       if(!isset($array['keyword_vietnam_visa']))
       $array['keyword_vietnam_visa']='0';
       if(!isset($array['description_vietnam_visa']))
       $array['description_vietnam_visa']='0';
      $new_obj=new menu($array);
        if($insert)
        {
            menu_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/menu.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            menu_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/menu.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=menu_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=menu_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_menu($data);
}
else
{
     header('location: '.SITE_NAME);
}
