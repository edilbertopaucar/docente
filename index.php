

<?php
require_once __DIR__ . '/includes/functions.php';
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarDocente($_GET['id']);
    $mensaje = $count > 0 ? "Docente eliminado con éxito." : "No se pudo eliminar al Docente.";
}
$docentes = obtenerDocente();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Docentes</title>
    <link rel="stylesheet" href="public/css/style.css">
   
  
</head>
<body>
<div class="container">
    <h1>Gestión de Docentes</h1>
    <center><img src="https://www.unsaac.edu.pe/wp-content/uploads/2023/01/escudo-oficial-02-2-2-e1675183581418.png"></center>

    <?php if (isset($mensaje)): ?>
        <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <a href="agregar_docente.php" class="button">Agregar Nuevo Docente</a>

    <!-- ... -->
</div>
<h2>Lista de Docentes</h2>

<table>
    <tr>
        <th>Carrera</th>
        <th>Especialidad</th>
        <th>Nombre y Apellidos</th>
    </tr>
    <?php foreach ($docentes as $docente): ?>
    <tr>
        <td><?php echo htmlspecialchars($docente['carrera']); ?></td>
        <td><?php echo htmlspecialchars($docente['especialidad']); ?></td>
        <td><?php echo htmlspecialchars($docente['nombres']); ?></td>
        <td class="actions">
            <a href="editar_docente.php?id=<?php echo $docente['_id']; ?>" class="button">Editar</a>
            <a href="index.php?accion=eliminar&id=<?php echo $docente['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar a este docente?');">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</body>
</html>
