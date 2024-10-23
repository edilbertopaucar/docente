<?php
require_once __DIR__ . '/../config/database.php';

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}



function AgregarDocente($carrera, $especialidad, $nombres) {
    global $tasksCollection;
    $resultado = $tasksCollection->insertOne([
        'carrera' => sanitizeInput($carrera),
        'especialidad' => sanitizeInput($especialidad),
        'nombres' => sanitizeInput($nombres)
        
    ]);
    return $resultado->getInsertedId();
}
function obtenerDocente() {
    global $tasksCollection;
    return $tasksCollection->find();
}
function obtenerDocentePorId($id) {
    global $tasksCollection;
    return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}
function actualizarDocente($id, $carrera, $especialidad, $nombres) {
    global $tasksCollection;
    $resultado = $tasksCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'carrera' => sanitizeInput($carrera),
            'especialidad' => sanitizeInput($especialidad),
            'nombres' => sanitizeInput($nombres)
        ]]
    );
    return $resultado->getModifiedCount();
}
function eliminarDocente($id) {
    global $tasksCollection;
    $resultado = $tasksCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}
