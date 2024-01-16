<?php

namespace src\StudentRegistration\Persistence;
use src\Core\Connector;

function getStudentById(int $id)
{
    $connection = (new Connector)->getConnection();
    $stm = $connection->prepare("SELECT * FROM student WHERE id = :id");
    $stm->bindValue(':id',$id);
    $stm->execute();
    return $stm->fetch();
}






