<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_request($data)
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
    $ft->assign('TABLE-NAME','request');
    $ft->assign('CONTENT-BOX-LEFT',isset($data['content_box_left'])?$data['content_box_left']:'');
    $ft->assign('CONTENT-BOX-RIGHT',isset($data['content_box_right'])?$data['content_box_right']:' ');
    $ft->assign('NOTIFICATION',isset($data['notification'])?$data['notification']:' ');
    $ft->assign('SITE-NAME',isset($data['sitename'])?$data['sitename']:SITE_NAME);
    $ft->assign('kichhoat_request', 'active');
    $ft->assign('FORM',showFrom(isset($data['form'])?$data['form']:'',isset($data['listfkey'])?$data['listfkey']:array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}
//
function showTableHeader()
{
    return '<th>id</th><th>name</th><th>country</th><th>email</th><th>phone</th><th>status</th><th>created</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->id."\"/></td>";
        $TableBody.="<td>".$obj->id."</td>";
        $TableBody.="<td>".$obj->name."</td>";
        $TableBody.="<td>".$obj->country."</td>";
        $TableBody.="<td>".$obj->email."</td>";
        $TableBody.="<td>".$obj->phone."</td>";
        $TableBody.="<td>".$obj->status."</td>";
        $TableBody.="<td>".$obj->created."</td>";
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
    $str_from.='<p><label>name</label><input class="text-input small-input" type="text"  name="name" value="'.(($form!=false)?$form->name:'').'" /></p>';
    $str_from.='<p><label>country</label><input class="text-input small-input" type="text"  name="country" value="'.(($form!=false)?$form->country:'').'" /></p>';
    $str_from.='<p><label>email</label><input class="text-input small-input" type="text"  name="email" value="'.(($form!=false)?$form->email:'').'" /></p>';
    $str_from.='<p><label>phone</label><input class="text-input small-input" type="text"  name="phone" value="'.(($form!=false)?$form->phone:'').'" /></p>';
    $str_from.='<p><label>arrival_date</label><input class="text-input small-input" type="text"  name="arrival_date" value="'.(($form!=false)?$form->arrival_date:'').'" /></p>';
    $str_from.='<p><label>departure_date</label><input class="text-input small-input" type="text"  name="departure_date" value="'.(($form!=false)?$form->departure_date:'').'" /></p>';
    $str_from.='<p><label>adults</label><input class="text-input small-input" type="text"  name="adults" value="'.(($form!=false)?$form->adults:'').'" /></p>';
    $str_from.='<p><label>children</label><input class="text-input small-input" type="text"  name="children" value="'.(($form!=false)?$form->children:'').'" /></p>';
    $str_from.='<p><label>children_under</label><input class="text-input small-input" type="text"  name="children_under" value="'.(($form!=false)?$form->children_under:'').'" /></p>';
    $str_from.='<p><label>length_trip</label><input class="text-input small-input" type="text"  name="length_trip" value="'.(($form!=false)?$form->length_trip:'').'" /></p>';
    $str_from.='<p><label>tour_style</label><textarea name="tour_style">'.(($form!=false)?$form->tour_style:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'tour_style\'); </script></p>';
    $str_from.='<p><label>destinations</label><textarea name="destinations">'.(($form!=false)?$form->destinations:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'destinations\'); </script></p>';
    $str_from.='<p><label>accommodation</label><input class="text-input small-input" type="text"  name="accommodation" value="'.(($form!=false)?$form->accommodation:'').'" /></p>';
    $str_from.='<p><label>request</label><textarea name="request">'.(($form!=false)?$form->request:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'request\'); </script></p>';
    $str_from.='<p><label>status</label><input  type="checkbox"  name="status" value="1" '.(($form!=false)?(($form->status=='1')?'checked':''):'').' /></p>';
    $str_from.='<p><label>created</label><input class="text-input small-input" type="text"  name="created" value="'.(($form!=false)?$form->created:'').'" /></p>';
    return $str_from;
}
