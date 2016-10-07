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
    $asign['durations']=returnLanguageField('durations', $data['tour'][0]);
    $asign['departure']=returnLanguageField('departure', $data['tour'][0]);
    $asign['destination']=returnLanguageField('destination', $data['tour'][0]);
    $asign['hotel']=returnStart($data['tour'][0]->hotel);
    $asign['vehicle']=returnLanguageField('vehicle', $data['tour'][0]);
    $asign['id']=returnLanguageField('id', $data['tour'][0]);
    $asign['link']=SITE_NAME.'/'.$data['tour'][0]->name_url.'.html';
    $asign['schedule']=returnLanguageField('schedule', $data['tour'][0]);
    $asign['price_list']=returnLanguageField('price_list', $data['tour'][0]);
    $asign['content']=returnLanguageField('content', $data['tour'][0]);
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

    $asign['gallery_lang']=returnLanguage('gallery_detail','Gallery');
    $asign['comment_lang']=returnLanguage('comment_detail','Comment');
    $asign['you_may_also_detail']=returnLanguage('you_may_also_detail','YOU MAY ALSO LIKE');

    $asign['tour_noibat'] = "";
    if(count($data['tour_noibat'])>0)
    {
        $asign['tour_noibat'] = print_item('tour_noibat', $data['tour_noibat']);
    }

    print_template($asign, 'chitiettour');
}



