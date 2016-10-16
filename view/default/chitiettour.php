<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_chitiettour($data = array())
{
    $asign = array();
//
//    $asign['danhsach'] = "";
//    if(count($data['danhsach'])>0)
//    {
//        $asign['danhsach'] = print_item('danhmuc', $data['danhsach']);
//    }
//    $asign['danhsach2'] = "";
//    if(count($data['danhsach'])>0)
//    {
//        $asign['danhsach2'] = print_item('packages', $data['danhsach']);
//    }
//
//    $asign['name_dm']=$data['banner']['name'];
//    $asign['PAGING']=$data['PAGING'];
//    $asign['view_as']=returnLanguage('view_as','VIEW AS');
//    $asign['gird']=returnLanguage('gird','GRID');
//    $asign['list']=returnLanguage('list','LIST');
    $asign['img']= $data['tour'][0]->img;
    $asign['name_dm']= $data['banner']['name'];
    $asign['price']=returnLanguageField('price', $data['tour'][0]);
    $asign['price_children_5_10']=returnLanguageField('price_children_5_10', $data['tour'][0]);
    $asign['price_children_under_5']=returnLanguageField('price_children_under_5', $data['tour'][0]);
    $asign['durations']=returnLanguageField('durations', $data['tour'][0]);
    $asign['departure']=$data['tour'][0]->departure;
    $asign['code']=$data['tour'][0]->code;
    $asign['destination']=$data['tour'][0]->destination;
    $asign['hotel']=returnStart($data['tour'][0]->hotel);
    $asign['vehicle']=returnLanguageField('vehicle', $data['tour'][0]);
    $asign['id']=$data['tour'][0]->id;
    $asign['link']=SITE_NAME.'/'.$data['tour'][0]->name_url.'.html';
    $asign['schedule']=returnLanguageField('schedule', $data['tour'][0]);
    $asign['price_list']=returnLanguageField('price_list', $data['tour'][0]);
    $asign['content']=returnLanguageField('content', $data['tour'][0]);
    $asign['inclusion']=returnLanguageField('inclusion', $data['tour'][0]);
    $asign['exclusion']=returnLanguageField('exclusion', $data['tour'][0]);
    $asign['summary']=returnLanguageField('summary', $data['tour'][0]);
    $asign['highlights']=returnLanguageField('highlights', $data['tour'][0]);
    $asign['list_img']=$data['tour'][0]->list_img;
    $asign['name_url']=$data['tour'][0]->name_url;

    // lang
    $asign['price_lang']=returnLanguage('price','Price');
    $asign['currency_lang']=returnLanguage('currency','$');
    $asign['durations_lang']=returnLanguage('durations','Durations');
    $asign['departure_lang']=returnLanguage('departure_detail','Departure');
    $asign['departure_lang']=returnLanguage('departure_detail','Departure');
    $asign['destination_lang']=returnLanguage('destination_detail','Destination');
    $asign['hotel_lang']=returnLanguage('hotel','Hotel');
    $asign['vehicle_lang']=returnLanguage('vehicle','Vehicle');
    $asign['booking_lang']=returnLanguage('booking','Booking');
    $asign['schedule_lang']=returnLanguage('schedule_detail','Schedule');
    $asign['price_list_lang']=returnLanguage('price_list_detail','Price list');
    $asign['description_lang']=returnLanguage('description_detail','Description');
    $asign['inclusion_lang']=returnLanguage('inclusion_detail','Inclusion');
    $asign['exclusion_lang']=returnLanguage('exclusion_detail','Exclusion');
    $asign['summary_lang']=returnLanguage('summary','Summary');
    $asign['highlights_lang']=returnLanguage('highlights','Highlights');
    $asign['booking_form']=returnLanguage('booking_form','Booking form');

    $asign['gallery_lang']=returnLanguage('gallery_detail','Gallery');
    $asign['comment_lang']=returnLanguage('comment_detail','Comment');
    $asign['you_may_also_detail']=returnLanguage('you_may_also_detail','YOU MAY ALSO LIKE');

    $asign['no_of_adults']=returnLanguage('no_of_adults','No. of Adults');
    $asign['no_of_children']=returnLanguage('no_of_children','No. of Children (5-10 years old)');
    $asign['no_of_children_5']=returnLanguage('no_of_children_5','No. of Children (under 5 years old)');
    $asign['total']=returnLanguage('total','Total');
    $asign['next']=returnLanguage('next','Next');
    $asign['you_chosen_date']=returnLanguage('you_chosen_date','Your chosen date');
    $asign['no_adults']=returnLanguage('no_adults','No of Adults');
    $asign['no_children']=returnLanguage('no_children','No of children:(5 - 10 years old)');
    $asign['no_children_5']=returnLanguage('no_children_5','Children: (under 5 years old)');
    $asign['total_fee']=returnLanguage('total_fee','Total fee');
    $asign['full_name']=returnLanguage('full_name','Full name');
    $asign['phone']=returnLanguage('phone','Phone');
    $asign['back']=returnLanguage('back','Back');
    $asign['request']=returnLanguage('request','Request');
    $asign['check_date']=returnLanguage('check_date','Please select departure date');
    $asign['check_param_date']=returnLanguage('check_param_date','You can not select the date in the past');
    $asign['email']=returnLanguage('email','email');
    $asign['address']=returnLanguage('address','Address');
    $asign['code']=returnLanguage('code','Code');
    $asign['code_chart']=returnLanguage('code_chart','MDT');
    $asign['tour_noibat'] = "";
    if(count($data['tour_noibat'])>0)
    {
        $asign['tour_noibat'] = print_item('tour_noibat', $data['tour_noibat']);
    }
    $asign['date_now'] = date('Y-m-d', strtotime(date(DATETIME_FORMAT)));

    print_template($asign, 'chitiettour');
}



