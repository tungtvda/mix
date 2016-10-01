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


    $asign['video'] = "";
    if(count($data['video'])>0)
    {
        $asign['video']=$data['video'][0]->link_video;
    }

    $asign['count_destinations']=$data['count_destinations'];
    $asign['count_pack']=$data['count_pack'];
    $asign['count_cru']=$data['count_cru'];
    print_template($asign, 'index');
}



