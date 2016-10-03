<?php
class menu
{
    public $id,$img,$name,$name_cn,$title,$title_cn,$keyword,$keyword_cn,$description,$description_cn;
    public function menu($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->name_cn=isset($data['name_cn'])?$data['name_cn']:'';
    $this->title=isset($data['title'])?$data['title']:'';
    $this->title_cn=isset($data['title_cn'])?$data['title_cn']:'';
    $this->keyword=isset($data['keyword'])?$data['keyword']:'';
    $this->keyword_cn=isset($data['keyword_cn'])?$data['keyword_cn']:'';
    $this->description=isset($data['description'])?$data['description']:'';
    $this->description_cn=isset($data['description_cn'])?$data['description_cn']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->img=addslashes($this->img);
            $this->name=addslashes($this->name);
            $this->name_cn=addslashes($this->name_cn);
            $this->title=addslashes($this->title);
            $this->title_cn=addslashes($this->title_cn);
            $this->keyword=addslashes($this->keyword);
            $this->keyword_cn=addslashes($this->keyword_cn);
            $this->description=addslashes($this->description);
            $this->description_cn=addslashes($this->description_cn);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->img=stripslashes($this->img);
            $this->name=stripslashes($this->name);
            $this->name_cn=stripslashes($this->name_cn);
            $this->title=stripslashes($this->title);
            $this->title_cn=stripslashes($this->title_cn);
            $this->keyword=stripslashes($this->keyword);
            $this->keyword_cn=stripslashes($this->keyword_cn);
            $this->description=stripslashes($this->description);
            $this->description_cn=stripslashes($this->description_cn);
        }
}
