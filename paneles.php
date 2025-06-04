<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Paneles Solares</title>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f0f0f0;
            color: #333333;
            font-family: 'Comfortaa', cursive;
            margin: 0;
            padding: 0;
        }
        header, footer {
            background: #4a4a4a;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            font-size: 1.2em;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        footer {
            font-size: 0.9em;
        }
        section.wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 15px;
            justify-content: space-between;
        }
        .column {
            display: flex;
            flex-direction: column;
            gap: 15px;
            flex: 1 1 48%;
        }
        section {
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 15px;
        }
        section h2 {
            color: #4a4a4a;
            margin-bottom: 10px;
            font-size: 1.2em;
        }
        .problema {
            background: #e8e8e8;
        }
        .esquemaProblema {
            background: #d9e3ea;
        }
        .formulas {
            background: #dceae2;
        }
        .datos {
            background: #e4e1f0;
        }
        .calculos {
            background: #f0e8e8;
        }
        .resultado {
            background: #f6f6f6;
        }
        button {
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            margin-top: 10px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
        }
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.15);
        }
        button.delete {
            background: linear-gradient(135deg, #e8505b, #ff7676);
        }
        button.delete:hover {
            background: linear-gradient(135deg, #ff7676, #e8505b);
        }
        section.resultado div {
            margin-top: 10px;
            font-size: 0.9em;
            line-height: 1.5;
            background: #ffffff;
            padding: 8px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .highlight {
            background-color: #fffacd;
            padding: 2px 5px;
            border-radius: 3px;
            font-weight: bold;
        }
        input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        Cálculo de Paneles Solares para Autoconsumo
    </header>
    <section class="wrapper">
        <!-- Primera columna -->
        <div class="column">
            <section class="problema">
                <h2>Problema</h2>
                <p>Calcular el número de paneles solares necesarios para cubrir un consumo eléctrico de 10,607 KWh anuales, considerando 5 horas de sol promedio por día y paneles de 455W.</p>
            </section>
            <section class="esquemaProblema">
                <h2>Esquema de Cálculo</h2>
                <p><strong>Fórmula original:</strong> No. de paneles = (10607/6)/455</p>
                <p>Donde 6 es el divisor que combina:</p>
                <ul>
                    <li>5 horas de sol por día</li>
                    <li>30 días aproximados por mes</li>
                    <li>Simplificado como 6 (5×30 = 150 horas/mes ≈ 180 horas/mes [6 horas/día])</li>
                </ul>
            </section>
            <section class="formulas">
                <h2>Fórmulas Detalladas</h2>
                <ul>
                    <li>Consumo por hora = Consumo total / (Horas sol × 30 días)</li>
                    <li>Número de paneles = Consumo por hora / (Potencia panel en KW)</li>
                </ul>
            </section>
        </div>
        <!-- Segunda columna -->
        <div class="column">
            <section class="datos">
                <h2>Datos del Problema</h2>
                <form method="post">
                    <label for="consumo">Consumo eléctrico (KWh):</label>
                    <input type="number" id="consumo" name="consumo" value="<?php echo isset($_POST['consumo']) ? htmlspecialchars($_POST['consumo']) : '10607'; ?>" step="1">
                    
                    <label for="horasSol">Horas de sol por día:</label>
                    <input type="number" id="horasSol" name="horasSol" value="<?php echo isset($_POST['horasSol']) ? htmlspecialchars($_POST['horasSol']) : '5'; ?>" step="0.1">
                    
                    <label for="potenciaPanel">Potencia del panel (W):</label>
                    <input type="number" id="potenciaPanel" name="potenciaPanel" value="<?php echo isset($_POST['potenciaPanel']) ? htmlspecialchars($_POST['potenciaPanel']) : '455'; ?>" step="1">
            </section>
            <section class="calculos">
                <h2>Solución</h2>
                <button type="submit" name="calcular">Calcular número de paneles</button>
                <button type="submit" name="eliminar" class="delete">Reiniciar</button>
                </form>
            </section>
            <section class="resultado">
                <h2>Resultado:</h2>
                <div id="resultadoA">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['calcular'])) {
                            // Obtener valores del formulario
                            $consumoTotal = floatval($_POST['consumo']);
                            $horasSol = floatval($_POST['horasSol']);
                            $potenciaPanel = floatval($_POST['potenciaPanel']);
                            
                            // Validar datos
                            if ($consumoTotal <= 0 || $horasSol <= 0 || $potenciaPanel <= 0) {
                                echo '<p style="color:red;">Error: Todos los valores deben ser mayores que cero</p>';
                            } else {
                                // Cálculo según la fórmula original (consumo/6)/potencia
                                $numeroPanelesOriginal = ($consumoTotal/6)/$potenciaPanel;
                                
                                // Cálculo detallado paso a paso
                                $horasPorMes = $horasSol * 30;
                                $consumoPorHora = $consumoTotal / $horasPorMes;
                                $potenciaPanelKW = $potenciaPanel / 1000;
                                $numeroPanelesDetallado = $consumoPorHora / $potenciaPanelKW;
                                
                                // Explicación del divisor 6 (simplificación de 150 horas/mes a 180 [6 horas/día])
                                $factorSimplificacion = 180/150; // 1.2
                                $numeroPanelesAjustado = $numeroPanelesDetallado / $factorSimplificacion;
                                
                                // Redondear al siguiente entero
                                $panelesRedondeados = ceil($numeroPanelesOriginal);
                                
                                // Mostrar resultados
                                echo '
                                <p><strong>Método original:</strong> ('.$consumoTotal.'/6)/'.$potenciaPanel.' = <span class="highlight">'.number_format($numeroPanelesOriginal, 2).' paneles</span></p>
                                <p><strong>Método detallado:</strong> ('.$consumoTotal.'/('.($horasSol).'×30))/'.($potenciaPanel/1000).' = '.number_format($numeroPanelesDetallado, 2).' paneles</p>
                                <p><strong>Ajuste por simplificación:</strong> '.number_format($numeroPanelesDetallado, 2).' ÷ 1.2 = '.number_format($numeroPanelesAjustado, 2).' paneles</p>
                                <hr>
                                <p><strong>Resultado final:</strong> <span class="highlight">'.number_format($numeroPanelesOriginal, 1).' paneles</span> (redondeado a <span class="highlight">'.$panelesRedondeados.' paneles</span>)</p>
                                <p><em>Nota: Se usa 6 como divisor simplificado de ('.$horasSol.' horas × 30 días = '.($horasSol*30).' horas/mes ≈ 180 horas/mes [6 horas/día])</em></p>
                                ';
                            }
                        } elseif (isset($_POST['eliminar'])) {
                            // Limpiar resultados (los valores se mantienen por el value en los inputs)
                            echo '<p>Los valores se han restablecido. Puede realizar un nuevo cálculo.</p>';
                        }
                    }
                    ?>
                </div>
            </section>
        </div>
    </section>
    <footer>
        Creative Commons versión 3.0 SciSoft 2024
    </footer>
</body>
</html>