<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_chitietinfo($data = array())
{
    $asign = array();
//
    $asign['img']= $data['info'][0]->img;
//    $asign['created']= $data['info'][0]->created;
    $asign['name_dm']= $data['banner']['name'];
    $asign['link']= $data['banner']['link'];
    $asign['content']=returnLanguageField('content', $data['info'][0]);
////
////
////
//    $asign['related_rticles']=returnLanguage('related_rticles','Related articles');
//    $asign['new_left']=returnLanguage('new_left','News');



    print_template($asign, 'chitietinfo');
}



