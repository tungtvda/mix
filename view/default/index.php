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
    $asign['packages']=returnLanguage('packages','ALL PACKAGES');
    $asign['promotions']=returnLanguage('promotions','PROMOTIONS');
    $asign['top_promotions']=returnLanguage('top_promotions','ALL PACKAGES');
    $asign['best_travel_packages_available']=returnLanguage('best_travel_packages_available','PROMOTIONS');

    $asign['video_intro']=returnLanguage('video_intro','VIDEO INTRODUCTION - MIXTOURIST');
    $asign['video_conttent']=returnLanguage('video_conttent','');
    $asign['more_videos']=returnLanguage('more_videos','MORE VIDEOS');

    $asign['video'] = "";
    if(count($data['video'])>0)
    {
        $asign['video']=$data['video'][0]->link_video;
    }

//    $asign['tour_quocte_ghepdoi'] = "";
//    if(count($data['tour_quocte_ghepdoi'])>0)
//    {
//        $asign['tour_quocte_ghepdoi'] = print_item('tour_index', $data['tour_quocte_ghepdoi']);
//    }
//    $asign['khachsan_index'] = "";
//    if(count($data['khachsan_index'])>0)
//    {
//        $asign['khachsan_index'] = print_item('khachsan', $data['khachsan_index']);
//    }
//    $asign['thuexe_index'] = "";
//    if(count($data['thuexe_index'])>0)
//    {
//        $asign['thuexe_index'] = print_item('thuexe', $data['thuexe_index']);
//    }
//    $asign['thuexe_index'] = "";
//    if(count($data['thuexe_index'])>0)
//    {
//        $asign['thuexe_index'] = print_item('thuexe', $data['thuexe_index']);
//    }
//
//    $asign['ykien_index'] = "";
//    if(count($data['ykien_index'])>0)
//    {
//        $asign['ykien_index'] = print_item('ykien', $data['ykien_index']);
//    }

    print_template($asign, 'index');
}



