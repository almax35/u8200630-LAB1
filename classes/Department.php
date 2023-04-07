<?php

namespace classes;
class Department
{
    public string $name;
    public array $employees;

    function __construct(string $name, array $employees)
    {
        $this->name = $name;
        $this->employees = $employees;
    }

//Summary salary
    function getTotalSalary(): int
    {
        $totalSalary = 0;
        foreach ($this->employees as $employee)
        {
            $totalSalary += $employee->salary;
        }
        return $totalSalary;
    }
}