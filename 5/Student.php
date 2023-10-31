<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:40 PM
 */

/**
 * Class Student
 */
class Student
{
    private string $name;
    private string $studentNumber;

    private array $grades;

    public function __construct(string $name, string $studentNumber){
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }

    public function getName(): string{
        return $this->name;
    }

    public function setName($name):void{
        $this->name = $name;
    }

    public function getStudentNumber(): string{
        return $this->studentNumber;
    }

    public function setStudentNumber($studentNumber):void{
        $this->studentNumber = $studentNumber;
    }

    public function setGrade(Subject $subject, float $grade)
    {
        $this->grades[$subject->getCode()] = $grade;
    }

    public function getAvgGrade()
    {
        $sum = 0;

        foreach($this->grades as $grade)
        {
            $sum += $grade;
        }

        return $sum / count($this->grades);
    }

    public function printGrades()
    {
        foreach($this->grades as $subj => $grade)
        {
            echo $subj . " - " . $grade . "<br>";
        }
    }
    // TODO Generate constructor with both arguments.
    // TODO Generate getters and setters for both arguments
}
