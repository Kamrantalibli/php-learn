<?php 

    # class => Person, Product

        class Student {
        # property
            public $stdntno;
            public $name;
            public $branch;
        # method
        }

        $student1 = new Student();
        $student1->stdntno = 100;
        $student1->name = "Kamran";
        $student1->branch = "11A";

        $student2 = new Student();
        $student2->stdntno = 200;
        $student2->name = "Nurlan";
        $student2->branch = "10A";

        echo $student1->stdntno." ".$student1->name." ".$student1->branch."<br>";
        echo $student2->stdntno." ".$student2->name." ".$student2->branch."<br>";

        $students = [$student1,$student2];

        foreach($students as $student) {
            echo gettype($student);
            echo "<br>";
            echo $student->stdntno." ".$student->name." ".$student->branch;
            echo "<br>";
            var_dump($student instanceof Student);
            echo "<br>";

        }

    # instance, object

?>