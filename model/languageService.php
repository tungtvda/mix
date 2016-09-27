<?php
require_once DIR.'/model/language.php';
require_once DIR.'/model/sqlconnection.php';
//
function language_Get($command)
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
                $new_obj=new language($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'language');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new language($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function language_getById($id)
{
    return language_Get('select * from language where id='.$id);
}
//
function language_getByAll()
{
    return language_Get('select * from language');
}
//
function language_getByTop($top,$where,$order)
{
    return language_Get("select * from language ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function language_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return language_Get("SELECT * FROM  language ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function language_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return language_Get("SELECT language.id, language.name, language.code, language.icon, language.active, language.default_lang, language.currency FROM  language ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function language_insert($obj)
{
    return exe_query("insert into language (name,code,icon,active,default_lang,currency) values ('$obj->name','$obj->code','$obj->icon','$obj->active','$obj->default_lang','$obj->currency')",'language');
}
//
function language_update($obj)
{
    return exe_query("update language set name='$obj->name',code='$obj->code',icon='$obj->icon',active='$obj->active',default_lang='$obj->default_lang',currency='$obj->currency' where id=$obj->id",'language');
}
//
function language_delete($obj)
{
    return exe_query('delete from language where id='.$obj->id,'language');
}
//
function language_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from language '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
