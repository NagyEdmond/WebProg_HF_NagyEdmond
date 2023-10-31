<?php
require_once "AbstractUniversity.php";

class University extends AbstractUniversity
{

    public function addSubject(string $code, string $name):Subject
    {
        $newSubject = new Subject($code, $name);
        foreach($this->subjects as $subject)
        {
            if($subject->getCode() == $code)
            {
                throw new Exception($name . " subject already exists!");
            }
        }
        array_push($this->subjects, $newSubject);
        return $newSubject;
    }

    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        foreach($this->subjects as $subject)
        {
            if($subject->getCode() == $subjectCode)
            {
                $subject->addStudent($student->getName(), $student->getStudentNumber());
                return;
            }
        }
        throw new Exception("The subject with the code " . $subjectCode . " doesn't exist!");
    }

    public function getStudentsForSubject(string $subjectCode)
    {
        foreach($this->subjects as $subject)
        {
            if($subject->getCode() == $subjectCode)
            {
                return $subject->getStudents();
            }
        }
        throw new Exception("Cannot get students because subject " . $subjectCode . " doesn't exist!");
    }

    public function compareStudents(Student $stud1, Student $stud2)
    {
        if($stud1->getStudentNumber() == $stud2->getStudentNumber())
        {
            return 1;
        }else
        {
            return 0;
        }
    }

    public function getNumberOfStudents(): int
    {
        $studentArray = [];
        if(count($this->subjects) > 0)
        {
            $studentArray = $this->subjects[0]->getStudents();
            foreach($this->subjects as $subject)
            {
                $studentArray = array_uintersect($studentArray, $subject->getStudents(), array($this, 'compareStudents'));
            }
        }
        return count($studentArray);
    }

    public function deleteSubject(Subject $subject)
    {
        if(in_array($subject, $this->subjects))
        {
            if(count($subject->getStudents()) == 0)
            {
                unset($this->subjects[array_search($subject,$this->subjects)]);
                return;
            }else
            {
                echo $subject->name . " cannot be deleted because there are students assigned to it!";
                return;
            }
        }
        echo $subject->name . " doesn't exist so it cannot be deleted!";
    }

    public function print()
    {
        foreach($this->subjects as $subject)
        {
            echo $subject->getName() . "<br>";
            echo str_repeat("-", 25) . "<br>";
            foreach($subject->getStudents() as $student)
            {
                echo $student->getName() . " - " . $student->getStudentNumber() . "<br>";
            }
        echo str_repeat("-", 25) . "<br><br>";
        }
    }
    // TODO Implement all the methods declared in parent
}
