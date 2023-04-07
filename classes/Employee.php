<?php
namespace classes;

use DateTime;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Validation;


class Employee
{
    public int $id;
    public string $name;
    public int $salary;
    public DateTime $date;

    public function __construct(int $id, string $name, int $salary, DateTime $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->date = $date;
    }


    //function return count of full year
    public function getExperience(): int
    {
        $today = new DateTime("now");
        $d = $today->diff($this->date);
        return $d->y;
    }

    //validation
    public function validation()
    {
        $validator = Validation::createValidator();
        $error1 = $validator->validate($this->id, [new Positive()]);
        $error2 = $validator->validate($this->name, [new Length(['max' => 20])]);
        $error3 = $validator->validate($this->salary, [new Range(['min' => 0, 'max' => 100000])]);
        $countViolations = count($error1) + count($error2) + count($error3);
        if ($countViolations == 0) echo "No violations";
        else {
            echo $error1;
            echo $error2;
            echo $error3;
        }
    }
}