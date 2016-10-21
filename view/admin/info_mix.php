<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_info_mix($data)
{
    $ft=new FastTemplate(DIR.'/view/admin/templates');
    $ft->assign('count_contact',$_SESSION['contact']);
    $ft->assign('count_request',$_SESSION['request']);
    $ft->assign('count_booking',$_SESSION['booking']);
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
    $ft->assign('TABLE-NAME','info_mix');
    $ft->assign('CONTENT-BOX-LEFT',isset($data['content_box_left'])?$data['content_box_left']:'');
    $ft->assign('CONTENT-BOX-RIGHT',isset($data['content_box_right'])?$data['content_box_right']:' ');
    $ft->assign('NOTIFICATION',isset($data['notification'])?$data['notification']:' ');
    $ft->assign('SITE-NAME',isset($data['sitename'])?$data['sitename']:SITE_NAME);
    $ft->assign('kichhoat_gioithieu', 'active');
    $ft->assign('FORM',showFrom(isset($data['form'])?$data['form']:'',isset($data['listfkey'])?$data['listfkey']:array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}
//
function showTableHeader()
{
    return '<th>id</th><th>img</th><th>name</th><th>name_cn</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->id."\"/></td>";
        $TableBody.="<td>".$obj->id."</td>";
        $TableBody.="<td><img src=\"".$obj->img."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td>".$obj->name."</td>";
        $TableBody.="<td>".$obj->name_cn."</td>";
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
    $str_from.='<p><label>img</label><input class="text-input small-input" type="text"  name="img" value="'.(($form!=false)?$form->img:'').'"/><a class="button" onclick="openKcEditor(\'img\');">Upload ảnh</a></p>';
    $str_from.='<p><label>name</label><input class="text-input small-input" type="text"  name="name" value="'.(($form!=false)?$form->name:'').'" /></p>';
    $str_from.='<p><label>name_cn</label><input class="text-input small-input" type="text"  name="name_cn" value="'.(($form!=false)?$form->name_cn:'').'" /></p>';
    $str_from.='<p><label>content</label><textarea name="content">'.(($form!=false)?$form->content:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'content\'); </script></p>';
    $str_from.='<p><label>content_cn</label><textarea name="content_cn">'.(($form!=false)?$form->content_cn:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'content_cn\'); </script></p>';
    $str_from.='<p><label>title</label><input class="text-input small-input" type="text"  name="title" value="'.(($form!=false)?$form->title:'').'" /></p>';
    $str_from.='<p><label>title_cn</label><input class="text-input small-input" type="text"  name="title_cn" value="'.(($form!=false)?$form->title_cn:'').'" /></p>';
    $str_from.='<p><label>keyword</label><input class="text-input small-input" type="text"  name="keyword" value="'.(($form!=false)?$form->keyword:'').'" /></p>';
    $str_from.='<p><label>keyword_cn</label><input class="text-input small-input" type="text"  name="keyword_cn" value="'.(($form!=false)?$form->keyword_cn:'').'" /></p>';
    $str_from.='<p><label>description</label><input class="text-input small-input" type="text"  name="description" value="'.(($form!=false)?$form->description:'').'" /></p>';
    $str_from.='<p><label>description_cn</label><input class="text-input small-input" type="text"  name="description_cn" value="'.(($form!=false)?$form->description_cn:'').'" /></p>';
    return $str_from;
}
