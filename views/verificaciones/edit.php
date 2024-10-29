<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Verificación</title>
    <link rel="stylesheet" href="../public/assets/css/verificaciones.css">
    <link rel="stylesheet" href="../public/assets/css/sweetalert2.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Verificación de Eficacia</h2>
        <form id="formVerificacion">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($verificacion['id']); ?>">
            <div class="form-group">
                <label for="tema_id">Tema:</label>
                <select id="tema_id" name="tema_id" class="form-control" required>
                    <option value="">Seleccione un tema</option>
                    <?php while ($row = $temas->fetch(PDO::FETCH_ASSOC)) : ?>
                        <option value="<?php echo $row['id']; ?>" <?php echo $verificacion['tema_id'] == $row['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($row['nombre']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_verificacion">Fecha de Verificación:</label>
                <input type="date" id="fecha_verificacion" name="fecha_verificacion" value="<?php echo htmlspecialchars($verificacion['fecha_verificacion']); ?>" required>
            </div>
            <div class="form-group">
                <label for="responsable_verificacion">Responsable de Verificación:</label>
                <input type="text" id="responsable_verificacion" name="responsable_verificacion" value="<?php echo htmlspecialchars($verificacion['responsable_verificacion']); ?>" required>
            </div>
            <button onclick="window.location.href='index.php?controller=verificacion&action=index'" class="button" style="margin-bottom: 10px;" title="Regresar"> Regresar 
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
            </button>
            <button type="submit" class="button">Actualizar Verificación</button>
        </form>
    </div>

    <script src="../public/assets/js/jquery-3.7.1.min.js"></script>
    <script src="../public/assets/js/sweetalert2.all.min.js"></script>
    <script src="../public/assets/scripts.js"></script>
</body>
</html>
