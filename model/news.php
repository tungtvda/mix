<?php
class news
{
    public $id,$danhmuc_id,$name,$name_cn,$name_url,$img,$content,$content_cn,$title,$title_cn,$keyword,$keyword_cn,$description,$description_cn;
    public function news($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->danhmuc_id=isset($data['danhmuc_id'])?$data['danhmuc_id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->name_cn=isset($data['name_cn'])?$data['name_cn']:'';
    $this->name_url=isset($data['name_url'])?$data['name_url']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->content=isset($data['content'])?$data['content']:'';
    $this->content_cn=isset($data['content_cn'])?$data['content_cn']:'';
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
            $this->danhmuc_id=addslashes($this->danhmuc_id);
            $this->name=addslashes($this->name);
            $this->name_cn=addslashes($this->name_cn);
            $this->name_url=addslashes($this->name_url);
            $this->img=addslashes($this->img);
            $this->content=addslashes($this->content);
            $this->content_cn=addslashes($this->content_cn);
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
            $this->danhmuc_id=stripslashes($this->danhmuc_id);
            $this->name=stripslashes($this->name);
            $this->name_cn=stripslashes($this->name_cn);
            $this->name_url=stripslashes($this->name_url);
            $this->img=stripslashes($this->img);
            $this->content=stripslashes($this->content);
            $this->content_cn=stripslashes($this->content_cn);
            $this->title=stripslashes($this->title);
            $this->title_cn=stripslashes($this->title_cn);
            $this->keyword=stripslashes($this->keyword);
            $this->keyword_cn=stripslashes($this->keyword_cn);
            $this->description=stripslashes($this->description);
            $this->description_cn=stripslashes($this->description_cn);
        }
}
