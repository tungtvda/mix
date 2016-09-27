<?php
require_once DIR.'/model/danhmuc_1.php';
require_once DIR.'/model/sqlconnection.php';
//
function danhmuc_1_Get($command)
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
                $new_obj=new danhmuc_1($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'danhmuc_1');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new danhmuc_1($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function danhmuc_1_getById($id)
{
    return danhmuc_1_Get('select * from danhmuc_1 where id='.$id);
}
//
function danhmuc_1_getByAll()
{
    return danhmuc_1_Get('select * from danhmuc_1');
}
//
function danhmuc_1_getByTop($top,$where,$order)
{
    return danhmuc_1_Get("select * from danhmuc_1 ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function danhmuc_1_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_1_Get("SELECT * FROM  danhmuc_1 ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_1_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_1_Get("SELECT danhmuc_1.id, danhmuc_1.name FROM  danhmuc_1 ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_1_insert($obj)
{
    return exe_query("insert into danhmuc_1 (name) values ('$obj->name')",'danhmuc_1');
}
//
function danhmuc_1_update($obj)
{
    return exe_query("update danhmuc_1 set name='$obj->name' where id=$obj->id",'danhmuc_1');
}
//
function danhmuc_1_delete($obj)
{
    return exe_query('delete from danhmuc_1 where id='.$obj->id,'danhmuc_1');
}
//
function danhmuc_1_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from danhmuc_1 '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
