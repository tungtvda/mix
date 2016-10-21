<?php


if(!defined('DIR')) require_once '../../config.php';
require_once DIR.'/model/tourService.php';
require_once DIR.'/model/booking_tourService.php';
//require_once DIR.'/model/danhmuc_2Service.php';
$contact=returnLanguage('contact','Contact');
$id=checkPostParamSecurity('id');
$name_url=checkPostParamSecurity('name_url');
$date=checkPostParamSecurity('date');
$price=checkPostParamSecurity('price');
$price_children=checkPostParamSecurity('price_children');
$price_children_5=checkPostParamSecurity('price_children_5');
$number_adults=checkPostParamSecurity('number_adults');
$number_children=checkPostParamSecurity('number_children');
$number_children_5=checkPostParamSecurity('number_children_5');
$total_input=checkPostParamSecurity('total_input');
$full_name=checkPostParamSecurity('full_name');
$email=checkPostParamSecurity('email');
$phone=checkPostParamSecurity('phone');
$address=checkPostParamSecurity('address');
$request=checkPostParamSecurity('request');


 $dk="id='$id' and name_url='$name_url'";
$data_tour=tour_getByTop(1,$dk,'id desc');
if(count($data_tour)>0)
{
     $price=$data_tour[0]->price;
     $price_children=$data_tour[0]->price_children_5_10;
     $price_children_5=$data_tour[0]->	price_children_under_5;
    if($price=='')
    {
        $price=0;
    }
    if($price_children=='')
    {
        $price_children=0;
    }
    if($price_children_5=='')
    {
        $price_children_5=0;
    }

    if($number_adults==''||$number_adults==0)
    {
        $number_adults=1;
    }
    if($number_children=='')
    {
        $number_children=0;
    }
    if($number_children_5=='')
    {
        $number_children_5=0;
    }
    if($number_adults<$number_children+$number_children_5)
    {
        $total=$contact;
    }
    else{
        $total_member=$number_adults+$number_children+$number_children_5;
        if($total_member>=7){
            $total=$contact;
        }
        else{
            $total_price=$price+$price_children+$price_children_5;
            $total=($number_adults+($number_children*0.7))*$total_price;
            if($total==0){
                $total=$contact;
            }
            else{
                $total=$total.returnLanguage('currency','$');
            }
        }
    }
    $new = new booking_tour();

    $new->tour_id=$id;
    $new->name_tour=returnLanguageField('name', $data_tour[0]);
    $new->name_customer=$full_name;
    $new->language=$_SESSION['language'];
    $new->phone=$phone;
    $new->email=$email;
    $new->address=$address;
    $new->departure_day=$date;
    $new->adults=$number_adults;
    $new->children_5_10=$number_children;
    $new->children_5=$number_children_5;
    $new->price=returnLanguageField('price', $data_tour[0]);
    $new->price_children=returnLanguageField('price_children_5_10', $data_tour[0]);
    $new->price_children_under_5=returnLanguageField('price_children_under_5', $data_tour[0]);
    $new->total_price=$total;
    $new->request=$request;
    $new->status=0;
    $new->created=date(DATETIME_FORMAT);
    booking_tour_insert($new);
    $link_web=SITE_NAME;
    $mes=returnLanguage('contact_suc','Booking successfully');

    $message="";
//    $subject = "mixtourist.com – Thông báo khách hàng đặt tour";
//    $message .='<div style="float: left; width: 100%">
//
//                            <p>Tên khách hàng: <span style="color: #132fff; font-weight: bold">'.$ten.'</span>,</p>
//                            <p>Email: <span style="color: #132fff; font-weight: bold">'.$email.'</span>,</p>
//                            <p>Số điện thoại: <span style="color: #132fff; font-weight: bold">'.$dienthoai.'</span>,</p>
//                            <p>Địa chỉ: <span style="color: #132fff; font-weight: bold">'.$diachi.'</span>,</p>
//                            <p>Ngày gửi: <span style="color: #132fff; font-weight: bold">'.date.'</span>,</p>
//                            <p>'.$noidung.'</p>
//
//
//                        </div>';
//    SendMail('sales@mixtourist.com', $message, $subject);
//    echo "<script>alert('$mes')</script>";
//
//    echo "<script>window.location.href='$link_web';</script>";
    echo 1;
}
else{
  echo 0;
    exit;
}

function checkPostParamSecurity($param)
{
    if (isset($_POST[$param])) {
        return addslashes(strip_tags($_POST[$param]));
    } else {
        return false;
    }

}