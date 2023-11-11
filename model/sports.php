<?php

class sports
{
    
    public $id;
    public $name;
    public $description;
    public $salary;
    public $gender;
    public $birthday;
    
    public $id_msg;
    public $name_msg;
    public $description_msg;
    public $salary_msg;
    public $gender_msg;
    public $birthday_msg;
    
    function __construct()
    {
        $id=0;$name=$description=$salary=$gender=$birthday="";
        $id_msg=$name_msg=$description_msg=$salary_msg=$gender_msg=$birthday_msg="";
    }
}

?>