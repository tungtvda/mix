<?php
class danhmuc_subport
{
    public $id,$lang_id,$name,$position;
    public function danhmuc_subport($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->lang_id=isset($data['lang_id'])?$data['lang_id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->position=isset($data['position'])?$data['position']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->lang_id=addslashes($this->lang_id);
            $this->name=addslashes($this->name);
            $this->position=addslashes($this->position);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->lang_id=stripslashes($this->lang_id);
            $this->name=stripslashes($this->name);
            $this->position=stripslashes($this->position);
        }
}
