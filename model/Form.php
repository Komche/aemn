<?php
    class Form{
       

        public function __construct() {
            
        }

        public function input($type, $name, $placeholder, $minlenth=null,$require=null){
           return '<div class="form-group ">
                <label for="'.$name.'" class="control-label col-lg-2">'.ucfirst($name).' <span class="required">'.$require .'</span></label>
                <div class="col-lg-10">
                <input class="form-control" placeholder="'.$placeholder.' " id="'.$name.'" name="'.$name.'" minlength="'.$minlenth.'" type="text" '.$require .'="">
                </div>
             </div>';
        }
        
    }

    
    