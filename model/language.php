<?php
class language
{
    public $id,$name,$code,$icon,$active,$default_lang,$currency;
    public function language($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->code=isset($data['code'])?$data['code']:'';
    $this->icon=isset($data['icon'])?$data['icon']:'';
    $this->active=isset($data['active'])?$data['active']:'';
    $this->default_lang=isset($data['default_lang'])?$data['default_lang']:'';
    $this->currency=isset($data['currency'])?$data['currency']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name=addslashes($this->name);
            $this->code=addslashes($this->code);
            $this->icon=addslashes($this->icon);
            $this->active=addslashes($this->active);
            $this->default_lang=addslashes($this->default_lang);
            $this->currency=addslashes($this->currency);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name=stripslashes($this->name);
            $this->code=stripslashes($this->code);
            $this->icon=stripslashes($this->icon);
            $this->active=stripslashes($this->active);
            $this->default_lang=stripslashes($this->default_lang);
            $this->currency=stripslashes($this->currency);
        }
}
