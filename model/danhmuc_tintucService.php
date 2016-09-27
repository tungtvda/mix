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
   return danhmuc_tintuc_Get("SELECT danhmuc_tintuc.id, danhmuc_tintuc.lang_id, danhmuc_tintuc.patient_id, danhmuc_tintuc.name, danhmuc_tintuc.name_url, danhmuc_tintuc.img FROM  danhmuc_tintuc ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_tintuc_insert($obj)
{
    return exe_query("insert into danhmuc_tintuc (lang_id,patient_id,name,name_url,img) values ('$obj->lang_id','$obj->patient_id','$obj->name','$obj->name_url','$obj->img')",'danhmuc_tintuc');
}
//
function danhmuc_tintuc_update($obj)
{
    return exe_query("update danhmuc_tintuc set lang_id='$obj->lang_id',patient_id='$obj->patient_id',name='$obj->name',name_url='$obj->name_url',img='$obj->img' where id=$obj->id",'danhmuc_tintuc');
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
