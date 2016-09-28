<?php
require_once DIR.'/model/danhmuc_tintuc.php';
require_once DIR.'/model/sqlconnection.php';
//
function danhmuc_tintuc_Get($command)
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
                $new_obj=new danhmuc_tintuc($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'danhmuc_tintuc');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new danhmuc_tintuc($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function danhmuc_tintuc_getById($id)
{
    return danhmuc_tintuc_Get('select * from danhmuc_tintuc where id='.$id);
}
//
function danhmuc_tintuc_getByAll()
{
    return danhmuc_tintuc_Get('select * from danhmuc_tintuc');
}
//
function danhmuc_tintuc_getByTop($top,$where,$order)
{
    return danhmuc_tintuc_Get("select * from danhmuc_tintuc ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function danhmuc_tintuc_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_tintuc_Get("SELECT * FROM  danhmuc_tintuc ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_tintuc_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_tintuc_Get("SELECT danhmuc_tintuc.id, danhmuc_tintuc.name, danhmuc_tintuc.name_cn, danhmuc_tintuc.name_url, danhmuc_tintuc.img, danhmuc_tintuc.title, danhmuc_tintuc.title_cn, danhmuc_tintuc.keyword, danhmuc_tintuc.keyword_cn, danhmuc_tintuc.description, danhmuc_tintuc.description_en FROM  danhmuc_tintuc ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_tintuc_insert($obj)
{
    return exe_query("insert into danhmuc_tintuc (name,name_cn,name_url,img,title,title_cn,keyword,keyword_cn,description,description_en) values ('$obj->name','$obj->name_cn','$obj->name_url','$obj->img','$obj->title','$obj->title_cn','$obj->keyword','$obj->keyword_cn','$obj->description','$obj->description_en')",'danhmuc_tintuc');
}
//
function danhmuc_tintuc_update($obj)
{
    return exe_query("update danhmuc_tintuc set name='$obj->name',name_cn='$obj->name_cn',name_url='$obj->name_url',img='$obj->img',title='$obj->title',title_cn='$obj->title_cn',keyword='$obj->keyword',keyword_cn='$obj->keyword_cn',description='$obj->description',description_en='$obj->description_en' where id=$obj->id",'danhmuc_tintuc');
}
//
function danhmuc_tintuc_delete($obj)
{
    return exe_query('delete from danhmuc_tintuc where id='.$obj->id,'danhmuc_tintuc');
}
//
function danhmuc_tintuc_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from danhmuc_tintuc '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
