<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <title>CiTIM Grupo XB</title>
    <link rel="stylesheet" href="css/problemaStem.css"/>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
  <section class="wrapper">
    <header>
      <h1 class="logo">Uso de la Ciencia, Tecnología, Ingeniería y Matemáticas para resolver problemas</h1>
    </header>
    <section id="contenedor">
      
      <section class="problema">
        <h2>Problema: Cálculo del número de paneles solares necesarios</h2>
        <p><strong>Descripción:</strong></p>
        <p>
          Considerando el consumo del recibo de una casa y que el promedio es de 5 horas de sol por día, ¿cuántos paneles solares de 455 W se necesitan para cubrir el consumo total de energía eléctrica?
        </p>
      </section>

      <section class="esquemaProblema">
        <h2>Esquema</h2>
        <center>
          <img class="imgProblema" src="images/problema.png" alt="Esquema del recibo CFE">
        </center>
      </section>

      <section class="formulas">
        <h2>Fórmulas</h2>
        <ul>
          <li>Consumo por hora = Consumo total (kWh) / (365 días × horas promedio de sol)</li>
          <li>No. de paneles = (Consumo por hora × 1000) / Potencia del panel (W)</li>
        </ul>
      </section>

      <section class="datos">
        <h2>Datos:</h2>
        <ul>
          <li>Consumo total anual: 10,607 kWh</li>
          <li>Horas promedio de sol por día: 5 h</li>
          <li>Potencia de cada panel: 455 W</li>
        </ul>
      </section>

      <section class="calculos">
        <h2>Solución</h2>
        <p>
          No. de paneles = (10607 / (365 × 5)) × 1000 / 455
        </p>
      </section>

      <section class="resultado">
        <h2>Resultado:</h2>
        <div id="resultadoA">
          <?php
            $consumo_anual = 10607; // kWh
            $horas_sol_diarias = 5; // horas
            $dias_anio = 365;
            $potencia_panel = 455; // W

            $consumo_por_hora = $consumo_anual / ($dias_anio * $horas_sol_diarias);
            $num_paneles = ($consumo_por_hora * 1000) / $potencia_panel;
            $num_paneles_redondeado = ceil($num_paneles);

            echo "<p>Se requieren <strong>" . $num_paneles_redondeado . "</strong> paneles solares de 455 W para cubrir el consumo anual.</p>";
            echo "<p>(Cálculo exacto: " . number_format($num_paneles, 2) . " paneles)</p>";
          ?>
        </div>
      </section>

    </section>
    <footer class="pie">
     Creative Commons versión 3.0 SciSoft 2024
    </footer>
  </section>
</body>
</html>
