<?php
/*
enctype rehefa method=post ihany vao mety
*/
namespace App\src;

class Form
{
    private $action;
    private $method;
    private $id;
    private $elements = [];

    private $text;
    private $password;
    private $email;
    private $file;
    private $image;
    private $textarea;
    private $button;
    private $select;

    function __construct($action, $method, $id)
    {
        $this->action = $action;
        $this->method = $method;
        $this->id = $id;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function inputText($label, $name, $divclass, $class, $placeholder=null, $value=null, $default="required")
    {

        $this->text = '<div class="' . $divclass . '">
        <label>' . $label . '</label>
        <input type="text" name="' . $name .'" id="' . $name .'" class="' . $class . '" placeholder="' . $placeholder . '" value="' . $value . '" ' . $default .'> 
        </div>';

        array_push($this->elements,$this->text);
    }
    
    public function inputEmail($label, $name, $divclass, $class, $placeholder=null, $value=null, $default="required")
    {

        $this->email = '<div class="' . $divclass . '">
        <label>' . $label . '</label>
        <input type="email" name="' . $name .'" id="' . $name .'" class="' . $class . '" placeholder="' . $placeholder . '" value="' . $value . '" ' . $default .'> 
        </div>'; 

        array_push($this->elements,$this->email);
    }
    
    public function inputPassword($label, $name, $divclass, $class, $placeholder=null, $value=null, $default="required")
    {

        $this->password = '<div class="' . $divclass . '">
        <label>' . $label . '</label>
        <input type="password" name="' . $name .'" id="' . $name .'" class="' . $class . '" placeholder="' . $placeholder . '" value="' . $value . '" ' . $default .'> 
        </div>'; 

        array_push($this->elements,$this->password);
    }

    public function inputFile($label, $name, $divclass, $labelclass, $class, $accept=null, $default="required")
    {
        $this->file = '<div class="' . $divclass . '">
        <input type="file" name="' . $name .'" id="' . $name .'" class="' . $class . '" accept="' . $accept . '" ' . $default .'> 
        <label class="' . $labelclass . '">' . $label . '</label>
        </div>'; 

        array_push($this->elements,$this->file);

    }

    public function inputImage($name, $class, $src, $alt, $value=null )
    {
        $this->image = '<input type="image" name="' . $name . '" id="'. $name .'" class="' . $class . '" src="' . $src . '" alt="' . $alt .'">';

        array_push($this->elements,$this->image);
    }

    public function inputTextarea($label, $name, $divclass, $class, $cols, $rows, $placeholder=null, $default="required")
    {
        $this->textarea = '<div class="' . $divclass . '">
        <label>' . $label . '</label>
        <textarea name="' . $name .'" id="' . $name .'" class="' . $class . '" cols="' . $cols .'" rows="' . $rows . '" placeholder="' . $placeholder . '" ' . $default .'></textarea> 
        </div>'; 

        array_push($this->elements,$this->textarea);

    }

    public function inputButton($label, $name, $class, $value=null)
    {
        $this->button = '<button type=submit name="' . $name . '" id="' . $name . '" class="' . $class . '" value="' . $value . '"> ' . $label . '</button>';
        
        array_push($this->elements,$this->button);

    }

    public function inputSelect($label, $name, $divclass, $class, $values, $default="required")
    {
        $options = [];
        foreach($values as $value)
        {
            $option = '<option value="' . $value . '">' . ucfirst($value) . ' </option>';
            array_push($options, $option);
        }

        $this->select = '<div class="' . $divclass . '">
        <select name="' . $name . '" class="' . $class . '" ' . $default . '>
        <option value="">' . $label . '</option>
        ' . implode(" ",$options) . '
        </select>
        </div>';

        array_push($this->elements,$this->select);
    }

    public function showForm($title, $class)
    {
        if($this->method === 'post')
            $enctype = 'enctype="multipart/form-data" ';
        else
            $enctype = '';

        echo '<h1>' . $title . '</h1>'; 
        echo '<form action="' . $this->action . '" method="' . $this->method . '"  ' . $enctype . ' id="' . $this->id . '" class="' . $class . '">';
        foreach($this->elements as $element)
        {
            echo $element;
        }
        echo '</form>';
    }

    

};



?>