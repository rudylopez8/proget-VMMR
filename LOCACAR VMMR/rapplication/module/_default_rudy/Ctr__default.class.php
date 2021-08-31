<?php
class Ctr__default extends Ctr_controleur {

    public function __construct($action) {
		parent::__construct("_default",$action);
        $a = "a_$action";
        $this->$a();
    }
    
    public function a_index() {
        require $this->gabarit;  
    }

    public function a_contact() {
//        if (isset($_POST["btSubmit"])) {
//            if (isset($_SESSION["id"])) {
//                $_POST[uti_mail]=$_SESSION["email"];
//            }
//            $u = new Mail();
//            $u->chargerDepuisTableau($_POST);

        require $this->gabarit;
    }


}

?>