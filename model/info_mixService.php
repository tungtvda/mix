<?php
require_once DIR.'/model/info_mix.php';
require_once DIR.'/model/sqlconnection.php';
//
function info_mix_Get($command)
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
                $new_obj=new info_mix($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'info_mix');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new info_mix($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function info_mix_getById($id)
{
    return info_mix_Get('select * from info_mix where id='.$id);
}
//
function info_mix_getByAll()
{
    return info_mix_Get('select * from info_mix');
}
//
function info_mix_getByTop($top,$where,$order)
{
    return info_mix_Get("select * from info_mix ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function info_mix_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return info_mix_Get("SELECT * FROM  info_mix ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function info_mix_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return info_mix_Get("SELECT info_mix.id, info_mix.img, info_mix.name, info_mix.name_cn, info_mix.content, info_mix.content_cn, info_mix.title, info_mix.title_cn, info_mix.keyword, info_mix.keyword_cn, info_mix.description, info_mix.description_cn FROM  info_mix ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function info_mix_insert($obj)
{
    return exe_query("insert into info_mix (img,name,name_cn,content,content_cn,title,title_cn,keyword,keyword_cn,description,description_cn) values ('$obj->img','$obj->name','$obj->name_cn','$obj->content','$obj->content_cn','$obj->title','$obj->title_cn','$obj->keyword','$obj->keyword_cn','$obj->description','$obj->description_cn')",'info_mix');
}
//
function info_mix_update($obj)
{
    return exe_query("update info_mix set img='$obj->img',name='$obj->name',name_cn='$obj->name_cn',content='$obj->content',content_cn='$obj->content_cn',title='$obj->title',title_cn='$obj->title_cn',keyword='$obj->keyword',keyword_cn='$obj->keyword_cn',description='$obj->description',description_cn='$obj->description_cn' where id=$obj->id",'info_mix');
}
//
function info_mix_delete($obj)
{
    return exe_query('delete from info_mix where id='.$obj->id,'info_mix');
}
//
function info_mix_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from info_mix '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
