<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
require_once DIR.'/model/danhmuc_2Service.php';
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
    $ft->assign('kichhoat_tour', 'active');
    $ft->assign('FORM',showFrom(isset($data['form'])?$data['form']:'',isset($data['listfkey'])?$data['listfkey']:array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}
//
function showTableHeader()
{
    return '<th>id</th><th>DanhMuc1Id</th><th>DanhMuc2Id</th><th>promotion</th><th>packages</th><th>name</th><th>code</th><th>img</th><th>price</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $data_destinations=array();
        if($obj->danhmuc2_destinations!=1)
        {
            $data_destinations=danhmuc_2_getById($obj->danhmuc2_destinations);
        }

        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->id."\"/></td>";
        $TableBody.="<td>".$obj->id."</td>";
        $TableBody.="<td>.$obj->DanhMuc1Id.";
        if($obj->danhmuc1_destinations==6){
            $TableBody.="<br>// Destinations";
        }
        $TableBody.="</td>";
        $TableBody.="<td>".$obj->DanhMuc2Id;
        if(count($data_destinations)>0){
            $TableBody.="<br>// ".$data_destinations[0]->name;
        }
            $TableBody.="</td>";
        $TableBody.="<td>".$obj->promotion."</td>";
        $TableBody.="<td>".$obj->packages."</td>";
        $TableBody.="<td>".$obj->name."</td>";
        $TableBody.="<td>".$obj->code."</td>";
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
    $str_from.='<p><label>Chọn danh mục cấp 1</label>';
    $str_from.='<select name="DanhMuc1Id" id="DanhMuc1Id">';
    if($form!=false)
    {
        if(isset($ListKey['DanhMuc1Id']))
        {
            foreach($ListKey['DanhMuc1Id'] as $key)
            {
                $str_from.='<option value="'.$key->id.'" '.(($form!=false)?(($form->DanhMuc1Id==$key->id)?'selected':''):'').'>'.$key->name.'</option>';
            }
        }
    }
    else
    {

        if(isset($ListKey['DanhMuc1Id']))
        {
            foreach($ListKey['DanhMuc1Id'] as $key)
            {
                $str_from.='<option value="'.$key->id.'" '.(($form!=false)?(($form->DanhMuc1Id==$key->id)?'selected':''):'').'>'.$key->name.'</option>';
            }
        }
    }
    $str_from.='</select></p>';
    $str_from.='<p><label>Chọn danh mục cấp 2</label>';
    $str_from.='<select name="DanhMuc2Id" id="DanhMuc2Id">';
    if($form!=false)
    {
        $str_from .= '<option value="1">Chọn danh mục cấp 2</option>';
        if(isset($ListKey['DanhMuc2Id']))
        {
            foreach($ListKey['DanhMuc2Id'] as $key)
            {
                $str_from.='<option value="'.$key->id.'" '.(($form!=false)?(($form->DanhMuc2Id==$key->id)?'selected':''):'').'>'.$key->name.'</option>';
            }
        }
    }
    else
    {
        $str_from .= '<option value="1">Chọn danh mục cấp 2</option>';
    }
    $str_from.='</select></p>';
    $str_from.='<p><label>danhmuc1_destinations</label>
<select name="danhmuc1_destinations" id="danhmuc1_destinations">
<option value="0">Chọn danh mục Destinations</option>
<option value="6" '.(($form!=false)?(($form->danhmuc1_destinations==6)?'selected':''):'').'>Destinations</option>
</select>
</p>';
    $str_from.='<p><label>danhmuc2_destinations</label>
<select name="danhmuc2_destinations" id="danhmuc2_destinations">';
    if($form!=false)
    {
        $str_from .= '<option value="1">Chọn danh mục cấp 2 destinations</option>';
        if(isset($ListKey['destinations']))
        {
            foreach($ListKey['destinations'] as $key)
            {
                $str_from.='<option value="'.$key->id.'" '.(($form!=false)?(($form->danhmuc2_destinations==$key->id)?'selected':''):'').'>'.$key->name.'</option>';
            }
        }
    }
    else
    {
        $str_from .= '<option value="1">Chọn danh mục cấp 2 destinations</option>';
    }


    $str_from.='</select></p>';
    $str_from.='<p><label>promotion</label><input  type="checkbox"  name="promotion" value="1" '.(($form!=false)?(($form->promotion=='1')?'checked':''):'').' /></p>';
    $str_from.='<p><label>packages</label><input  type="checkbox"  name="packages" value="1" '.(($form!=false)?(($form->packages=='1')?'checked':''):'').' /></p>';
    $str_from.='<p><label>name</label><input class="text-input small-input" type="text"  name="name" value="'.(($form!=false)?$form->name:'').'" /></p>';
    $str_from.='<p><label>name_cn</label><input class="text-input small-input" type="text"  name="name_cn" value="'.(($form!=false)?$form->name_cn:'').'" /></p>';
    $str_from.='<p><label>name_url</label><input class="text-input small-input" type="text"  name="name_url" value="'.(($form!=false)?$form->name_url:'').'" /></p>';
    $str_from.='<p><label>code</label><input class="text-input small-input" type="text"  name="code" value="'.(($form!=false)?$form->code:'').'" /></p>';
    $str_from.='<p><label>img</label><input class="text-input small-input" type="text"  name="img" value="'.(($form!=false)?$form->img:'').'"/><a class="button" onclick="openKcEditor(\'img\');">Upload ảnh</a></p>';
    $str_from.='<p><label>price</label><input class="text-input small-input" type="text"  name="price" value="'.(($form!=false)?$form->price:'').'" /></p>';
    $str_from.='<p><label>price_cn</label><input class="text-input small-input" type="text"  name="price_cn" value="'.(($form!=false)?$form->price_cn:'').'" /></p>';
    $str_from.='<p><label>price_children_5_10</label><input class="text-input small-input" type="text"  name="price_children_5_10" value="'.(($form!=false)?$form->price_children_5_10:'').'" /></p>';
    $str_from.='<p><label>price_children_5_10_en</label><input class="text-input small-input" type="text"  name="price_children_5_10_en" value="'.(($form!=false)?$form->price_children_5_10_en:'').'" /></p>';
    $str_from.='<p><label>price_children_under_5</label><input class="text-input small-input" type="text"  name="price_children_under_5" value="'.(($form!=false)?$form->price_children_under_5:'').'" /></p>';
    $str_from.='<p><label>price_children_under_5_cn</label><input class="text-input small-input" type="text"  name="price_children_under_5_cn" value="'.(($form!=false)?$form->price_children_under_5_cn:'').'" /></p>';
    $str_from.='<p><label>durations</label><input class="text-input small-input" type="text"  name="durations" value="'.(($form!=false)?$form->durations:'').'" /></p>';
    $str_from.='<p><label>durations_cn</label><input class="text-input small-input" type="text"  name="durations_cn" value="'.(($form!=false)?$form->durations_cn:'').'" /></p>';
    $str_from.='<p><label>departure</label><input class="text-input small-input" type="text"  name="departure" value="'.(($form!=false)?$form->departure:'').'" /></p>';
    $str_from.='<p><label>destination</label><input class="text-input small-input" type="text"  name="destination" value="'.(($form!=false)?$form->destination:'').'" /></p>';
    $str_from.='<p><label>departure_time</label><input class="text-input small-input" type="text"  name="departure_time" value="'.(($form!=false)?$form->departure_time:'').'" /></p>';
    $str_from.='<p><label>vehicle</label><input class="text-input small-input" type="text"  name="vehicle" value="'.(($form!=false)?$form->vehicle:'').'" /></p>';
    $str_from.='<p><label>vehicle_cn</label><input class="text-input small-input" type="text"  name="vehicle_cn" value="'.(($form!=false)?$form->vehicle_cn:'').'" /></p>';
    $str_from.='<p><label>hotel</label><input class="text-input small-input" type="text"  name="hotel" value="'.(($form!=false)?$form->hotel:'').'" /></p>';
    $str_from.='<p><label>summary</label><textarea name="summary">'.(($form!=false)?$form->summary:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'summary\'); </script></p>';
    $str_from.='<p><label>summary_cn</label><textarea name="summary_cn">'.(($form!=false)?$form->summary_cn:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'summary_cn\'); </script></p>';
    $str_from.='<p><label>highlights</label><textarea name="highlights">'.(($form!=false)?$form->highlights:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'highlights\'); </script></p>';
    $str_from.='<p><label>highlights_cn</label><textarea name="highlights_cn">'.(($form!=false)?$form->highlights_cn:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'highlights_cn\'); </script></p>';
    $str_from.='<p><label>schedule</label><textarea name="schedule">'.(($form!=false)?$form->schedule:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'schedule\'); </script></p>';
    $str_from.='<p><label>schedule_cn</label><textarea name="schedule_cn">'.(($form!=false)?$form->schedule_cn:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'schedule_cn\'); </script></p>';
    $str_from.='<p><label>price_list</label><textarea name="price_list">'.(($form!=false)?$form->price_list:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'price_list\'); </script></p>';
    $str_from.='<p><label>price_list_cn</label><textarea name="price_list_cn">'.(($form!=false)?$form->price_list_cn:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'price_list_cn\'); </script></p>';
    $str_from.='<p><label>content</label><textarea name="content">'.(($form!=false)?$form->content:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'content\'); </script></p>';
    $str_from.='<p><label>content_cn</label><textarea name="content_cn">'.(($form!=false)?$form->content_cn:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'content_cn\'); </script></p>';
    $str_from.='<p><label>list_img</label><textarea name="list_img">'.(($form!=false)?$form->list_img:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'list_img\'); </script></p>';
    $str_from.='<p><label>title</label><input class="text-input small-input" type="text"  name="title" value="'.(($form!=false)?$form->title:'').'" /></p>';
    $str_from.='<p><label>title_cn</label><input class="text-input small-input" type="text"  name="title_cn" value="'.(($form!=false)?$form->title_cn:'').'" /></p>';
    $str_from.='<p><label>keyword</label><input class="text-input small-input" type="text"  name="keyword" value="'.(($form!=false)?$form->keyword:'').'" /></p>';
    $str_from.='<p><label>keyword_cn</label><input class="text-input small-input" type="text"  name="keyword_cn" value="'.(($form!=false)?$form->keyword_cn:'').'" /></p>';
    $str_from.='<p><label>description</label><input class="text-input small-input" type="text"  name="description" value="'.(($form!=false)?$form->description:'').'" /></p>';
    $str_from.='<p><label>description_cn</label><input class="text-input small-input" type="text"  name="description_cn" value="'.(($form!=false)?$form->description_cn:'').'" /></p>';
    $str_from.='<p><label>inclusion</label><textarea name="inclusion">'.(($form!=false)?$form->inclusion:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'inclusion\'); </script></p>';
    $str_from.='<p><label>inclusion_cn</label><textarea name="inclusion_cn">'.(($form!=false)?$form->inclusion_cn:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'inclusion_cn\'); </script></p>';
    $str_from.='<p><label>exclusion</label><textarea name="exclusion">'.(($form!=false)?$form->exclusion:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'exclusion\'); </script></p>';
    $str_from.='<p><label>exclusion_cn</label><textarea name="exclusion_cn">'.(($form!=false)?$form->exclusion_cn:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'exclusion_cn\'); </script></p>';
    return $str_from;
}
