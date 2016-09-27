<?php
class danhmuc_2
{
    public $id,$danhmuc1_id,$patient_id,$lang_id,$name,$name_url,$img,$banner,$position;
    public function danhmuc_2($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->danhmuc1_id=isset($data['danhmuc1_id'])?$data['danhmuc1_id']:'';
    $this->patient_id=isset($data['patient_id'])?$data['patient_id']:'';
    $this->lang_id=isset($data['lang_id'])?$data['lang_id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->name_url=isset($data['name_url'])?$data['name_url']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->banner=isset($data['banner'])?$data['banner']:'';
    $this->position=isset($data['position'])?$data['position']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->danhmuc1_id=addslashes($this->danhmuc1_id);
            $this->patient_id=addslashes($this->patient_id);
            $this->lang_id=addslashes($this->lang_id);
            $this->name=addslashes($this->name);
            $this->name_url=addslashes($this->name_url);
            $this->img=addslashes($this->img);
            $this->banner=addslashes($this->banner);
            $this->position=addslashes($this->position);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->danhmuc1_id=stripslashes($this->danhmuc1_id);
            $this->patient_id=stripslashes($this->patient_id);
            $this->lang_id=stripslashes($this->lang_id);
            $this->name=stripslashes($this->name);
            $this->name_url=stripslashes($this->name_url);
            $this->img=stripslashes($this->img);
            $this->banner=stripslashes($this->banner);
            $this->position=stripslashes($this->position);
        }
}
