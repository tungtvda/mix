<?php
require_once DIR.'/model/danhmuc_subport.php';
require_once DIR.'/model/sqlconnection.php';
//
function danhmuc_subport_Get($command)
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
                $new_obj=new danhmuc_subport($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'danhmuc_subport');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new danhmuc_subport($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function danhmuc_subport_getById($id)
{
    return danhmuc_subport_Get('select * from danhmuc_subport where id='.$id);
}
//
function danhmuc_subport_getByAll()
{
    return danhmuc_subport_Get('select * from danhmuc_subport');
}
//
function danhmuc_subport_getByTop($top,$where,$order)
{
    return danhmuc_subport_Get("select * from danhmuc_subport ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function danhmuc_subport_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_subport_Get("SELECT * FROM  danhmuc_subport ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_subport_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_subport_Get("SELECT danhmuc_subport.id, danhmuc_subport.lang_id, danhmuc_subport.name, danhmuc_subport.position FROM  danhmuc_subport ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_subport_insert($obj)
{
    return exe_query("insert into danhmuc_subport (lang_id,name,position) values ('$obj->lang_id','$obj->name','$obj->position')",'danhmuc_subport');
}
//
function danhmuc_subport_update($obj)
{
    return exe_query("update danhmuc_subport set lang_id='$obj->lang_id',name='$obj->name',position='$obj->position' where id=$obj->id",'danhmuc_subport');
}
//
function danhmuc_subport_delete($obj)
{
    return exe_query('delete from danhmuc_subport where id='.$obj->id,'danhmuc_subport');
}
//
function danhmuc_subport_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from danhmuc_subport '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
