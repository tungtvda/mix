<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_index($data = array())
{
    $asign = array();

    $asign['tour_PROMOTIONS'] = "";
    if(count($data['tour_PROMOTIONS'])>0)
    {
        $asign['tour_PROMOTIONS'] = print_item('promotion', $data['tour_PROMOTIONS']);
    }
    $asign['tour_packages_list'] = "";
    if(count($data['tour_packages_list'])>0)
    {
        $asign['tour_packages_list'] = print_item('packages', $data['tour_packages_list']);
    }

    $asign['tour_DESTINATIONS'] = "";
    if(count($data['tour_DESTINATIONS'])>0)
    {
        $asign['tour_DESTINATIONS'] = print_item('destinations', $data['tour_DESTINATIONS']);
    }

    $asign['packages']=returnLanguage('packages','ALL PACKAGES');
    $asign['promotions']=returnLanguage('promotions','PROMOTIONS');
    $asign['top_promotions']=returnLanguage('top_promotions','ALL PACKAGES');
    $asign['best_travel_packages_available']=returnLanguage('best_travel_packages_available','PROMOTIONS');

    $asign['video_intro']=returnLanguage('video_intro','VIDEO INTRODUCTION - MIXTOURIST');
    $asign['video_conttent']=returnLanguage('video_conttent','');
    $asign['more_videos']=returnLanguage('more_videos','MORE VIDEOS');
    $asign['our_destinations']=returnLanguage('our_destinations','OUR DESTINATIONS');
    $asign['choose_you']=returnLanguage('choose_you','CHOOSE YOUR NEXT DESTINATION');

    $asign['destinations']=returnLanguage('destinations','DESTINATIONS');
    $asign['tour_packages']=returnLanguage('tour_packages','TOURS PACKAGES');
    $asign['cruises']=returnLanguage('cruises','CRUISES');
    $asign['hour_support']=returnLanguage('hour_support','HOUR SUPPORT');
    $asign['packages_index']=returnLanguage('packages_index','PACKAGES');

    $asign['detail']=returnLanguage('detail','DETAIL');
    $asign['booking']=returnLanguage('booking','BOOKING');

    $asign['search']=returnLanguage('search','SEARCH');
    $asign['contact_us']=returnLanguage('contact_us','CONTACT US');

    $asign['video'] = "";
    if(count($data['video'])>0)
    {
        $asign['video']=$data['video'][0]->link_video;
    }

    $asign['count_destinations']=$data['count_destinations'];
    $asign['count_pack']=$data['count_pack'];
    $asign['count_cru']=$data['count_cru'];

    $asign['list_departure']=returnSearchDeparture();
    $asign['list_destination']=returnSearchDestination();
    $asign['list_Durations']=returnSearchDurations();
    $asign['list_Vehicle']=returnSearchVehicle();
    $asign['list_Hotel']=returnSearchHotel();

    $asign['departure']=returnLanguage('departure','Type Your Departure');
    $asign['destination']=returnLanguage('destination','Type Your Destination');
    $asign['search']=returnLanguage('search','SEARCH');
    $asign['name_tour']=returnLanguage('name_tour','Type Your Tour');

    $asign['vehicle']=returnLanguage('vehicle','Vehicle');
    $asign['hotel']=returnLanguage('hotel','Hotel');

    $asign['all_departure']=returnLanguage('all_departure','ALL Departure');
    $asign['all_destination']=returnLanguage('all_destination','ALL Destinations');
    $asign['all_duration']=returnLanguage('all_duration','ALL Durations');

    $asign['contact_us']=returnLanguage('contact_us','CONTACT US');
    $asign['email']=returnLanguage('email','Email');
    $asign['name_surname']=returnLanguage('name_surname','Name And Surname');
    $asign['add_info']=returnLanguage('add_info','Additional Information');
    $asign['contact']=returnLanguage('contact','CONTACT');
    $asign['online_support']=returnLanguage('online_support','Support');
    $asign['danhmuc_subport'] ="";
    if(count($data['danhmuc_subport'])>0)
    {
        foreach($data['danhmuc_subport'] as $dmtour1) {
            $id_dmtour2 = "danhmuc_id=" . $dmtour1->id;
            $data['subport'] = subport_getByTop('', $id_dmtour2, 'id desc');
            if (count($data['subport']) > 0) {
                $asign['danhmuc_subport'] .= "<div class=\"nicdark_focus\">
                <label class=\"lable_subpport\">".returnLanguageField('name', $dmtour1)."</label>

                <div class=\"nicdark_space10\"></div>
                <ul class=\"subpport\">";
                foreach($data['subport'] as $subport) {
                    $asign['danhmuc_subport'] .= "<li>
                        <a href='tel:$subport->phone_format' class=\"mobi_subpport\">
                            <i class=\"icon-mobile\"></i>".$subport->phone."
                        </a>

                    </li>";
                }

                $asign['danhmuc_subport'] .= "</ul>

            </div><div class=\"nicdark_space10\"></div>";
            }
        }
    }

    $asign['email']=returnLanguage('email','email');
    $asign['address']=returnLanguage('address','Address');
    $asign['phone']=returnLanguage('phone','Phone');
    $asign['message']=returnLanguage('message','Message');
    $asign['name']=returnLanguage('name','Name');
    $asign['send']=returnLanguage('send','Please fill in contact information');
    print_template($asign, 'index');
}



