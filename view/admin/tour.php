<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_tour($data)
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
    $ft->assign('TABLE-NAME','tour');
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
    return '<th>id</th><th>DanhMuc1Id</th><th>DanhMuc2Id</th><th>name</th><th>img</th><th>price</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->id."\"/></td>";
        $TableBody.="<td>".$obj->id."</td>";
        $TableBody.="<td>".$obj->DanhMuc1Id."</td>";
        $TableBody.="<td>".$obj->DanhMuc2Id."</td>";
        $TableBody.="<td>".$obj->name."</td>";
        $TableBody.="<td><img src=\"".$obj->img."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td>".$obj->price."</td>";
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
    $str_from.='<p><label>DanhMuc1Id</label>';
    $str_from.='<select name="DanhMuc1Id">';
    if(isset($ListKey['DanhMuc1Id']))
    {
        foreach($ListKey['DanhMuc1Id'] as $key)
        {
            $str_from.='<option value="'.$key->id.'" '.(($form!=false)?(($form->DanhMuc1Id==$key->id)?'selected':''):'').'>'.$key->name.'</option>';
        }
    }
    $str_from.='</select></p>';
    $str_from.='<p><label>DanhMuc2Id</label>';
    $str_from.='<select name="DanhMuc2Id">';
    if(isset($ListKey['DanhMuc2Id']))
    {
        foreach($ListKey['DanhMuc2Id'] as $key)
        {
            $str_from.='<option value="'.$key->id.'" '.(($form!=false)?(($form->DanhMuc2Id==$key->id)?'selected':''):'').'>'.$key->name.'</option>';
        }
    }
    $str_from.='</select></p>';
    $str_from.='<p><label>lang_id</label><input class="text-input small-input" type="text"  name="lang_id" value="'.(($form!=false)?$form->lang_id:'').'" /></p>';
    $str_from.='<p><label>patient_id</label><input class="text-input small-input" type="text"  name="patient_id" value="'.(($form!=false)?$form->patient_id:'').'" /></p>';
    $str_from.='<p><label>promotion</label><input class="text-input small-input" type="text"  name="promotion" value="'.(($form!=false)?$form->promotion:'').'"/><a class="button" onclick="openKcEditor(\'promotion\');">Upload ảnh</a></p>';
    $str_from.='<p><label>packages</label><input class="text-input small-input" type="text"  name="packages" value="'.(($form!=false)?$form->packages:'').'"/><a class="button" onclick="openKcEditor(\'packages\');">Upload ảnh</a></p>';
    $str_from.='<p><label>name</label><input class="text-input small-input" type="text"  name="name" value="'.(($form!=false)?$form->name:'').'" /></p>';
    $str_from.='<p><label>name_url</label><input class="text-input small-input" type="text"  name="name_url" value="'.(($form!=false)?$form->name_url:'').'" /></p>';
    $str_from.='<p><label>img</label><input class="text-input small-input" type="text"  name="img" value="'.(($form!=false)?$form->img:'').'"/><a class="button" onclick="openKcEditor(\'img\');">Upload ảnh</a></p>';
    $str_from.='<p><label>price</label><input class="text-input small-input" type="text"  name="price" value="'.(($form!=false)?$form->price:'').'" /></p>';
    $str_from.='<p><label>durations</label><input class="text-input small-input" type="text"  name="durations" value="'.(($form!=false)?$form->durations:'').'" /></p>';
    $str_from.='<p><label>departure</label><input class="text-input small-input" type="text"  name="departure" value="'.(($form!=false)?$form->departure:'').'" /></p>';
    $str_from.='<p><label>destination</label><input class="text-input small-input" type="text"  name="destination" value="'.(($form!=false)?$form->destination:'').'" /></p>';
    $str_from.='<p><label>departure_time</label><input class="text-input small-input" type="text"  name="departure_time" value="'.(($form!=false)?$form->departure_time:'').'" /></p>';
    $str_from.='<p><label>vehicle</label><input class="text-input small-input" type="text"  name="vehicle" value="'.(($form!=false)?$form->vehicle:'').'" /></p>';
    $str_from.='<p><label>hotel</label><input class="text-input small-input" type="text"  name="hotel" value="'.(($form!=false)?$form->hotel:'').'" /></p>';
    $str_from.='<p><label>schedule</label><textarea name="schedule">'.(($form!=false)?$form->schedule:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'schedule\'); </script></p>';
    $str_from.='<p><label>price_list</label><textarea name="price_list">'.(($form!=false)?$form->price_list:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'price_list\'); </script></p>';
    $str_from.='<p><label>content</label><textarea name="content">'.(($form!=false)?$form->content:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'content\'); </script></p>';
    $str_from.='<p><label>list_img</label><textarea name="list_img">'.(($form!=false)?$form->list_img:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'list_img\'); </script></p>';
    $str_from.='<p><label>title</label><input class="text-input small-input" type="text"  name="title" value="'.(($form!=false)?$form->title:'').'" /></p>';
    $str_from.='<p><label>keyword</label><input class="text-input small-input" type="text"  name="keyword" value="'.(($form!=false)?$form->keyword:'').'" /></p>';
    $str_from.='<p><label>description</label><input class="text-input small-input" type="text"  name="description" value="'.(($form!=false)?$form->description:'').'" /></p>';
    return $str_from;
}
