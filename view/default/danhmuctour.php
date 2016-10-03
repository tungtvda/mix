<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_danhmuctour($data = array())
{
    $asign = array();

    $asign['danhsach'] = "";
    if(count($data['danhsach'])>0)
    {
        $asign['danhsach'] = print_item('danhmuc', $data['danhsach']);
    }
    $asign['danhsach2'] = "";
    if(count($data['danhsach'])>0)
    {
        $asign['danhsach2'] = print_item('packages', $data['danhsach']);
    }

    $asign['name_dm']=returnLanguageField('name', $data['menu'][1]);
    $asign['PAGING']=$data['PAGING'];
    $asign['view_as']=returnLanguage('view_as','VIEW AS');
    $asign['gird']=returnLanguage('gird','GRID');
    $asign['list']=returnLanguage('list','LIST');
    print_template($asign, 'danhmuctour');
}



