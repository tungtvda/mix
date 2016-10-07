<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_search($data = array())
{
    $asign = array();

    $asign['danhsach'] = "";
    $asign['danhsach2'] = "";
    $asign['mess']='';
    if(count($data['danhsach'])>0||count($data['danhsach_news'])>0)
    {
    }
    else{
        $asign['mess']=returnLanguage('no_search','No search results');
    }
    $asign['dis_tour']='style="display: none"';
    if(count($asign['danhsach'])>0)
    {
        $asign['danhsach'] = print_item('danhmuc', $data['danhsach']);
        $asign['danhsach2'] = print_item('packages', $data['danhsach']);
        $asign['dis_tour']='';
    }
    $asign['dis_news']='display: none';
    if(count($data['danhsach_news'])>0)
    {
        $asign['danhsach_news'] = print_item('news_cate', $data['danhsach_news']);
        $asign['dis_news']='';
    }

    $asign['search_resul_tour']=$data['search_resul_tour'];
    $asign['search_resul_news']=$data['search_resul_news'];
    $asign['name_dm']=$data['banner']['name'];
    $asign['gird']=returnLanguage('gird','GRID');
    $asign['list']=returnLanguage('list','LIST');
    print_template($asign, 'search');
}



