<?php
class slide
{
    public $id,$name,$name_cn,$price,$img,$img_small,$link,$position;
    public function slide($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->name_cn=isset($data['name_cn'])?$data['name_cn']:'';
    $this->price=isset($data['price'])?$data['price']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->img_small=isset($data['img_small'])?$data['img_small']:'';
    $this->link=isset($data['link'])?$data['link']:'';
    $this->position=isset($data['position'])?$data['position']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name=addslashes($this->name);
            $this->name_cn=addslashes($this->name_cn);
            $this->price=addslashes($this->price);
            $this->img=addslashes($this->img);
            $this->img_small=addslashes($this->img_small);
            $this->link=addslashes($this->link);
            $this->position=addslashes($this->position);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name=stripslashes($this->name);
            $this->name_cn=stripslashes($this->name_cn);
            $this->price=stripslashes($this->price);
            $this->img=stripslashes($this->img);
            $this->img_small=stripslashes($this->img_small);
            $this->link=stripslashes($this->link);
            $this->position=stripslashes($this->position);
        }
}
