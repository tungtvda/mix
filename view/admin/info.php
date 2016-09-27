<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_info($data)
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
    $ft->assign('TABLE-NAME','info');
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
    return '<th>id</th><th>id_lang</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->id."\"/></td>";
        $TableBody.="<td>".$obj->id."</td>";
        $TableBody.="<td>".$obj->id_lang."</td>";
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
    $str_from.='<p><label>id_lang</label><input class="text-input small-input" type="text"  name="id_lang" value="'.(($form!=false)?$form->id_lang:'').'" /></p>';
    $str_from.='<p><label>about_us</label><textarea name="about_us">'.(($form!=false)?$form->about_us:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'about_us\'); </script></p>';
    $str_from.='<p><label>title_about</label><input class="text-input small-input" type="text"  name="title_about" value="'.(($form!=false)?$form->title_about:'').'" /></p>';
    $str_from.='<p><label>keyword_about</label><input class="text-input small-input" type="text"  name="keyword_about" value="'.(($form!=false)?$form->keyword_about:'').'" /></p>';
    $str_from.='<p><label>description_about</label><input class="text-input small-input" type="text"  name="description_about" value="'.(($form!=false)?$form->description_about:'').'" /></p>';
    $str_from.='<p><label>why_us</label><textarea name="why_us">'.(($form!=false)?$form->why_us:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'why_us\'); </script></p>';
    $str_from.='<p><label>title_why</label><input class="text-input small-input" type="text"  name="title_why" value="'.(($form!=false)?$form->title_why:'').'" /></p>';
    $str_from.='<p><label>keyword_why</label><input class="text-input small-input" type="text"  name="keyword_why" value="'.(($form!=false)?$form->keyword_why:'').'" /></p>';
    $str_from.='<p><label>description_why</label><input class="text-input small-input" type="text"  name="description_why" value="'.(($form!=false)?$form->description_why:'').'" /></p>';
    $str_from.='<p><label>our_services</label><textarea name="our_services">'.(($form!=false)?$form->our_services:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'our_services\'); </script></p>';
    $str_from.='<p><label>title_services</label><input class="text-input small-input" type="text"  name="title_services" value="'.(($form!=false)?$form->title_services:'').'" /></p>';
    $str_from.='<p><label>keyword_services</label><input class="text-input small-input" type="text"  name="keyword_services" value="'.(($form!=false)?$form->keyword_services:'').'" /></p>';
    $str_from.='<p><label>description_services</label><input class="text-input small-input" type="text"  name="description_services" value="'.(($form!=false)?$form->description_services:'').'" /></p>';
    $str_from.='<p><label>terms_conditions</label><textarea name="terms_conditions">'.(($form!=false)?$form->terms_conditions:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'terms_conditions\'); </script></p>';
    $str_from.='<p><label>title_conditions</label><input class="text-input small-input" type="text"  name="title_conditions" value="'.(($form!=false)?$form->title_conditions:'').'" /></p>';
    $str_from.='<p><label>keyword_conditions</label><input class="text-input small-input" type="text"  name="keyword_conditions" value="'.(($form!=false)?$form->keyword_conditions:'').'" /></p>';
    $str_from.='<p><label>description_conditions</label><input class="text-input small-input" type="text"  name="description_conditions" value="'.(($form!=false)?$form->description_conditions:'').'" /></p>';
    $str_from.='<p><label>payment_method</label><textarea name="payment_method">'.(($form!=false)?$form->payment_method:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'payment_method\'); </script></p>';
    $str_from.='<p><label>title_</label><input class="text-input small-input" type="text"  name="title_" value="'.(($form!=false)?$form->title_:'').'" /></p>';
    $str_from.='<p><label>keyword_</label><input class="text-input small-input" type="text"  name="keyword_" value="'.(($form!=false)?$form->keyword_:'').'" /></p>';
    $str_from.='<p><label>description_</label><input class="text-input small-input" type="text"  name="description_" value="'.(($form!=false)?$form->description_:'').'" /></p>';
    $str_from.='<p><label>privacy_policy</label><textarea name="privacy_policy">'.(($form!=false)?$form->privacy_policy:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'privacy_policy\'); </script></p>';
    $str_from.='<p><label>title_policy</label><input class="text-input small-input" type="text"  name="title_policy" value="'.(($form!=false)?$form->title_policy:'').'" /></p>';
    $str_from.='<p><label>keyword_policy</label><input class="text-input small-input" type="text"  name="keyword_policy" value="'.(($form!=false)?$form->keyword_policy:'').'" /></p>';
    $str_from.='<p><label>description_policy</label><input class="text-input small-input" type="text"  name="description_policy" value="'.(($form!=false)?$form->description_policy:'').'" /></p>';
    return $str_from;
}
