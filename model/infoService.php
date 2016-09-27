<?php
require_once DIR.'/model/info.php';
require_once DIR.'/model/sqlconnection.php';
//
function info_Get($command)
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
                $new_obj=new info($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'info');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new info($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function info_getById($id)
{
    return info_Get('select * from info where id='.$id);
}
//
function info_getByAll()
{
    return info_Get('select * from info');
}
//
function info_getByTop($top,$where,$order)
{
    return info_Get("select * from info ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function info_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return info_Get("SELECT * FROM  info ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function info_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return info_Get("SELECT info.id, info.id_lang, info.about_us, info.title_about, info.keyword_about, info.description_about, info.why_us, info.title_why, info.keyword_why, info.description_why, info.our_services, info.title_services, info.keyword_services, info.description_services, info.terms_conditions, info.title_conditions, info.keyword_conditions, info.description_conditions, info.payment_method, info.title_, info.keyword_, info.description_, info.privacy_policy, info.title_policy, info.keyword_policy, info.description_policy FROM  info ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function info_insert($obj)
{
    return exe_query("insert into info (id_lang,about_us,title_about,keyword_about,description_about,why_us,title_why,keyword_why,description_why,our_services,title_services,keyword_services,description_services,terms_conditions,title_conditions,keyword_conditions,description_conditions,payment_method,title_,keyword_,description_,privacy_policy,title_policy,keyword_policy,description_policy) values ('$obj->id_lang','$obj->about_us','$obj->title_about','$obj->keyword_about','$obj->description_about','$obj->why_us','$obj->title_why','$obj->keyword_why','$obj->description_why','$obj->our_services','$obj->title_services','$obj->keyword_services','$obj->description_services','$obj->terms_conditions','$obj->title_conditions','$obj->keyword_conditions','$obj->description_conditions','$obj->payment_method','$obj->title_','$obj->keyword_','$obj->description_','$obj->privacy_policy','$obj->title_policy','$obj->keyword_policy','$obj->description_policy')",'info');
}
//
function info_update($obj)
{
    return exe_query("update info set id_lang='$obj->id_lang',about_us='$obj->about_us',title_about='$obj->title_about',keyword_about='$obj->keyword_about',description_about='$obj->description_about',why_us='$obj->why_us',title_why='$obj->title_why',keyword_why='$obj->keyword_why',description_why='$obj->description_why',our_services='$obj->our_services',title_services='$obj->title_services',keyword_services='$obj->keyword_services',description_services='$obj->description_services',terms_conditions='$obj->terms_conditions',title_conditions='$obj->title_conditions',keyword_conditions='$obj->keyword_conditions',description_conditions='$obj->description_conditions',payment_method='$obj->payment_method',title_='$obj->title_',keyword_='$obj->keyword_',description_='$obj->description_',privacy_policy='$obj->privacy_policy',title_policy='$obj->title_policy',keyword_policy='$obj->keyword_policy',description_policy='$obj->description_policy' where id=$obj->id",'info');
}
//
function info_delete($obj)
{
    return exe_query('delete from info where id='.$obj->id,'info');
}
//
function info_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from info '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
