<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_danhmuctintuc($data = array())
{
    $asign = array();


    $asign['danhsach2'] = "";
    $asign['mess']='';
    if(count($data['danhsach'])>0)
    {
        $asign['danhsach2'] = print_item('news_cate', $data['danhsach']);
    }
    else{
        $asign['mess']=returnLanguage('system_data_mess','The system is updated data');
    }

    $asign['name_dm']=$data['banner']['name'];
    $asign['PAGING']=$data['PAGING'];
    $asign['view_as']=returnLanguage('view_as','VIEW AS');
    $asign['gird']=returnLanguage('gird','GRID');
    $asign['list']=returnLanguage('list','LIST');
    print_template($asign, 'news');
}



