<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:16 PM
 */

/**
 * Class Subject
 */
class Subject
{
    private string  $code;
    private string $name;
    /**
     * @var Student[]
     */
    private array $students = [] ;

    public function __construct(string $code, string $name, array $students = [])
    {
        $this->code = $code;
        $this->name = $name;
        $this->students = $students;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode($code):void
    {
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name):void
    {
        $this->name = $name;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function setStudents($students):void
    {
        $this->students = $students;
    }

    // TODO Generate getters and setters
    // TODO Generate constructor for all attributes. $students argument of the constructor can be empty

    //ToDo
    /**
     * Method accepts student name and number, creates instance of the Student class, adds inside $students array
     * and returns created instance
     *
     * @param string $name
     * @param string $studentNumber
     * @return \Student
     */
    public function addStudent(string $name, string $studentNumber): Student
    {
        $student = new Student($name, $studentNumber);
        if($this->isStudentExists($studentNumber))
        {
            throw new Exception($name . " student already exists!");
        }else
        {
            array_push($this->students, $student);
        }
        return $student;
    }

    // ToDo
    private function isStudentExists(string $studentNumber): bool
    {
        foreach($this->students as $student)
        {
            if($student->getStudentNumber() == $studentNumber)
            {
                return 1;
            }
        }
        return 0;
    }

    public function __get($name){
        return $this->$name;
    }


    public function deleteStudent(Student $student)
    {
        if(in_array($student, $this->students))
        {   
            unset($this->students[array_search($student, $this->students)]);
            return;
        }
        echo $student . " is not a part of subject " . $this->name . "!";
    }




}
