<?php
class danhmuc_2
{
    public $id,$danhmuc1_id,$name,$name_cn,$name_url,$img,$banner,$position,$title,$title_cn,$keyword,$keyword_cn,$description,$description_en;
    public function danhmuc_2($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->danhmuc1_id=isset($data['danhmuc1_id'])?$data['danhmuc1_id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->name_cn=isset($data['name_cn'])?$data['name_cn']:'';
    $this->name_url=isset($data['name_url'])?$data['name_url']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->banner=isset($data['banner'])?$data['banner']:'';
    $this->position=isset($data['position'])?$data['position']:'';
    $this->title=isset($data['title'])?$data['title']:'';
    $this->title_cn=isset($data['title_cn'])?$data['title_cn']:'';
    $this->keyword=isset($data['keyword'])?$data['keyword']:'';
    $this->keyword_cn=isset($data['keyword_cn'])?$data['keyword_cn']:'';
    $this->description=isset($data['description'])?$data['description']:'';
    $this->description_en=isset($data['description_en'])?$data['description_en']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->danhmuc1_id=addslashes($this->danhmuc1_id);
            $this->name=addslashes($this->name);
            $this->name_cn=addslashes($this->name_cn);
            $this->name_url=addslashes($this->name_url);
            $this->img=addslashes($this->img);
            $this->banner=addslashes($this->banner);
            $this->position=addslashes($this->position);
            $this->title=addslashes($this->title);
            $this->title_cn=addslashes($this->title_cn);
            $this->keyword=addslashes($this->keyword);
            $this->keyword_cn=addslashes($this->keyword_cn);
            $this->description=addslashes($this->description);
            $this->description_en=addslashes($this->description_en);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->danhmuc1_id=stripslashes($this->danhmuc1_id);
            $this->name=stripslashes($this->name);
            $this->name_cn=stripslashes($this->name_cn);
            $this->name_url=stripslashes($this->name_url);
            $this->img=stripslashes($this->img);
            $this->banner=stripslashes($this->banner);
            $this->position=stripslashes($this->position);
            $this->title=stripslashes($this->title);
            $this->title_cn=stripslashes($this->title_cn);
            $this->keyword=stripslashes($this->keyword);
            $this->keyword_cn=stripslashes($this->keyword_cn);
            $this->description=stripslashes($this->description);
            $this->description_en=stripslashes($this->description_en);
        }
}
