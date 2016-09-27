<?php
require_once DIR.'/model/link.php';
require_once DIR.'/model/sqlconnection.php';
//
function link_Get($command)
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
                $new_obj=new link($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'link');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new link($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function link_getById($id)
{
    return link_Get('select * from link where id='.$id);
}
//
function link_getByAll()
{
    return link_Get('select * from link');
}
//
function link_getByTop($top,$where,$order)
{
    return link_Get("select * from link ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function link_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return link_Get("SELECT * FROM  link ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function link_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return link_Get("SELECT link.id, link.id_lang, link.name, link.link, link.position FROM  link ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function link_insert($obj)
{
    return exe_query("insert into link (id_lang,name,link,position) values ('$obj->id_lang','$obj->name','$obj->link','$obj->position')",'link');
}
//
function link_update($obj)
{
    return exe_query("update link set id_lang='$obj->id_lang',name='$obj->name',link='$obj->link',position='$obj->position' where id=$obj->id",'link');
}
//
function link_delete($obj)
{
    return exe_query('delete from link where id='.$obj->id,'link');
}
//
function link_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from link '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
