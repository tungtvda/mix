<?php
class subport
{
    public $id,$danhmuc_id,$name,$phone,$phone_format,$skype,$email,$yahoo;
    public function subport($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->danhmuc_id=isset($data['danhmuc_id'])?$data['danhmuc_id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->phone=isset($data['phone'])?$data['phone']:'';
    $this->phone_format=isset($data['phone_format'])?$data['phone_format']:'';
    $this->skype=isset($data['skype'])?$data['skype']:'';
    $this->email=isset($data['email'])?$data['email']:'';
    $this->yahoo=isset($data['yahoo'])?$data['yahoo']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->danhmuc_id=addslashes($this->danhmuc_id);
            $this->name=addslashes($this->name);
            $this->phone=addslashes($this->phone);
            $this->phone_format=addslashes($this->phone_format);
            $this->skype=addslashes($this->skype);
            $this->email=addslashes($this->email);
            $this->yahoo=addslashes($this->yahoo);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->danhmuc_id=stripslashes($this->danhmuc_id);
            $this->name=stripslashes($this->name);
            $this->phone=stripslashes($this->phone);
            $this->phone_format=stripslashes($this->phone_format);
            $this->skype=stripslashes($this->skype);
            $this->email=stripslashes($this->email);
            $this->yahoo=stripslashes($this->yahoo);
        }
}
