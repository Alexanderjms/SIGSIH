<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Factura Hardlan</title>
</head>
<body>
  <div class="factura">
      <div class="encabezado-completo">
    <!-- IZQUIERDA: bloque gris -->
    <div class="bloque-encabezado">
      <div class="fila-superior">
        <div>
          <p class="titulo">FACTURA DE SERVICIOS</p>
          <h1>HARDLAN</h1>
        </div>
      </div>
      <div class="fila-inferior">
        <div class="col">
          <p><strong>RTN:</strong> 08011977009xxx</p>
          <p><strong>CAI:</strong> CF1744-1C238E-0F4C93-61C128-794RE4-4G</p>
        </div>
        <div class="col">
          <p><strong>P:</strong> 2223-0505</p>
          <p><strong>M:</strong> 9771-7255</p>
        </div>
        <div class="col">
          <p>Colonia Florencia</p>
          <p>Edificio 105. Tegucigalpa, M. D. C., Honduras</p>
        </div>
      </div>
    </div>

    <!-- DERECHA: bloque rojo -->
    <div class="bloque-factura">
      <h3>000-001-01-000000041</h3>
        <p><strong>FECHA:</strong> 10/06/2025</p>
        <p><strong>Rango Autorizado:</strong><br>000-001-01-00000001 al<br>000-001-01-000000200</p>
        <p><strong>Fecha límite de emisión:</strong><br>31/11/2025</p>
      </div>
    </div>
    

    <!-- DATOS CLIENTE -->
    <div class="bloque-cliente">
      <div class="col">
        <p><strong>Facturar a:</strong> BAC Credomatic</p>
        <p><strong>Dirección:</strong> Av. Los Espliegos y C. Los Eucaliptos #11</p>
        <p>Col. Las Mercedes</p>
        <p>San Salvador, El Salvador</p>
      </div>
      <div class="col">
        <p><strong>Teléfono:</strong> +503 2209-8810</p>
        <p><strong>OC#:</strong> (N/D)</p>
        <p><strong>Correo electrónico:</strong> xxxxxxxx@xxxx.com</p>
        <p><strong>Contacto:</strong> Ing. Miguel Vásquez</p>
      </div>
      <div class="col letras">
        <p><strong>Cantidad en Letras</strong><br>CINCO MIL QUINIENTOS , CERO CENTAVOS $ USS</p>
      </div>
    </div>

    <!-- TABLA -->
    <table class="detalle">
      <thead>
        <tr>
          <th>FECHA</th>
          <th>DESCRIPCIÓN</th>
          <th>HORAS</th>
          <th>TARIFA FIJA</th>
          <th>DESCUENTO</th>
          <th>TOTAL</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>10/06/2025</td>
          <td>Mantenimiento preventivo de 3 sucursales</td> 
          <td>1</td>
          <td>5,500.00</td>
          <td>0.00</td>
          <td>5,500.00</td>
        </tr>
        <tr style="height: 300px;"><td colspan="6"></td></tr>
      </tbody>
    </table>

    <!-- TOTALES -->
    <div class="totales">
      <p><strong>Subtotal de la factura</strong> <span>5,500.00 US$</span></p>
      <p><strong>Importe del Impuesto</strong> <span>00.00 US$</span></p>
      <p><strong>Total</strong> <span class="total">5,500.00 US$</span></p>
    </div>

  </div>

  <!-- CSS -->
  <style>
    @page {
      size: letter;
      margin: 20mm;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f1f1f1;
      padding: 30px 0;
    }

    .factura {
      width: 760px;
      margin: auto;
      background: white;
      padding: 20px 30px;
    }

    .encabezado-completo {
      display: flex;
      justify-content: space-between;
      margin-bottom: 0;
    }

    .bloque-encabezado {
      width: 65%;
      background: #4a4a4a;
      color: white;
      padding: 20px;
      font-size: 13px;
    }

    .bloque-encabezado h1 {
      margin: 5px 0 10px;
    }

    .bloque-encabezado .titulo {
      font-size: 13px;
      text-transform: uppercase;
      opacity: 0.85;
    }

    .bloque-factura {
      width: 34%;
      background: #e30613;
      color: white;
      padding: 20px;
      font-size: 13px;
    }

    .bloque-factura h3 {
      margin: 0 0 8px;
      font-size: 16px;
    }

    .bloque-cliente {
      background: #f9f9f9;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      font-size: 14px;
    }

    .bloque-cliente .col {
      width: 30%;
    }

    .bloque-cliente .letras {
      width: 35%;
      text-align: right;
    }

    .detalle {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
      margin-top: 0;
    }

    .detalle thead {
      background: #e30613;
      color: white;
    }

    .detalle th, .detalle td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    .totales {
      width: 100%;
      padding: 30px 0;
      text-align: right;
      font-size: 14px;
    }

    .totales p {
      margin: 5px 30px 5px 0;
    }

    .totales span {
      display: inline-block;
      min-width: 120px;
      text-align: right;
    }

    .totales .total {
      font-weight: bold;
      font-size: 15px;
      border-top: 1px solid black;
      padding-top: 5px;
    }
    .encabezado-completo {
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    .bloque-encabezado {
      width: 65%;
      background: #4a4a4a;
      color: white;
      padding: 20px;
      font-size: 13px;
      box-sizing: border-box;
    }

    .bloque-factura {
     width: 35%;
     background: #e30613;
     color: white;
     padding: 20px;
     font-size: 13px;
     box-sizing: border-box;
    }

    .fila-superior {
     margin-bottom: 10px;
    }

    .fila-superior h1 {
      margin: 0 0 10px;
    }

    .titulo {
      font-size: 13px;
      text-transform: uppercase;
      opacity: 0.85;
      margin: 0;
    }

    .fila-inferior {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .fila-inferior .col {
     width: 32%;
    }
  </style>
</body>
</html>