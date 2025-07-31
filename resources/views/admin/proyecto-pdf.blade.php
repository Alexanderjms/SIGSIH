<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reporte de Proyecto BAC</title>
    <link rel="stylesheet" href="proyecto-pdf.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        html {
             height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 40px;
            box-sizing: border-box;

            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background: #fff;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 40px;
        }

        .section {
            margin-bottom: 40px;
        }

        h2 {
            font-size: 1.5em;
            color: #34495e;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #e0e0e0;
        }

        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .summary-box {
            flex: 1;
            background-color: #f9f9f9;
            border: 1px solid #e9ecef;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            min-width: 200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #c2c2c2;
            padding: 12px;
            text-align: left;
            font-size: 0.95em;
        }

        thead th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .income-row {
            background-color: #a8e6cf;
        }

        .expense-row {
            background-color: #cad2d9;
        }

        .charts {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        @media print {
            body {
                display: block;
                padding: 0;
                margin: 0;
                background: #fff;
            }
            .container {
                width: 100%;
                max-width: none;
                box-shadow: none;
                border: none;
                padding: 0;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 20px;
                align-items: flex-start;
            }
            .container {
                padding: 20px;
            }
        }
    </style>

  </head>
  <body>
    <div class="container">
      <h1>Proyecto BAC</h1>

      <div class="summary">
        <div class="summary-box">
          <h2>Ingresos Totales</h2>
          <p>L. 29,230.00</p>
        </div>
        <div class="summary-box">
          <h2>Gastos Totales</h2>
          <p>L. 15,983.00</p>
        </div>
        <div class="summary-box">
          <h2>Balance</h2>
          <p>L. 13,247.00</p>
        </div>
      </div>

      <div class="section">
        <h2>Ingresos</h2>
        <table>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Fecha</th>
              <th>Monto</th>
              <th>Categoría</th>
              <th>Descripción</th>
            </tr>
          </thead>
          <tbody>
            <tr class="income-row">
              <td>Pago inicial</td>
              <td>2025-07-20</td>
              <td>L. 15,000.00</td>
              <td>Ingreso</td>
              <td>Primer pago del Proyecto Alpha</td>
            </tr>
            <tr class="income-row">
              <td>Segundo pago</td>
              <td>2025-07-25</td>
              <td>L. 14,230.00</td>
              <td>Ingreso</td>
              <td>Segundo pago del Proyecto Beta</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="section">
        <h2>Gastos</h2>
        <table>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Fecha</th>
              <th>Monto</th>
              <th>Categoría</th>
              <th>Descripción</th>
            </tr>
          </thead>
          <tbody>
            <tr class="expense-row">
              <td>Compra de software</td>
              <td>2025-07-22</td>
              <td>L. 5,500.00</td>
              <td>Gasto</td>
              <td>Licencias de software de desarrollo</td>
            </tr>
            <tr class="expense-row">
              <td>Alquiler de oficina</td>
              <td>2025-07-26</td>
              <td>L. 10,483.00</td>
              <td>Gasto</td>
              <td>Pago de alquiler mensual</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="charts">
        <div class="chart-container">
          <h2>Gráfica de Ingresos</h2>
          <canvas id="incomeChart"></canvas>
        </div>
        <div class="chart-container">
          <h2>Gráfica de Gastos</h2>
          <canvas id="expenseChart"></canvas>
        </div>
      </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
  // Datos para la gráfica de ingresos
  const incomeData = {
    labels: ["Pago inicial", "Segundo pago"],
    datasets: [
      {
        label: "Ingresos",
        data: [15000, 14230],
        backgroundColor: ["rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)"],
        borderColor: ["rgba(75, 192, 192, 1)", "rgba(54, 162, 235, 1)"],
        borderWidth: 1,
      },
    ],
  };

  // Datos para la gráfica de gastos
  const expenseData = {
    labels: ["Compra de software", "Alquiler de oficina"],
    datasets: [
      {
        label: "Gastos",
        data: [5500, 10483],
        backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)"],
        borderColor: ["rgba(255, 99, 132, 1)", "rgba(255, 159, 64, 1)"],
        borderWidth: 1,
      },
    ],
  };

  // Opciones comunes para las gráficas
  const options = {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  };

  // Crear gráfica de ingresos
  const incomeCtx = document.getElementById("incomeChart").getContext("2d");
  new Chart(incomeCtx, {
    type: "bar",
    data: incomeData,
    options: options,
  });

  // Crear gráfica de gastos
  const expenseCtx = document.getElementById("expenseChart").getContext("2d");
  new Chart(expenseCtx, {
    type: "bar",
    data: expenseData,
    options: options,
  });
});

    </script>
  </body>
</html>
