<?php
require_once DIR.'/model/news.php';
require_once DIR.'/model/sqlconnection.php';
//
function news_Get($command)
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
                $new_obj=new news($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'news');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new news($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function news_getById($id)
{
    return news_Get('select * from news where id='.$id);
}
//
function news_getByAll()
{
    return news_Get('select * from news');
}
//
function news_getByTop($top,$where,$order)
{
    return news_Get("select * from news ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function news_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return news_Get("SELECT * FROM  news ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function news_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return news_Get("SELECT news.id, danhmuc_tintuc.name as danhmuc_id, news.name, news.name_cn, news.name_url, news.img, news.content, news.content_cn, news.title, news.title_cn, news.keyword, news.keyword_cn, news.description, news.description_cn FROM  news, danhmuc_tintuc where danhmuc_tintuc.id=news.danhmuc_id  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function news_insert($obj)
{
    return exe_query("insert into news (danhmuc_id,name,name_cn,name_url,img,content,content_cn,title,title_cn,keyword,keyword_cn,description,description_cn) values ('$obj->danhmuc_id','$obj->name','$obj->name_cn','$obj->name_url','$obj->img','$obj->content','$obj->content_cn','$obj->title','$obj->title_cn','$obj->keyword','$obj->keyword_cn','$obj->description','$obj->description_cn')",'news');
}
//
function news_update($obj)
{
    return exe_query("update news set danhmuc_id='$obj->danhmuc_id',name='$obj->name',name_cn='$obj->name_cn',name_url='$obj->name_url',img='$obj->img',content='$obj->content',content_cn='$obj->content_cn',title='$obj->title',title_cn='$obj->title_cn',keyword='$obj->keyword',keyword_cn='$obj->keyword_cn',description='$obj->description',description_cn='$obj->description_cn' where id=$obj->id",'news');
}
//
function news_delete($obj)
{
    return exe_query('delete from news where id='.$obj->id,'news');
}
//
function news_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from news '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
