<?php
require_once DIR.'/model/slide.php';
require_once DIR.'/model/sqlconnection.php';
//
function slide_Get($command)
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
                $new_obj=new slide($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'slide');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new slide($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function slide_getById($id)
{
    return slide_Get('select * from slide where id='.$id);
}
//
function slide_getByAll()
{
    return slide_Get('select * from slide');
}
//
function slide_getByTop($top,$where,$order)
{
    return slide_Get("select * from slide ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function slide_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return slide_Get("SELECT * FROM  slide ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function slide_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return slide_Get("SELECT slide.id, slide.name, slide.lang_id, slide.price, slide.img, slide.img_small, slide.link, slide.position FROM  slide ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function slide_insert($obj)
{
    return exe_query("insert into slide (name,lang_id,price,img,img_small,link,position) values ('$obj->name','$obj->lang_id','$obj->price','$obj->img','$obj->img_small','$obj->link','$obj->position')",'slide');
}
//
function slide_update($obj)
{
    return exe_query("update slide set name='$obj->name',lang_id='$obj->lang_id',price='$obj->price',img='$obj->img',img_small='$obj->img_small',link='$obj->link',position='$obj->position' where id=$obj->id",'slide');
}
//
function slide_delete($obj)
{
    return exe_query('delete from slide where id='.$obj->id,'slide');
}
//
function slide_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from slide '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
