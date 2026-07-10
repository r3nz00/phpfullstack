<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Listas Dinámicas</title>
</head>
<body>

  <h2>Lista Dinámica</h2>

  <a href="index.php"><button type="button">Volver</button></a>

  <div style="margin-top:16px;">
    <input type="text" id="texto" placeholder="Escribe un texto" />
    <button id="btnAgregar" type="button">Agregar</button>
  </div>

  <ul id="lista" style="margin-top:16px;"></ul>

  <script>
    const input = document.getElementById("texto");
    const btn = document.getElementById("btnAgregar");
    const lista = document.getElementById("lista");

    function agregar() {
      const valor = input.value.trim();
      if (!valor) return;

      const li = document.createElement("li");
      li.textContent = valor;
      lista.appendChild(li);

      input.value = "";
      input.focus();
    }

    btn.addEventListener("click", agregar);
    input.addEventListener("keydown", (e) => {
      if (e.key === "Enter") agregar();
    });
  </script>

</body>
</html>
