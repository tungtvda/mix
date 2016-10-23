<?php
require_once '../../config.php';
require_once DIR.'/view/admin/index.php';
require_once DIR.'/common/messenger.php';
require_once DIR.'/model/contactService.php';
require_once DIR.'/model/requestService.php';
require_once DIR.'/model/booking_tourService.php';
$data=array();
if(isset($_SESSION["Admin"]))
{
    returnCountData();
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    view_index($data);

}
else
{
    header('location: '.SITE_NAME.'/login');
}