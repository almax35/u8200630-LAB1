<?php
require 'vendor/autoload.php';

use classes\Employee;
use classes\Department;

//check validation
$employee1 = new Employee(-1, "Oleg", 1, new DateTime('2000-01-01'));
$employee1->validation();
$employee2 = new Employee(1, "namenklwefnewnfewnfwekfnewfew", 1000, new DateTime('2012-03-13'));
$employee2->validation();
$employee3 = new Employee(1, "Oleg", 1000000, new DateTime('2000-01-01'));
$employee3->validation();



$emp1 = new Employee(1, "Oleg", 15000, new DateTime('2012-04-12'));
$emp2 = new Employee(2, "Alex", 24000, new DateTime('2015-09-12'));
$emp3 = new Employee(3, "Grigory", 65000, new DateTime('2007-08-12'));

$arrayEmployee1 = [$emp1, $emp2];
$arrayEmployee2 = [$emp1];
$arrayEmployee3 = [$emp2];
$arrayEmployee4 = [$emp3];

$department1 = new Department("department 1", $arrayEmployee1);
$department2 = new Department("department 2", $arrayEmployee2);
$department3 = new Department("department 3", $arrayEmployee3);
$department4 = new Department("department 4", $arrayEmployee4);

$arrayDepartment = [$department1, $department2, $department3, $department4];
$maxSalary = -1;
$minSalary=PHP_INT_MAX;

foreach ($arrayDepartment as $department) {
    $salary = $department->getTotalSalary();
    if ($salary > $maxSalary) {
        $maxSalary = $salary;
    }
    if ($salary<$minSalary){
        $minSalary=$salary;
    }
}

$totalMaxCount = 0;
$totalMinCount = 0;
foreach ($arrayDepartment as $department) {
    $salary = $department->getTotalSalary();
    if ($salary == $maxSalary) {
        if (count($department->employees) > $totalMaxCount) {
            $totalMaxCount = count($department->employees);
        }
    }
    if ($salary == $minSalary) {
        if (count($department->employees) > $totalMinCount) {
            $totalMinCount = count($department->employees);
        }
    }

}

echo "\n";

foreach ($arrayDepartment as $department) {
    $currentTotalCount = $department->getTotalSalary();
    if ($currentTotalCount == $maxSalary) {
        if (count($department->employees) == $totalMaxCount) {
            echo "для максимальной суммарной з/п: " . "$department->name\n";
        }
    }
    if ($currentTotalCount == $minSalary) {
        if (count($department->employees) == $totalMinCount) {
            echo "для минимальной суммарной з/п: " . "$department->name\n";
        }
    }
}