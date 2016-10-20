<?php
class countries
{
    public $id,$country_code,$country_name;
    public function countries($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->country_code=isset($data['country_code'])?$data['country_code']:'';
    $this->country_name=isset($data['country_name'])?$data['country_name']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->country_code=addslashes($this->country_code);
            $this->country_name=addslashes($this->country_name);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->country_code=stripslashes($this->country_code);
            $this->country_name=stripslashes($this->country_name);
        }
}
