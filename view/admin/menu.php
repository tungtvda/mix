<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_menu($data)
{
    $ft=new FastTemplate(DIR.'/view/admin/templates');
    $ft->define('header','header.tpl');
    $ft->define('body','body.tpl');
    $ft->define('footer','footer.tpl');
    //
    $ft->assign('TAB1-CLASS',isset($data['tab1_class'])?$data['tab1_class']:'');
    $ft->assign('TAB2-CLASS',isset($data['tab2_class'])?$data['tab2_class']:'');
    $ft->assign('USER-NAME',isset($data['username'])?$data['username']:'');
    $ft->assign('NOTIFICATION-CONTENT',isset($data['notififation_content'])?$data['notififation_content']:'');
    $ft->assign('TABLE-HEADER',showTableHeader());
    $ft->assign('PAGING',showPaging($data['count_paging'],20,$data['page']));
    $ft->assign('TABLE-BODY',showTableBody($data['table_body']));
    $ft->assign('TABLE-NAME','menu');
    $ft->assign('CONTENT-BOX-LEFT',isset($data['content_box_left'])?$data['content_box_left']:'');
    $ft->assign('CONTENT-BOX-RIGHT',isset($data['content_box_right'])?$data['content_box_right']:' ');
    $ft->assign('NOTIFICATION',isset($data['notification'])?$data['notification']:' ');
    $ft->assign('SITE-NAME',isset($data['sitename'])?$data['sitename']:SITE_NAME);
    $ft->assign('FORM',showFrom(isset($data['form'])?$data['form']:'',isset($data['listfkey'])?$data['listfkey']:array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}
//
function showTableHeader()
{
    return '<th>id</th><th>home</th><th>excursion_tours</th><th>excursion_tours_img</th><th>vacation_packages</th><th>vacation_packages_img</th><th>cruise_tours</th><th>cruise_tours_img</th><th>multi_country</th><th>multi_country_img</th><th>vietnam_visa</th><th>vietnam_visa_img</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->id."\"/></td>";
        $TableBody.="<td>".$obj->id."</td>";
        $TableBody.="<td>".$obj->home."</td>";
        $TableBody.="<td>".$obj->excursion_tours."</td>";
        $TableBody.="<td><img src=\"".$obj->excursion_tours_img."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td>".$obj->vacation_packages."</td>";
        $TableBody.="<td><img src=\"".$obj->vacation_packages_img."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td>".$obj->cruise_tours."</td>";
        $TableBody.="<td><img src=\"".$obj->cruise_tours_img."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td>".$obj->multi_country."</td>";
        $TableBody.="<td><img src=\"".$obj->multi_country_img."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td>".$obj->vietnam_visa."</td>";
        $TableBody.="<td><img src=\"".$obj->vietnam_visa_img."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td><a href=\"?action=edit&id=".$obj->id."\" title=\"Edit\"><img src=\"".SITE_NAME."/view/admin/Themes/images/pencil.png\" alt=\"Edit\"></a>";
        $TableBody.="<a href=\"?action=delete&id=".$obj->id."\" title=\"Delete\" onClick=\"return confirm('Bạn có chắc chắc muốn xóa?')\"><img src=\"".SITE_NAME."/view/admin/Themes/images/cross.png\" alt=\"Delete\"></a> ";
        $TableBody.="</td>";
        $TableBody.="</tr>";
    }
    return $TableBody;
}
//
function showFrom($form,$ListKey=array())
{
    $str_from='';
    $str_from.='<p><label>lang_id</label><input class="text-input small-input" type="text"  name="lang_id" value="'.(($form!=false)?$form->lang_id:'').'" /></p>';
    $str_from.='<p><label>home</label><input class="text-input small-input" type="text"  name="home" value="'.(($form!=false)?$form->home:'').'" /></p>';
    $str_from.='<p><label>title</label><input class="text-input small-input" type="text"  name="title" value="'.(($form!=false)?$form->title:'').'" /></p>';
    $str_from.='<p><label>keyword</label><input class="text-input small-input" type="text"  name="keyword" value="'.(($form!=false)?$form->keyword:'').'" /></p>';
    $str_from.='<p><label>description</label><input class="text-input small-input" type="text"  name="description" value="'.(($form!=false)?$form->description:'').'" /></p>';
    $str_from.='<p><label>excursion_tours</label><input class="text-input small-input" type="text"  name="excursion_tours" value="'.(($form!=false)?$form->excursion_tours:'').'" /></p>';
    $str_from.='<p><label>excursion_tours_img</label><input class="text-input small-input" type="text"  name="excursion_tours_img" value="'.(($form!=false)?$form->excursion_tours_img:'').'"/><a class="button" onclick="openKcEditor(\'excursion_tours_img\');">Upload ảnh</a></p>';
    $str_from.='<p><label>title_excursion</label><input class="text-input small-input" type="text"  name="title_excursion" value="'.(($form!=false)?$form->title_excursion:'').'" /></p>';
    $str_from.='<p><label>keyword_excursion</label><input class="text-input small-input" type="text"  name="keyword_excursion" value="'.(($form!=false)?$form->keyword_excursion:'').'" /></p>';
    $str_from.='<p><label>description_excursion</label><input class="text-input small-input" type="text"  name="description_excursion" value="'.(($form!=false)?$form->description_excursion:'').'" /></p>';
    $str_from.='<p><label>vacation_packages</label><input class="text-input small-input" type="text"  name="vacation_packages" value="'.(($form!=false)?$form->vacation_packages:'').'" /></p>';
    $str_from.='<p><label>vacation_packages_img</label><input class="text-input small-input" type="text"  name="vacation_packages_img" value="'.(($form!=false)?$form->vacation_packages_img:'').'"/><a class="button" onclick="openKcEditor(\'vacation_packages_img\');">Upload ảnh</a></p>';
    $str_from.='<p><label>title_vacation</label><input class="text-input small-input" type="text"  name="title_vacation" value="'.(($form!=false)?$form->title_vacation:'').'" /></p>';
    $str_from.='<p><label>keyword_vacation</label><input class="text-input small-input" type="text"  name="keyword_vacation" value="'.(($form!=false)?$form->keyword_vacation:'').'" /></p>';
    $str_from.='<p><label>description_vacation</label><input class="text-input small-input" type="text"  name="description_vacation" value="'.(($form!=false)?$form->description_vacation:'').'" /></p>';
    $str_from.='<p><label>cruise_tours</label><input class="text-input small-input" type="text"  name="cruise_tours" value="'.(($form!=false)?$form->cruise_tours:'').'" /></p>';
    $str_from.='<p><label>cruise_tours_img</label><input class="text-input small-input" type="text"  name="cruise_tours_img" value="'.(($form!=false)?$form->cruise_tours_img:'').'"/><a class="button" onclick="openKcEditor(\'cruise_tours_img\');">Upload ảnh</a></p>';
    $str_from.='<p><label>title_cruise</label><input class="text-input small-input" type="text"  name="title_cruise" value="'.(($form!=false)?$form->title_cruise:'').'" /></p>';
    $str_from.='<p><label>keyword_cruise</label><input class="text-input small-input" type="text"  name="keyword_cruise" value="'.(($form!=false)?$form->keyword_cruise:'').'" /></p>';
    $str_from.='<p><label>description_cruise</label><input class="text-input small-input" type="text"  name="description_cruise" value="'.(($form!=false)?$form->description_cruise:'').'" /></p>';
    $str_from.='<p><label>multi_country</label><input class="text-input small-input" type="text"  name="multi_country" value="'.(($form!=false)?$form->multi_country:'').'" /></p>';
    $str_from.='<p><label>multi_country_img</label><input class="text-input small-input" type="text"  name="multi_country_img" value="'.(($form!=false)?$form->multi_country_img:'').'"/><a class="button" onclick="openKcEditor(\'multi_country_img\');">Upload ảnh</a></p>';
    $str_from.='<p><label>title_country</label><input class="text-input small-input" type="text"  name="title_country" value="'.(($form!=false)?$form->title_country:'').'" /></p>';
    $str_from.='<p><label>keyword_country</label><input class="text-input small-input" type="text"  name="keyword_country" value="'.(($form!=false)?$form->keyword_country:'').'" /></p>';
    $str_from.='<p><label>description_country</label><input class="text-input small-input" type="text"  name="description_country" value="'.(($form!=false)?$form->description_country:'').'" /></p>';
    $str_from.='<p><label>vietnam_visa</label><input class="text-input small-input" type="text"  name="vietnam_visa" value="'.(($form!=false)?$form->vietnam_visa:'').'" /></p>';
    $str_from.='<p><label>vietnam_visa_img</label><input class="text-input small-input" type="text"  name="vietnam_visa_img" value="'.(($form!=false)?$form->vietnam_visa_img:'').'"/><a class="button" onclick="openKcEditor(\'vietnam_visa_img\');">Upload ảnh</a></p>';
    $str_from.='<p><label>title_vietnam_visa</label><input class="text-input small-input" type="text"  name="title_vietnam_visa" value="'.(($form!=false)?$form->title_vietnam_visa:'').'" /></p>';
    $str_from.='<p><label>keyword_vietnam_visa</label><input class="text-input small-input" type="text"  name="keyword_vietnam_visa" value="'.(($form!=false)?$form->keyword_vietnam_visa:'').'" /></p>';
    $str_from.='<p><label>description_vietnam_visa</label><input class="text-input small-input" type="text"  name="description_vietnam_visa" value="'.(($form!=false)?$form->description_vietnam_visa:'').'" /></p>';
    return $str_from;
}
