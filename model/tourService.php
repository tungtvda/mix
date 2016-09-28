<?php
require_once DIR.'/model/tour.php';
require_once DIR.'/model/sqlconnection.php';
//
function tour_Get($command)
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
                $new_obj=new tour($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'tour');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new tour($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function tour_getById($id)
{
    return tour_Get('select * from tour where id='.$id);
}
//
function tour_getByAll()
{
    return tour_Get('select * from tour');
}
//
function tour_getByTop($top,$where,$order)
{
    return tour_Get("select * from tour ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function tour_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return tour_Get("SELECT * FROM  tour ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tour_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return tour_Get("SELECT tour.id, danhmuc_1.name as DanhMuc1Id, danhmuc_2.name as DanhMuc2Id, tour.promotion, tour.packages, tour.name, tour.name_cn, tour.name_url, tour.img, tour.price, tour.price_cn, tour.durations, tour.durations_cn, tour.departure, tour.destination, tour.departure_time, tour.vehicle, tour.vehicle_en, tour.hotel, tour.schedule, tour.schedule_cn, tour.price_list, tour.price_list_cn, tour.content, tour.content_cn, tour.list_img, tour.title, tour.title_cn, tour.keyword, tour.keyword_cn, tour.description, tour.description_cn FROM  tour, danhmuc_1, danhmuc_2 where danhmuc_1.id=tour.DanhMuc1Id and danhmuc_2.id=tour.DanhMuc2Id  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tour_insert($obj)
{
    return exe_query("insert into tour (DanhMuc1Id,DanhMuc2Id,promotion,packages,name,name_cn,name_url,img,price,price_cn,durations,durations_cn,departure,destination,departure_time,vehicle,vehicle_en,hotel,schedule,schedule_cn,price_list,price_list_cn,content,content_cn,list_img,title,title_cn,keyword,keyword_cn,description,description_cn) values ('$obj->DanhMuc1Id','$obj->DanhMuc2Id','$obj->promotion','$obj->packages','$obj->name','$obj->name_cn','$obj->name_url','$obj->img','$obj->price','$obj->price_cn','$obj->durations','$obj->durations_cn','$obj->departure','$obj->destination','$obj->departure_time','$obj->vehicle','$obj->vehicle_en','$obj->hotel','$obj->schedule','$obj->schedule_cn','$obj->price_list','$obj->price_list_cn','$obj->content','$obj->content_cn','$obj->list_img','$obj->title','$obj->title_cn','$obj->keyword','$obj->keyword_cn','$obj->description','$obj->description_cn')",'tour');
}
//
function tour_update($obj)
{
    return exe_query("update tour set DanhMuc1Id='$obj->DanhMuc1Id',DanhMuc2Id='$obj->DanhMuc2Id',promotion='$obj->promotion',packages='$obj->packages',name='$obj->name',name_cn='$obj->name_cn',name_url='$obj->name_url',img='$obj->img',price='$obj->price',price_cn='$obj->price_cn',durations='$obj->durations',durations_cn='$obj->durations_cn',departure='$obj->departure',destination='$obj->destination',departure_time='$obj->departure_time',vehicle='$obj->vehicle',vehicle_en='$obj->vehicle_en',hotel='$obj->hotel',schedule='$obj->schedule',schedule_cn='$obj->schedule_cn',price_list='$obj->price_list',price_list_cn='$obj->price_list_cn',content='$obj->content',content_cn='$obj->content_cn',list_img='$obj->list_img',title='$obj->title',title_cn='$obj->title_cn',keyword='$obj->keyword',keyword_cn='$obj->keyword_cn',description='$obj->description',description_cn='$obj->description_cn' where id=$obj->id",'tour');
}
//
function tour_delete($obj)
{
    return exe_query('delete from tour where id='.$obj->id,'tour');
}
//
function tour_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from tour '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
