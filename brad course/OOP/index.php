<?php

// What is class and instance

require_once "Person.php";
require_once "Student.php";

$student = new Student('Abdullah', 'Yaser', '12dwfwe23124');

// $person = new Person('Ahmad', 'Aldabouqi');
// $person->setAge(24);

echo '<pre>';
var_dump($student);
echo '</pre>';
// echo $person->getAge() . '<br>';

echo Person::getCounter() . '<br>';