<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_chitiettintuc($data = array())
{
    $asign = array();

    $asign['img']= $data['news'][0]->img;
    $asign['created']= $data['news'][0]->created;
    $asign['name_dm']= $data['banner']['name'];
    $asign['link']=SITE_NAME.'/news/'.$data['news'][0]->name_url.'.html';
    $asign['content']=returnLanguageField('content', $data['news'][0]);
//
//
//
    $asign['related_rticles']=returnLanguage('related_rticles','Related articles');
    $asign['new_left']=returnLanguage('new_left','News');

    $asign['tour_noibat'] = "";
    if(count($data['tour_noibat'])>0)
    {
        $asign['tour_noibat'] = print_item('news_noibat', $data['tour_noibat']);
    }

    print_template($asign, 'chitiettintuc');
}



