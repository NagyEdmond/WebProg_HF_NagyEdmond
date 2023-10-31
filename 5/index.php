
<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

function printStudAccordingToAvg($studList){
    $studAvgs = array();

    foreach($studList as $stud){
        $studAvgs[$stud->getName()] = $stud->getAvgGrade();
    }

    arsort($studAvgs);

    foreach($studAvgs as $stud => $avg){
        echo $stud . " - " . $avg . "<br>";
    }
}

//ToDo
try
{
$stud1 = new Student("Sandor", 0);
$stud2 = new Student("Jozsef", 1);
$stud3 = new Student("Benedek", 2);

$studList = array($stud1, $stud2, $stud3);

$uni = new University;

$uni->addSubject("012", "WEB programozas");
$uni->addStudentOnSubject("012", $stud1);
$uni->addStudentOnSubject("012", $stud2);
$uni->addStudentOnSubject("012", $stud3);

echo "Number of students for subject WEB programozas: " . count($uni -> getStudentsForSubject("012")) . "<br>";

$uni->addSubject("013", "Android fejlesztes");
$uni->addStudentOnSubject("013", $stud1);
$uni->addStudentOnSubject("013", $stud2);
$uni->addStudentOnSubject("013", $stud3);

$uni->print();

echo "<br>Students for subject 013: ";
print_r($uni->getStudentsForSubject("013")) . "<br><br>";

echo "<br><br>Number of students: ";
echo $uni->getNumberOfStudents() . "<br>";

echo "<br>Students for subjects[0]: ";
print_r($uni->subjects[0]->getStudents()) . "<br>";
$uni->subjects[0]->deleteStudent($stud1);
echo "<br><br>Students for subjects[0] after deleting a student: ";
print_r($uni->subjects[0]->getStudents());
echo "<br><br>";

$uni->addSubject("012", "WEB programozas");
}catch(Exception $e)
{
    echo "Error caught! -> " . $e->getMessage() . "<br>";
}

print_r($uni->subjects);
echo "<br><br>";
$uni->deleteSubject($uni->subjects[0]);
echo "<br><br>";
print_r($uni->subjects);
echo "<br><br>";
$uni->subjects[0]->deleteStudent($stud2);
$uni->subjects[0]->deleteStudent($stud3);
$uni->deleteSubject($uni->subjects[0]);
print_r($uni->subjects);

$uni->addSubject("014", "Java programozas");
$uni->addStudentOnSubject("014", $stud1);
$uni->addStudentOnSubject("014", $stud2);
$uni->addStudentOnSubject("014", $stud3);

$stud1->setGrade($uni->subjects[1], 5);
$stud1->setGrade($uni->subjects[2], 4);
echo "<br><br> grades of stud1:<br>";
$stud1->printGrades();
echo "<br><br>Avg grade of stud1: " . $stud1->getAvgGrade();


$stud2->setGrade($uni->subjects[1], 6);
$stud2->setGrade($uni->subjects[2], 10);

$stud3->setGrade($uni->subjects[1], 7);
$stud3->setGrade($uni->subjects[2], 8);

echo "<br><br> Grades according to average in descending order:<br>";
printStudAccordingToAvg($studList);