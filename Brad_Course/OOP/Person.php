<?php

class Person {
    public string $name;
    public string $surname;
    // ? this means that int can except null value
    // private  ? int $age;
    protected  ? int $age;

    // static [method | variable] belongs to class itself, not to instance.
    // So, it can be used without creating an instance of the class.
    // also used to declare variables in a function which keep their value after the function has ended.
    public static int $counter = 0;

    public function __construct($name, $surname) {
        $this->name    = $name;
        $this->surname = $surname;
        $this->age     = null;
        // to access the static variable
        self::$counter++;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getAge() {
        return $this->age;
    }

    public static function getCounter() {
        return self::$counter;
    }
}