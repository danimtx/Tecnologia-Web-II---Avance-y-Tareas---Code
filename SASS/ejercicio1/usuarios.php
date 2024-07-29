<?php
$datos = listar() ;
?> 

<div class="data-container">
    <?php foreach ($datos as $usuario): ?>
        <div class="data-card">
            <h2>Datos del Usuario <?php echo htmlspecialchars($usuario['id']); ?> </h2>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
            <p><strong>Apellido:</strong> <?php echo htmlspecialchars($usuario['apellido']); ?></p>
            <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($usuario['telefono']); ?></p>
        </div>
    <?php endforeach; ?>
</div>