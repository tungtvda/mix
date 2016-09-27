<?php
class slide
{
    public $id,$name,$lang_id,$price,$img,$img_small,$link,$position;
    public function slide($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->lang_id=isset($data['lang_id'])?$data['lang_id']:'';
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
            $this->lang_id=addslashes($this->lang_id);
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
            $this->lang_id=stripslashes($this->lang_id);
            $this->price=stripslashes($this->price);
            $this->img=stripslashes($this->img);
            $this->img_small=stripslashes($this->img_small);
            $this->link=stripslashes($this->link);
            $this->position=stripslashes($this->position);
        }
}
