
<footer>
    <ul class="footer-info">
        <li><a href="#usuario">Usuario</a></li>
        <li><a href="#pedidos">Pedidos</a></li>
        <li><a href="#ventas">Ventas</a></li>
        <li>Fecha: <span id="fecha"></span></li>
        <li>Autor: Daniel Mancilla</li>
    </ul>
</footer>
<script>
        document.getElementById('fecha').textContent = new Date().toLocaleDateString();
</script>
</html>