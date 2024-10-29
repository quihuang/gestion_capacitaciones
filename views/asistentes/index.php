<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de Asistentes</title>
    <link rel="stylesheet" href="../public/assets/css/asistentes.css">
    <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
</head>
<body>
    <a href="index.php?controller=inicio" class="btn btn-primary" style="margin-bottom: 10px;" title="inicio">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
        </svg>
    </a>
    <div class="container">
        <div class="contaner-header">
            <h2>Listado de Asistentes</h2>
            <a href="index.php?controller=asistente&action=create" class="button">Nuevo Asistente</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tema</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Firma</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($asistentes && $asistentes->rowCount() > 0): ?>
                    <?php while ($row = $asistentes->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['tema_nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['cargo']); ?></td>
                            <td><?php echo htmlspecialchars($row['firma']); ?></td>
                            <td>
                                <a href="index.php?controller=asistente&action=edit&id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="index.php?controller=asistente&action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este asistente?');" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No se encontraron asistentes.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>