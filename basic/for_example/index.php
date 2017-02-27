<?php

$is_girl = $_GET['sex'] == 0 ? true : false;

if ($is_girl) {
    echo "This is a girl!";
    require "class/Class1.php";
    $class1 = new Class1();
} else {
    echo "Not a girl!";
    require "class/Class2.php";
    $class2 = new Class2();
}
