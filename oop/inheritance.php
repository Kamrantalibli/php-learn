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

    class Student extends Man {
        public $stdntNo;

        public function study() {
            echo "{$this->name} {$this->surname} study in university.<br>";
        }
    }

    $student = new Student();
    $student->name = "Nurlan";
    $student->surname = "Huseynli";
    $student->speaking();
    $student->study();

    class Teacher extends Man {

        protected function teach() {
            echo "{$this->name} {$this->surname} teach in university.";
            echo "<br>";
        }
    }

    $teacher = new Teacher();
    $teacher->name = "Kerim";
    $teacher->surname = "Rehimov";
    $teacher->speaking();
    // $teacher->teach();


    class Manager extends Teacher {

        public function manage() {
            $this-> teach();
            echo "{$this->name} {$this->surname} manage in university.";
            echo "<br>";
        }
    }

    $manager = new Manager();
    $manager->name = "Nihad";
    $manager->surname = "Rehimov";
    $manager->manage();


?>