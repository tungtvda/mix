<?php
class danhmuc_tintuc
{
    public $id,$lang_id,$patient_id,$name,$name_url,$img;
    public function danhmuc_tintuc($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->lang_id=isset($data['lang_id'])?$data['lang_id']:'';
    $this->patient_id=isset($data['patient_id'])?$data['patient_id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->name_url=isset($data['name_url'])?$data['name_url']:'';
    $this->img=isset($data['img'])?$data['img']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->lang_id=addslashes($this->lang_id);
            $this->patient_id=addslashes($this->patient_id);
            $this->name=addslashes($this->name);
            $this->name_url=addslashes($this->name_url);
            $this->img=addslashes($this->img);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->lang_id=stripslashes($this->lang_id);
            $this->patient_id=stripslashes($this->patient_id);
            $this->name=stripslashes($this->name);
            $this->name_url=stripslashes($this->name_url);
            $this->img=stripslashes($this->img);
        }
}
