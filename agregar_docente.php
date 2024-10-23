<?php
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = AgregarDocente($_POST['carrera'], $_POST['especialidad'], $_POST['nombres']);
    if ($id) {
        header("Location: index.php?mensaje=Docente agregado con éxito");
        exit;
    } else {
        $error = "No se pudo agregar al docente.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Docente</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Docente</h1>

        <?php if (isset($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>
<form method="POST">
    <label>Carrera: <input type="text" name="carrera" required></label>
    <label>Especialidad: <input name="especialidad" required></label>
    <label>Nombre y Apellidos: <input name="nombres" required></label>
    <input type="submit" value="Agregar Docente">
</form>
<a href="index.php" class="button">Volver a la lista de Docentes</a>
</div>
</body>
</html>

