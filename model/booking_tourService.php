<?php
require_once DIR.'/model/booking_tour.php';
require_once DIR.'/model/sqlconnection.php';
//
function booking_tour_Get($command)
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
                $new_obj=new booking_tour($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'booking_tour');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new booking_tour($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function booking_tour_getById($id)
{
    return booking_tour_Get('select * from booking_tour where id='.$id);
}
//
function booking_tour_getByAll()
{
    return booking_tour_Get('select * from booking_tour');
}
//
function booking_tour_getByTop($top,$where,$order)
{
    return booking_tour_Get("select * from booking_tour ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function booking_tour_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return booking_tour_Get("SELECT * FROM  booking_tour ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function booking_tour_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return booking_tour_Get("SELECT booking_tour.id, booking_tour.tour_id, booking_tour.name_tour, booking_tour.name_customer, booking_tour.phone, booking_tour.email, booking_tour.city, booking_tour.country, booking_tour.departure_day, booking_tour.adults, booking_tour.children_6_11, booking_tour.children_5, booking_tour.request, booking_tour.status, booking_tour.created FROM  booking_tour ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function booking_tour_insert($obj)
{
    return exe_query("insert into booking_tour (tour_id,name_tour,name_customer,phone,email,city,country,departure_day,adults,children_6_11,children_5,request,status,created) values ('$obj->tour_id','$obj->name_tour','$obj->name_customer','$obj->phone','$obj->email','$obj->city','$obj->country','$obj->departure_day','$obj->adults','$obj->children_6_11','$obj->children_5','$obj->request','$obj->status','$obj->created')",'booking_tour');
}
//
function booking_tour_update($obj)
{
    return exe_query("update booking_tour set tour_id='$obj->tour_id',name_tour='$obj->name_tour',name_customer='$obj->name_customer',phone='$obj->phone',email='$obj->email',city='$obj->city',country='$obj->country',departure_day='$obj->departure_day',adults='$obj->adults',children_6_11='$obj->children_6_11',children_5='$obj->children_5',request='$obj->request',status='$obj->status',created='$obj->created' where id=$obj->id",'booking_tour');
}
//
function booking_tour_delete($obj)
{
    return exe_query('delete from booking_tour where id='.$obj->id,'booking_tour');
}
//
function booking_tour_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from booking_tour '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
