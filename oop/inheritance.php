<?php

    class Man {
        public $name;
        public $surname;

        public function speaking() {
            echo "{$this->name} {$this->surname} speaking";
            echo "<br>";
        }
    }

    $man = new Man();
    $man->name = "Kamran";
    $man->surname = "Talibli";
    $man->speaking();

    

?>