<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}

require_once DIR.'/controller/default/public.php';
require_once DIR . '/common/paging.php';
require_once DIR . '/common/redict.php';
require_once DIR . '/common/class.phpmailer.php';
require_once(DIR . "/common/Mail.php");
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
//
$data['country']=countries_getByTop('','','country_name asc');
$link=SITE_NAME.'/tour-request-form/';

$title=returnLanguageField('title', $data['menu'][12]);
$description=returnLanguageField('keyword', $data['menu'][12]);
$keyword=returnLanguageField('keyword', $data['menu'][12]);
$banner=$data['menu'][12]->img;
$name=returnLanguageField('name', $data['menu'][12]);
$url='<a  href="'.SITE_NAME.'"><i class="icon-home"></i>'.returnLanguageField('name', $data['menu'][0]).'</a>';
$url.='<i class="icon-angle-right"></i><span>'.$name.'</span>';
$data['banner']=array(
    'banner_img'=>$banner,
    'name'=>$name,
    'url'=>$url,
    'link'=>$link
);
$data['link_anh']=$data['menu'][12]->img;


$title=($title)?$title:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$description=($description)?$description:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
$keywords=($keyword)?$keyword:'Mixtourist.com | Vietnam travel agent|Vietnam travel company|Indochina';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_request($data);
show_left($data);
show_footer($data);
//contact();
if(isset($_POST['name_contact'])){
    $name=addslashes(strip_tags($_POST['name_contact']));
    $mr=addslashes(strip_tags($_POST['mr']));
    $country=addslashes(strip_tags($_POST['country']));
    $email=addslashes(strip_tags($_POST['email']));
    $phone=addslashes(strip_tags($_POST['phone']));

    $arrival_date=addslashes(strip_tags($_POST['arrival_date']));
    $departure_date=addslashes(strip_tags($_POST['departure_date']));
    $adults=addslashes(strip_tags($_POST['adults']));
    $children=addslashes(strip_tags($_POST['children']));
    $children_under=addslashes(strip_tags($_POST['children_under']));
    $length=addslashes(strip_tags($_POST['length']));

    $tour_style_string='';
    $tour_type=$_POST['tour_type'];
    if(count($tour_type)>0)
    {
        foreach($tour_type as $row){
            $tour_style_string.=addslashes(strip_tags($row)).', ';
        }
    }
    $destinations_string='';
    $destinations=$_POST['destinations'];
    if(count($destinations)>0)
    {
        foreach($destinations as $row_d){
            $destinations_string.=addslashes(strip_tags($row_d)).', ';
        }
    }
    $accommodation=addslashes(strip_tags($_POST['accommodation']));
    $message_contact=addslashes(strip_tags($_POST['message_contact']));

    $new = new request();
    $new->name=$mr.$name;
    $new->country=$country;
    $new->email=$email;
    $new->phone=$phone;
    $new->arrival_date=$arrival_date;
    $new->departure_date=$departure_date;
    $new->adults=$adults;
    $new->children=$children;
    $new->children_under=$children_under;
    $new->length_trip=$length;
    $new->tour_style=$tour_style_string;
    $new->destinations=$destinations_string;
    $new->accommodation=$accommodation;
    $new->request=$message_contact;
    $new->status=0;
    $new->created=date(DATETIME_FORMAT);
    request_insert($new);
    $message = "";
    $subject = "Mixtourist.com – Request from client";
    $message .= '<div style="float: left; width: 100%">

                            <p>Customer: <span style="color: #132fff; font-weight: bold">' . $mr.$name . '</span>,</p>
                            <p>Email: <span style="color: #132fff; font-weight: bold">' . $email . '</span>,</p>
                            <p>Phone: <span style="color: #132fff; font-weight: bold">' . $phone . '</span>,</p>
                            <p>Country: <span style="color: #132fff; font-weight: bold">' . $country . '</span>,</p>
                            <p>Arrival date: <span style="color: #132fff; font-weight: bold">' . $arrival_date . '</span>,</p>
                            <p>Departure date: <span style="color: #132fff; font-weight: bold">' . $departure_date . '</span>,</p>
                            <p>Sent date: <span style="color: #132fff; font-weight: bold">' . date(DATETIME_FORMAT) . '</span>,</p>
                             <p>Length of trip: <span style="color: #132fff; font-weight: bold">' . $length . '</span>,</p>
                             <p>No. of Adults: <span style="color: #132fff; font-weight: bold">' . $adults . '</span>,</p>
                             <p>No. of Children (5-10 years old): <span style="color: #132fff; font-weight: bold">' . $children . '</span>,</p>
                             <p>No. of Children (under 5 years old): <span style="color: #132fff; font-weight: bold">' . $children_under . '</span>,</p>
                             <p>Tour style: <span style="color: #132fff; font-weight: bold">' . $tour_style_string . '</span>,</p>
                             <p>Destinations: <span style="color: #132fff; font-weight: bold">' . $destinations_string . '</span>,</p>
                             <p>Accommodation style: <span style="color: #132fff; font-weight: bold">' . $accommodation . '</span>,</p>
                             <p>Requirements style: <span style="color: #132fff; font-weight: bold">' . $message_contact . '</span>,</p>
                           <p><div dir="ltr"><p style="font-size:12.8px;margin-bottom:0.0001pt;line-height:14.25pt;background-image:initial;background-position:initial;background-repeat:initial"><font face="arial, helvetica, sans-serif" color="#000000">Should you have any further queries, please do not hesitate to contact us</font></p><p style="font-size:12.8px;margin-bottom:0.0001pt;line-height:14.25pt;background-image:initial;background-position:initial;background-repeat:initial"><font face="arial, helvetica, sans-serif" color="#000000">Many thanks with our kindest regards,</font></p><p style="font-size:12.8px;margin-bottom:0.0001pt;line-height:14.25pt;background-image:initial;background-position:initial;background-repeat:initial"><font face="arial, helvetica, sans-serif" color="#000000">Tran Quynh Trang (Mrs)</font></p><p style="margin-bottom:0.0001pt;line-height:14.25pt;background-image:initial;background-position:initial;background-repeat:initial"><font face="comic sans ms, sans-serif" size="2" color="#0000ff">******************************<wbr>*****************************<br></font></p><font face="comic sans ms, sans-serif" color="#0000ff"><b><font size="4">Mix Tourist and Services Trading Joint Stock Company</font></b><br><font size="2"><b>Address:</b> Room 2001, No 137 Nguyen Ngoc Vu str, Cau Giay Dist, Ha Noi City, Viet Nam</font><br><font size="2"><b>Tel:&nbsp;</b>(+84)46281 4340 </font><br><font size="2"><b>Fax</b>: ( +84) 46281 4341 </font><br><font size="2"><b>Mobile:&nbsp;</b>(+ 84)9.41.61.99.56</font><br><font size="2"><b>Skype:</b> &nbsp;quynhtrangtran.97</font><br><font size="2"><b>Email:</b> <a href="mailto:sales@mixtourist.com" target="_blank">sales@mixtourist.com</a> &nbsp; &nbsp; &nbsp;</font><br><font size="2"><b>Web:</b> <a href="http://www.mixtourist.com" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=vi&amp;q=http://www.mixtourist.com&amp;source=gmail&amp;ust=1478057012638000&amp;usg=AFQjCNEVjxLk2RfwBFXRAB-TzqualjVJ0g">www.mixtourist.com</a></font></font></div>
                           <div dir="ltr"><font face="comic sans ms, sans-serif" color="#0000ff"><br></font></div>
                           <div dir="ltr"><font face="comic sans ms, sans-serif" color="#0000ff"><br></font></div>
                           <div dir="ltr"><font face="comic sans ms, sans-serif" color="#0000ff"><img src="https://ci3.googleusercontent.com/proxy/O6Q2bfPmibv-5R-hUGgc1QZIhYCQfpp9b8WG5JiC17tL8QVG2mvJn2shVZoIEYgd4zAMAYgPX8eXrFP_xCt9UzCXazk-vSJGDlh28nOX3WkEoWEU1mIS8YyplItBHz5WSIdSo3jQELmLgjZl7fIOMp8=s0-d-e1-ft#https://docs.google.com/a/mixtourist.com/uc?id=0B-CmU0THdkJrcE9qbWdBOUR1dTA&amp;export=download" class="CToWUd"><br></font></div>
                           </p>
                        </div>';
    SendMail('sales@mixtourist.com', $message, $subject);
    SendMail($email, $message, 'Confirm successfully request from');
    echo "<script>alert('Request successfully')</script>";



}

