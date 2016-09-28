<?php
class link
{
    public $id,$name,$name_cn,$link,$position;
    public function link($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->name_cn=isset($data['name_cn'])?$data['name_cn']:'';
    $this->link=isset($data['link'])?$data['link']:'';
    $this->position=isset($data['position'])?$data['position']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name=addslashes($this->name);
            $this->name_cn=addslashes($this->name_cn);
            $this->link=addslashes($this->link);
            $this->position=addslashes($this->position);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name=stripslashes($this->name);
            $this->name_cn=stripslashes($this->name_cn);
            $this->link=stripslashes($this->link);
            $this->position=stripslashes($this->position);
        }
}
