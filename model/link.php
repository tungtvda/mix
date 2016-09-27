<?php
class link
{
    public $id,$id_lang,$name,$link,$position;
    public function link($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->id_lang=isset($data['id_lang'])?$data['id_lang']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->link=isset($data['link'])?$data['link']:'';
    $this->position=isset($data['position'])?$data['position']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->id_lang=addslashes($this->id_lang);
            $this->name=addslashes($this->name);
            $this->link=addslashes($this->link);
            $this->position=addslashes($this->position);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->id_lang=stripslashes($this->id_lang);
            $this->name=stripslashes($this->name);
            $this->link=stripslashes($this->link);
            $this->position=stripslashes($this->position);
        }
}
