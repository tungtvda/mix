<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 8/15/14
 * Time: 3:43 PM
 */
require_once DIR.'/view/default/public.php';
function view_slide($data=array())
{
    $asign=array();
//    $asign['slide'] ="";
//    if(count($data['slide'])>0)
//    {
//        $asign['slide'] = print_item('slide', $data['slide']);
//    }
    print_template($asign,'slide');
}
