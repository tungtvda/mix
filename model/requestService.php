<?php
require_once DIR.'/model/request.php';
require_once DIR.'/model/sqlconnection.php';
//
function request_Get($command)
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
                $new_obj=new request($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'request');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new request($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function request_getById($id)
{
    return request_Get('select * from request where id='.$id);
}
//
function request_getByAll()
{
    return request_Get('select * from request');
}
//
function request_getByTop($top,$where,$order)
{
    return request_Get("select * from request ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function request_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return request_Get("SELECT * FROM  request ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function request_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return request_Get("SELECT request.id, request.name, request.country, request.email, request.phone, request.arrival_date, request.departure_date, request.adults, request.children, request.children_under, request.length_trip, request.tour_style, request.destinations, request.accommodation, request.request, request.status, request.created FROM  request ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function request_insert($obj)
{
    return exe_query("insert into request (name,country,email,phone,arrival_date,departure_date,adults,children,children_under,length_trip,tour_style,destinations,accommodation,request,status,created) values ('$obj->name','$obj->country','$obj->email','$obj->phone','$obj->arrival_date','$obj->departure_date','$obj->adults','$obj->children','$obj->children_under','$obj->length_trip','$obj->tour_style','$obj->destinations','$obj->accommodation','$obj->request','$obj->status','$obj->created')",'request');
}
//
function request_update($obj)
{
    return exe_query("update request set name='$obj->name',country='$obj->country',email='$obj->email',phone='$obj->phone',arrival_date='$obj->arrival_date',departure_date='$obj->departure_date',adults='$obj->adults',children='$obj->children',children_under='$obj->children_under',length_trip='$obj->length_trip',tour_style='$obj->tour_style',destinations='$obj->destinations',accommodation='$obj->accommodation',request='$obj->request',status='$obj->status',created='$obj->created' where id=$obj->id",'request');
}
//
function request_delete($obj)
{
    return exe_query('delete from request where id='.$obj->id,'request');
}
//
function request_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from request '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
