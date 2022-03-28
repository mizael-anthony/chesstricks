<?php

namespace App\helpers;


class File
{
    private $file_name;
    private $file_dir;

    public function __construct($file_name, $file_dir)
    {
        $this->file_name = $file_name;
        $this->file_dir = $file_dir;
    }

    public function getFile()
    {
        $target_file = str_replace(' ','',$_FILES[$this->file_name]['name']);
        
        $tmp_dir = $_FILES[$this->file_name]['tmp_name'];
        
        $target_dir = $this->file_dir . $target_file;
        
        move_uploaded_file($tmp_dir, $target_dir);

        return $target_dir;

    }
}