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

    $asign['img']= $data['tour'][0]->img;
    $asign['name_dm']= $data['banner']['name'];
    $asign['link']=SITE_NAME.'/news/'.$data['tour'][0]->name_url.'.html';
    $asign['content']=returnLanguageField('content', $data['tour'][0]);



    $asign['you_may_also_detail']=returnLanguage('you_may_also_detail','YOU MAY ALSO LIKE');

//    $asign['tour_noibat'] = "";
//    if(count($data['tour_noibat'])>0)
//    {
//        $asign['tour_noibat'] = print_item('tour_noibat', $data['tour_noibat']);
//    }

    print_template($asign, 'chitiettintuc');
}



