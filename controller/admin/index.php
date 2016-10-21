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
    $count_contact=contact_count('status=0');
    $_SESSION['contact']=$count_contact;
    $count_request=request_count('status=0');
    $_SESSION['request']=$count_request;
    $count_booking=booking_tour_count('status=0');
    $_SESSION['booking']=$count_booking;
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    view_index($data);

}
else
{
    header('location: '.SITE_NAME.'/login');
}