<?php
require_once __DIR__ . '/includes/functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$tarea = obtenerDocentePorId($_GET['id']);

if (!$tarea) {
    header("Location: index.php?mensaje=Docente no encontrado");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarDocente($_GET['id'], $_POST['carrera'], $_POST['especialidad'], $_POST['nombres']);
    if ($count > 0) {
        header("Location: index.php?mensaje=Docente actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar la tarea.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Docente</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Docente</h1>
        <?php if (isset($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>
<form method="POST">
    <label>Carrera: <input type="text" name="carrera" value="<?php echo htmlspecialchars($tarea['carrera']); ?>" required></label>
    <label>Especialidad: <textarea name="especialidad" required><?php echo htmlspecialchars($tarea['especialidad']); ?></textarea></label>
    <label>Nombre y Apellidos: <textarea name="nombres" required><?php echo htmlspecialchars($tarea['nombres']); ?></textarea></label>
    <input type="submit" value="Actualizar Docente">
</form>
<a href="index.php" class="button">Volver a la lista de tareas</a>
</div>
</body>
</html>
