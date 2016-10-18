<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nguyenvietdinh
 * Date: 2/6/14
 * Time: 3:51 PM
 * To change this template use File | Settings | File Templates.
 */
require_once DIR.'/common/cls_fast_template.php';
require_once DIR.'/common/locdautiengviet.php';
function print_template($data=array(),$tem)
{
    $ft=new FastTemplate(DIR.'/view/default/template');
    $ft->define($tem,$tem.'.tpl');
    $ft->assign('SITE-NAME',SITE_NAME);
    if(count($data)>0)
    {
        $keys=array_keys($data);
        foreach($keys as $item)
        {
            $ft->assign($item,$data[$item]);
        }
    }
    print $ft->parse_and_return($tem);
}

function print_item($file,$ListItem,$LocDau=false,$LocDauAssign=false,$numberformat=false)
{
    if(count($ListItem)>0)
    {
        $array_var=get_object_vars($ListItem[0]);
        $var_name_array=array_keys($array_var);
        $result='';
        $ft=new FastTemplate(DIR.'/view/default/template/item');
        $ft->define('item',$file.'.tpl');
        $ft->assign('SITE-NAME',SITE_NAME);
        $dem=1;
        foreach($ListItem as $item)
        {

            foreach($var_name_array as $var)
            {
                if($LocDau!=false)
                {
                    if($LocDau==$var)
                    {
                        $ft->assign($LocDauAssign,LocDau($item->$var));
                    }
                }

                if($numberformat!=false)
                {
                    if($numberformat==$var)
                    {
                        $ft->assign($var,number_format($item->$var,0,'.','.'));
                    }
                    else
                    {
                        $ft->assign($var,$item->$var);
                    }
                }
                else
                {
                    $ft->assign($var,$item->$var);
                }
            }

            if(get_class($item)=='danhmuc_2')
            {
                    $ft->assign('name',returnLanguageField('name', $item));
                $ft->assign('view_all',returnLanguage('view_all','VIEW ALL'));
                $ft->assign('link',link_tour($item));
                $ft->assign('link_2',link_tour_2($item));
            }
            if(get_class($item)=='video')
            {
                $ft->assign('name',returnLanguageField('name', $item));
            }
            if(get_class($item)=='link')
            {
                $ft->assign('name',returnLanguageField('name', $item));
            }
            if(get_class($item)=='slide')
            {
                $ft->assign('name',returnLanguageField('name', $item));
            }
            if(get_class($item)=='tour')
            {

                $ft->assign('name',returnLanguageField('name', $item));
                $ft->assign('price',returnLanguageField('price', $item));
                $ft->assign('durations',returnLanguageField('durations', $item));
                $content=returnLanguageField('content', $item);
                if (strlen($content) > 200) {
                    $ten1=strip_tags($content);

                    $ten = substr($ten1, 0, 200);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('content',$name);
                } else {
                    $ft->assign('content',strip_tags($content));
                }
                $ft->assign('link',link_tourdetail($item));
                $ft->assign('currency',returnLanguage('currency','$'));
                $ft->assign('detail',returnLanguage('detail','DETAIL'));
                $ft->assign('booking',returnLanguage('booking','BOOKING'));
                $ft->assign('vehicle',returnLanguage('vehicle',''));

            }
            if(get_class($item)=='danhmuc_tintuc') {
                $ft->assign('name', returnLanguageField('name', $item));
                $ft->assign('link',link_news($item));
                $ft->assign('view_all', returnLanguage('view_all', 'VIEW ALL'));
            }
            if(get_class($item)=='news')
            {
                $ft->assign('name',returnLanguageField('name', $item));
                $content=returnLanguageField('content', $item);
                if (strlen($content) > 210) {
                    $ten1=strip_tags($content);

                    $ten = substr($ten1, 0, 210);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('content',$name);
                } else {
                    $ft->assign('content',strip_tags($content));
                }
                $ft->assign('detail',returnLanguage('detail','DETAIL'));
                $ft->assign('news',returnLanguage('news','News'));
                $ft->assign('link',link_newsdetail($item));
            }


                $dem=$dem+1;
            $result.=$ft->parse_and_return('item');
        }
        return $result;
    }
    else
    {
        return '';
    }

}
function link_tour($app)
{
    return SITE_NAME.'/tour/'.$app->name_url.'/';
}
function link_tour_2($app)
{
    return SITE_NAME.'/destinations/'.$app->name_url.'/';
}
function link_tourdetail($app)
{
    return SITE_NAME.'/'.$app->name_url.'.html';
}

function link_news($app)
{
    return SITE_NAME.'/news/'.$app->name_url.'/';
}
function link_newsdetail($app)
{
    return SITE_NAME.'/news/'.$app->name_url.'.html';
}






function link_album($app)
{
    return SITE_NAME.'/anh-cuoi/'.$app->Name_url.'/';
}
function link_anhcuoi($app)
{
    return SITE_NAME.'/'.LocDau($app->Name).'-l6'.$app->Id.'.html';
}
function link_danhmuckhachsan($app)
{
    return SITE_NAME.'/khach-san/'.LocDau($app->Name).'/';
}
function link_danhmuctourtrongnuoc($app)
{
    return SITE_NAME.'/'.$app->Name_url.'/';
}
function link_danhmuctourquocte($app)
{
    return SITE_NAME.'/'.$app->Name_url.'/';
}

function link_tourtrongnuoc($app)
{
    return SITE_NAME.'/'.LocDau($app->Name).'-l1'.$app->Id.'.html';
}



function link_khachsan($app)
{
    return SITE_NAME.'/'.LocDau($app->Name).'-l3'.$app->Id.'.html';
}
function link_thuexe($app)
{
    return SITE_NAME.'/'.LocDau($app->Name).'-l4'.$app->Id.'.html';
}
function link_ykien($app)
{
    return SITE_NAME.'/'.LocDau($app->Name).'-l5'.$app->Id.'.html';
}

function sao($app)
{
    $sao = "";
    if ($app == 0) {
        $sao = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    } else {


        if ($app == 1) {
            $sao = '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        } else {
            if ($app == 2) {
                $sao = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
            } else {
                if ($app == 3) {
                    $sao = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
                } else {
                    if ($app == 4) {
                        $sao = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
                    } else {
                        $sao = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                    }

                }

            }
        }
    }
    return $sao;
}

