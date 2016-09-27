<?php
require_once DIR.'/model/menu.php';
require_once DIR.'/model/sqlconnection.php';
//
function menu_Get($command)
{
            $array_result=array();
    $key=md5($command);
    if(CACHE)
    {
        $mycache=ConnectCache();
        $cachecommand=$mycache->get($key);
        if($cachecommand)
        {
            $array_result=$cachecommand;
        }
        else
        {
          $result=mysqli_query(ConnectSql(),$command);
            if($result!=false)while($row=mysqli_fetch_array($result))
            {
                $new_obj=new menu($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'menu');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new menu($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function menu_getById($id)
{
    return menu_Get('select * from menu where id='.$id);
}
//
function menu_getByAll()
{
    return menu_Get('select * from menu');
}
//
function menu_getByTop($top,$where,$order)
{
    return menu_Get("select * from menu ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function menu_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return menu_Get("SELECT * FROM  menu ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function menu_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return menu_Get("SELECT menu.id, menu.lang_id, menu.home, menu.title, menu.keyword, menu.description, menu.excursion_tours, menu.excursion_tours_img, menu.title_excursion, menu.keyword_excursion, menu.description_excursion, menu.vacation_packages, menu.vacation_packages_img, menu.title_vacation, menu.keyword_vacation, menu.description_vacation, menu.cruise_tours, menu.cruise_tours_img, menu.title_cruise, menu.keyword_cruise, menu.description_cruise, menu.multi_country, menu.multi_country_img, menu.title_country, menu.keyword_country, menu.description_country, menu.vietnam_visa, menu.vietnam_visa_img, menu.title_vietnam_visa, menu.keyword_vietnam_visa, menu.description_vietnam_visa FROM  menu ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function menu_insert($obj)
{
    return exe_query("insert into menu (lang_id,home,title,keyword,description,excursion_tours,excursion_tours_img,title_excursion,keyword_excursion,description_excursion,vacation_packages,vacation_packages_img,title_vacation,keyword_vacation,description_vacation,cruise_tours,cruise_tours_img,title_cruise,keyword_cruise,description_cruise,multi_country,multi_country_img,title_country,keyword_country,description_country,vietnam_visa,vietnam_visa_img,title_vietnam_visa,keyword_vietnam_visa,description_vietnam_visa) values ('$obj->lang_id','$obj->home','$obj->title','$obj->keyword','$obj->description','$obj->excursion_tours','$obj->excursion_tours_img','$obj->title_excursion','$obj->keyword_excursion','$obj->description_excursion','$obj->vacation_packages','$obj->vacation_packages_img','$obj->title_vacation','$obj->keyword_vacation','$obj->description_vacation','$obj->cruise_tours','$obj->cruise_tours_img','$obj->title_cruise','$obj->keyword_cruise','$obj->description_cruise','$obj->multi_country','$obj->multi_country_img','$obj->title_country','$obj->keyword_country','$obj->description_country','$obj->vietnam_visa','$obj->vietnam_visa_img','$obj->title_vietnam_visa','$obj->keyword_vietnam_visa','$obj->description_vietnam_visa')",'menu');
}
//
function menu_update($obj)
{
    return exe_query("update menu set lang_id='$obj->lang_id',home='$obj->home',title='$obj->title',keyword='$obj->keyword',description='$obj->description',excursion_tours='$obj->excursion_tours',excursion_tours_img='$obj->excursion_tours_img',title_excursion='$obj->title_excursion',keyword_excursion='$obj->keyword_excursion',description_excursion='$obj->description_excursion',vacation_packages='$obj->vacation_packages',vacation_packages_img='$obj->vacation_packages_img',title_vacation='$obj->title_vacation',keyword_vacation='$obj->keyword_vacation',description_vacation='$obj->description_vacation',cruise_tours='$obj->cruise_tours',cruise_tours_img='$obj->cruise_tours_img',title_cruise='$obj->title_cruise',keyword_cruise='$obj->keyword_cruise',description_cruise='$obj->description_cruise',multi_country='$obj->multi_country',multi_country_img='$obj->multi_country_img',title_country='$obj->title_country',keyword_country='$obj->keyword_country',description_country='$obj->description_country',vietnam_visa='$obj->vietnam_visa',vietnam_visa_img='$obj->vietnam_visa_img',title_vietnam_visa='$obj->title_vietnam_visa',keyword_vietnam_visa='$obj->keyword_vietnam_visa',description_vietnam_visa='$obj->description_vietnam_visa' where id=$obj->id",'menu');
}
//
function menu_delete($obj)
{
    return exe_query('delete from menu where id='.$obj->id,'menu');
}
//
function menu_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from menu '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
