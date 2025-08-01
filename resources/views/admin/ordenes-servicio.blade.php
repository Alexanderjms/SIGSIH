<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Servicio - ACF Technologies</title>
    <style>
        /* --- General y Fuentes --- */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #e9e9e9;
            margin: 20px;
            font-size: 10px;
        }

        .container {
            max-width: 850px;
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        /* --- Colores Principales --- */
        :root {
            --primary-blue: #003B6D;
            --text-light: #fff;
            --border-color: #003B6D;
        }

        /* --- Cabecera con Logo --- */
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            gap: 20px;
        }

        .logo-img {
            width: 220px;
            /* Ancho ajustado para el logo real */
            height: auto;
        }

        .company-details {
            font-weight: bold;
            font-size: 11px;
        }

        .company-details p {
            margin: 4px 0;
        }

        /* --- Título Principal --- */
        .main-title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin: 30px 0;
        }

        /* --- Contenedores Flex y Grid --- */
        .flex-container {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            align-items: stretch;
        }

        .grid-container {
            display: grid;
            gap: 10px;
            margin-bottom: 15px;
        }

        /* --- Estilo de Campo Individual (Header azul + contenido) --- */
        .field-group {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .field-header {
            background-color: var(--primary-blue);
            color: var(--text-light);
            padding: 4px 8px;
            font-weight: bold;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        .field-content {
            border: 1px solid var(--border-color);
            border-top: none;
            height: 25px;
            /* Altura fija para los campos de una línea */
            padding: 5px;
            box-sizing: border-box;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        .field-content-large {
            height: 100px;
            /* Altura para textareas */
        }

        .field-content-checkboxes {
            height: auto;
            display: flex;
            gap: 20px;
            align-items: center;
            padding: 8px;
        }

        .field-content-checkboxes label {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* --- Layouts Específicos --- */
        .top-fields {
            justify-content: flex-end;
            /* Alinea los campos a la derecha */
        }

        .date-fields {
            flex-direction: column;
            width: 40%;
        }

        .status-field {
            width: 60%;
            align-self: flex-start;
        }

        .status-field .field-content {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .status-field label {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .client-info-grid {
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }

        .span-2 {
            grid-column: span 2;
        }

        .span-4 {
            grid-column: span 4;
        }

        .signature-fields {
            justify-content: space-between;
        }

        .signature-block {
            width: 48%;
            border: 1px solid var(--border-color);
            border-radius: 4px;
        }

        .signature-block .field-header {
            border-radius: 3px 3px 0 0;
        }

        .signature-block-content {
            padding: 10px;
        }

        .signature-block-content .field-group {
            margin-bottom: 8px;
        }

        .signature-block-content .field-header {
            background: none;
            color: #333;
            padding: 0;
            font-size: 11px;
        }

        .signature-block-content .field-content {
            border: 1px solid #aaa;
            border-top: 1px solid #aaa;
            height: 22px;
        }

        /* Estilos para la cajita de solicitud */
        .solicitud-table {
            border-collapse: collapse;
            width: 270px;
            margin: 0;
            border: 1px solid #000;
        }

        .solicitud-table th,
        .solicitud-table td {
            border: 1px solid #000;
            padding: 6px 4px;
            text-align: center;
            height: 28px;
            box-sizing: border-box;
        }

        .solicitud-table th {
            background-color: #003B6D;
            color: #fff;
            font-weight: bold;
        }

        .dates-table {
            border-collapse: collapse;
            width: 100%;
            max-width: 390px;
            /* Igual que tu min-width anterior */
            margin: 0;
        }

        .dates-table th,
        .dates-table td {
            border: 1px solid #000;
            padding: 6px 8px;
            text-align: center;
            box-sizing: border-box;
        }

        .dates-table th {
            background-color: #003B6D;
            color: #fff;
            font-weight: bold;
            white-space: nowrap;
        }


        /* --- Estado de la Orden --- */
        .estado-tabla {
            border-collapse: separate;
            border-spacing: 0;
            width: 500px;
            font-family: 'Arial Black', Arial, Helvetica, sans-serif;
            font-size: 2rem;
            margin-top: 10px;
            box-sizing: border-box;
        }

        .estado-tabla th {
            background: #24497A;
            color: #fff;
            text-align: center;
            font-size: 2rem;
            font-family: 'Arial Black', Arial, Helvetica, sans-serif;
            border: 2px solid #000;
            padding: 6px 0 4px 0;
            letter-spacing: 1px;
        }

        .estado-tabla td {
            background: #fff;
            text-align: left;
            font-size: 1.6rem;
            font-family: 'Arial Black', Arial, Helvetica, sans-serif;
            border: 2px solid #000;
            height: 45px;
            vertical-align: middle;
            padding: 0 0 0 14px;
        }

        .estado-tabla .bold {
            font-weight: bold;
            font-family: 'Arial Black', Arial, Helvetica, sans-serif;
        }

        .estado-tabla .empty {
            background: #fff;
            border: 2px solid #000;
            width: 40px;
            padding: 0;
        }

        .estado-tabla .center {
            text-align: center;
            padding-left: 0;
        }

        /* Ajusta el ancho de las celdas según imagen */
        .estado-tabla .col-izq {
            width: 200px;
        }

        .estado-tabla .col-der {
            width: 200px;
        }

        /* Sin bordes redondeados, bien cuadrados */
        .estado-tabla,
        .estado-tabla th,
        .estado-tabla td {
            border-radius: 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- HEADER: solo logo + datos -->
        <header style="margin-bottom:10px;">
            <table style="width:100%; border-collapse:collapse; table-layout:fixed;">
                <tr>
                    <!-- 1) Logo -->
                    <td style="width:220px; vertical-align:middle; padding:0;">
                        <img src="{{ asset('images/LOGO_ACF.jpg') }}" alt="Logo"
                            style="width:220px; height:auto; display:block;">
                    </td>

                    <!-- 2) Texto de la empresa, limitamos a 400px -->
                    <td style="width:400px; text-align:center; vertical-align:middle; 
                 font-weight:bold; font-size:13px; padding:0 5px;">
                        Col. Las Mercedes, Av. Los Espliegos y Calle<br>
                        Los Eucaliptos N°10, San Salvador, El Salvador,<br>
                        Tel. +503 2209-9400<br>
                        supportlat@acftechnologies.com<br>
                        www.acftechnologies.com
                    </td>

                    <!-- 3) Celda “fantasma” para reservar espacio -->
                    <td style="width:270px; padding:0;"></td>
                </tr>
            </table>
        </header>


        <!-- CAJITA Nº SOLICITUD: debajo del header -->
        <div style="display:flex; justify-content:flex-end; margin-bottom:15px;">
            <table class="solicitud-table">
                <thead>
                    <tr>
                        <th>Nº de Solicitud ACF</th>
                        <th>Nº de Solicitud Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- TÍTULO PRINCIPAL -->
        <div class="main-title" style="margin:-10px 0 30px;">
            ORDEN DE SERVICIO
        </div>

        <!-- FECHAS Y ESTADO -->
        <div style="display:flex; justify-content:flex-start; gap:60px; margin-bottom:30px;">
            <table style="border-collapse:collapse; border-spacing:0; min-width:390px;">
                <tr>
                    <td
                        style="background:#003B6D; color:#fff; font-weight:bold; text-align:center; padding:6px 10px; border-top-left-radius:3px; border-right:1px solid #003B6D;">
                        FECHA DE RECEPCION
                    </td>
                    <td
                        style="background:#003B6D; color:#fff; font-weight:bold; text-align:center; padding:6px 10px; border-top-right-radius:3px;">
                        HORA DE RECEPCION
                    </td>
                </tr>
                <tr>
                    <td
                        style="border-left:1px solid #003B6D; border-bottom:1px solid #003B6D; border-right:1px solid #003B6D; height:25px; background:#fff;">
                    </td>
                    <td style="border-right:1px solid #003B6D; border-bottom:1px solid #003B6D; background:#fff;">
                    </td>
                </tr>
                <tr>
                    <td
                        style="background:#003B6D; color:#fff; font-weight:bold; text-align:center; padding:6px 10px; border-right:1px solid #003B6D;">
                        FECHA DE INICIO
                    </td>
                    <td style="background:#003B6D; color:#fff; font-weight:bold; text-align:center;">
                        HORA DE INICIO
                    </td>
                </tr>
                <tr>
                    <td
                        style="border-left:1px solid #003B6D; border-bottom:1px solid #003B6D; border-right:1px solid #003B6D; height:25px; background:#fff;">
                    </td>
                    <td style="border-right:1px solid #003B6D; border-bottom:1px solid #003B6D; background:#fff;">
                    </td>
                </tr>
                <tr>
                    <td
                        style="background:#003B6D; color:#fff; font-weight:bold; text-align:center; padding:6px 10px; border-bottom-left-radius:3px; border-right:1px solid #003B6D;">
                        FECHA DE CULMINACION
                    </td>
                    <td
                        style="background:#003B6D; color:#fff; font-weight:bold; text-align:center; border-bottom-right-radius:3px;">
                        HORA DE CULMINACION
                    </td>
                </tr>
                <tr>
                    <td
                        style="border-left:1px solid #003B6D; border-bottom:1px solid #003B6D; border-right:1px solid #003B6D; height:25px; background:#fff; border-bottom-left-radius:3px;">
                    </td>
                    <td
                        style="border-right:1px solid #003B6D; border-bottom:1px solid #003B6D; background:#fff; border-bottom-right-radius:3px;">
                    </td>
                </tr>
            </table>


            <!-- Estado de la Orden: sustituye aquí tu código anterior -->
            <div style="flex:1; display:flex; justify-content:flex-end;">
                <table class="estado-tabla">
                    <tr>
                        <th colspan="4" style="font-size:2rem;">ESTADO DE LA ORDEN</th>
                    </tr>
                    <tr>
                        <td class="bold col-izq">ABIERTA</td>
                        <td class="empty"></td>
                        <td class="bold col-der">CERRADA</td>
                        <td class="empty"></td>
                    </tr>
                </table>
            </div>





        </div>

        <!-- DATOS DEL CLIENTE -->
        <div class="grid-container client-info-grid">
            <div class="field-group span-2">
                <div class="field-header">CLIENTE:</div>
                <div class="field-content"></div>
            </div>
            <div class="field-group span-2">
                <div class="field-header">CONTACTO</div>
                <div class="field-content"></div>
            </div>
            <div class="field-group">
                <div class="field-header">CIUDAD</div>
                <div class="field-content"></div>
            </div>
            <div class="field-group">
                <div class="field-header">OFICINA</div>
                <div class="field-content"></div>
            </div>
            <div class="field-group">
                <div class="field-header">TELEFONOS</div>
                <div class="field-content"></div>
            </div>
            <div class="field-group">
                <div class="field-header">CORREO ELECTRONICO</div>
                <div class="field-content"></div>
            </div>
            <div class="field-group span-4">
                <div class="field-header">DIRECCION</div>
                <div class="field-content"></div>
            </div>
        </div>

        <!-- DESCRIPCIONES -->
        <div class="field-group" style="margin-bottom:15px;">
            <div class="field-header">DESCRIPCION DEL SERVICIO / FALLA (CLIENTE):</div>
            <div class="field-content field-content-large"></div>
        </div>
        <div class="field-group" style="margin-bottom:15px;">
            <div class="field-header">DESCRIPCION DEL SERVICIO / FALLA (PERSONAL ACF):</div>
            <div class="field-content field-content-large"></div>
        </div>
        <div class="field-group" style="margin-bottom:15px;">
            <div class="field-header">ACTIVIDAD REALIZADA PARA LA SOLUCIÓN (ADJUNTAR FOTOS/VIDEO DE LA ACTIVIDAD):</div>
            <div class="field-content field-content-large"></div>
        </div>

        <!-- REPUESTOS Y CALIFICACIÓN -->
        <div class="field-group" style="margin-bottom:15px;">
            <div class="field-header">SE INSTALO ALGUN REPUESTO:</div>
            <div class="field-content field-content-checkboxes">
                <label><input type="checkbox"> SI</label>
                <label><input type="checkbox"> NO</label>
                <label>CUAL: <span style="border-bottom:1px solid #333; flex-grow:1; margin-left:5px;"></span></label>
            </div>
        </div>
        <div class="field-group" style="margin-bottom:15px;">
            <div class="field-header">CALIFICACION DEL SERVICIO</div>
            <div class="field-content field-content-checkboxes">
                <label><input type="checkbox"> EXCELENTE</label>
                <label><input type="checkbox"> BUENO</label>
                <label><input type="checkbox"> REGULAR</label>
                <label><input type="checkbox"> DEFICIENTE</label>
            </div>
        </div>

        <!-- FIRMAS -->
        <div class="flex-container signature-fields">
            <div class="signature-block">
                <div class="field-header">CLIENTE:</div>
                <div class="signature-block-content">
                    <div class="field-group">
                        <div class="field-header">NOMBRE Y APELLIDO</div>
                        <div class="field-content"></div>
                    </div>
                    <div class="field-group">
                        <div class="field-header">C.I.</div>
                        <div class="field-content"></div>
                    </div>
                    <div class="field-group">
                        <div class="field-header">CARGO</div>
                        <div class="field-content"></div>
                    </div>
                    <div class="field-group">
                        <div class="field-header">FIRMA</div>
                        <div class="field-content" style="height:40px;"></div>
                    </div>
                </div>
            </div>
            <div class="signature-block">
                <div class="field-header">ACF TECHNOLOGIES</div>
                <div class="signature-block-content">
                    <div class="field-group">
                        <div class="field-header">NOMBRE Y APELLIDO</div>
                        <div class="field-content"></div>
                    </div>
                    <div class="field-group">
                        <div class="field-header">C.I.</div>
                        <div class="field-content"></div>
                    </div>
                    <div class="field-group">
                        <div class="field-header">CARGO</div>
                        <div class="field-content"></div>
                    </div>
                    <div class="field-group">
                        <div class="field-header">FIRMA</div>
                        <div class="field-content" style="height:40px;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>