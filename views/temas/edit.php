<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Tema</title>
    <link rel="stylesheet" href="../public/assets/css/temas.css">
    <link rel="stylesheet" href="../public/assets/css/sweetalert2.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Tema</h2>
        <form id="formTema">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($tema['id']); ?>">

            <div class="form-group">
                <label for="nombre">Nombre de la Formación:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($tema['nombre']); ?>" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de Formación:</label>
                <select id="tipo" name="tipo" required>
                    <option value="Capacitación" <?php echo $tema['tipo'] == 'Capacitación' ? 'selected' : ''; ?>>Capacitación</option>
                    <option value="Entrenamiento" <?php echo $tema['tipo'] == 'Entrenamiento' ? 'selected' : ''; ?>>Entrenamiento</option>
                </select>
            </div>

            <div class="form-group">
                <label for="objetivo">Objetivo:</label>
                <textarea id="objetivo" name="objetivo" required><?php echo htmlspecialchars($tema['objetivo']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="facilitador_nombre">Nombre del Facilitador:</label>
                <input type="text" id="facilitador_nombre" name="facilitador_nombre" value="<?php echo htmlspecialchars($tema['facilitador_nombre']); ?>" required>
            </div>

            <div class="form-group">
                <label for="facilitador_cargo">Cargo del Facilitador:</label>
                <input type="text" id="facilitador_cargo" name="facilitador_cargo" value="<?php echo htmlspecialchars($tema['facilitador_cargo']); ?>" required>
            </div>
            <button onclick="window.location.href='index.php?controller=tema&action=index'" class="button" style="margin-bottom: 10px;" title="Regresar"> Regresar 
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
            </button>
            <button type="submit" class="button">Actualizar Tema</button>
        </form>
    </div>

    <script src="../public/assets/js/jquery-3.7.1.min.js"></script>
    <script src="../public/assets/js/sweetalert2.all.min.js"></script>
    <script src="../public/assets/scripts.js"></script>
</body>
</html>