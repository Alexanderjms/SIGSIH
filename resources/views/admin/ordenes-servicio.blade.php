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

        /* --- Título Principal --- */
        .main-title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin: 30px 0;
        }

        /* --- Contenedores Flex --- */
        .flex-container {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            align-items: stretch;
        }
        
        /* --- Estilos de Campos (aplicables en varias partes) --- */
        .field-header {
            background-color: var(--primary-blue);
            color: var(--text-light);
            padding: 4px 8px;
            font-weight: bold;
        }

        .field-content {
            border: 1px solid var(--border-color);
            border-top: none;
            height: 25px;
            padding: 5px;
            box-sizing: border-box;
        }

        .field-content-large {
            height: 100px;
            background-color: #fff;
            background-image: repeating-linear-gradient(#fff,
                    #fff 32px,
                    #000 32px,
                    #000 33px);
            background-size: 100% 34px;
        }

        .field-content-lines {
            height: 60px;
            background-color: #fff;
            background-image: repeating-linear-gradient(#fff,
                    #fff 18px,
                    #000 18px,
                    #000 19px);
            background-size: 100% 19px;
            border-bottom: none;
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

        /* Estilos para la tabla de estado */
        .estado-tabla {
            border-collapse: separate;
            border-spacing: 0;
            width: 30em;
            height: 3em;
            font-family: Arial, sans-serif;
            font-size: 9px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        .estado-tabla th {
            background: #24497A;
            color: #fff;
            text-align: center;
            font-size: 10px;
            border: 1px solid #000;
            letter-spacing: 0.5px;
        }

        .estado-tabla td {
            background: #fff;
            text-align: center;
            font-size: 9px;
            border: 1px solid #000;
            height: 20px;
            vertical-align: middle;
            padding: 2px;
        }

        .estado-tabla .bold {
            font-weight: bold;
        }

        .estado-tabla .empty {
            width: 20px;
            padding: 0;
        }

        .estado-tabla .col-izq,
        .estado-tabla .col-der {
            width: 60px;
        }

        /* --- Estilos para la Tabla de Fechas --- */
.dates-table {
    border-collapse: collapse; /* Solución clave: Fusiona los bordes en uno solo. */
    width: 390px; /* Ancho fijo para mantener el diseño. */
}

.dates-table th, .dates-table td {
    border: 1px solid #003B6D; /* Borde único y fino para todas las celdas. */
    padding: 6px 10px;
    text-align: center;
}

.dates-table th {
    background-color: #003B6D;
    color: #fff;
    font-weight: bold;
}

.dates-table td {
    height: 25px; /* Altura para las celdas vacías. */
}

/* --- Estilos para la Tabla de Estado de la Orden --- */
.estado-tabla {
    border-collapse: collapse; /* Solución clave: También aquí para bordes finos. */
    border: 1px solid #003B6D; /* Borde exterior único para la tabla. */
    margin-top: 10px; /* Alinea la tabla con la segunda fila de la tabla de fechas. */
}

.estado-tabla th, .estado-tabla td {
    border: 1px solid #003B6D; /* Borde único y fino. */
    text-align: center;
}

.estado-tabla th {
    background-color: #003B6D;
    color: #fff;
    padding: 6px;
    font-size: 10px;
}

.estado-tabla td {
    font-weight: bold;
    padding: 6px;
    height: 16px;
    width: 80px; /* Ancho para las celdas de texto. */
}

.estado-tabla .checkbox-cell {
    width: 17px; /* Ancho reducido para las celdas de checkbox. */
    font-weight: normal;
}

/* Nuevo estilo para las tablas de repuestos y calificación - reduciendo altura */
.repuesto-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 0;
}

.repuesto-table th {
    background-color: #003B6D;
    color: white;
    font-weight: bold;
    text-align: left;
    padding: 2px 8px; /* reducido de 5px a 2px */
    border: 1px solid #000;
    font-size: 10px; /* tamaño fuente más pequeño */
}

.repuesto-table td {
    padding: 4px 8px; /* reducido de 8px a 4px */
    border: 1px solid #000;
    height: 20px; /* reducido de 30px a 20px */
}

.checkbox-label {
    display: inline-block;
    margin-right: 20px;
    font-size: 10px;
    vertical-align: middle;
}

.checkbox-label input {
    vertical-align: middle;
    margin-top: 0;
    margin-bottom: 0;
}

/* Estilos para la sección de firmas según la primera foto */
.firma-table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #003B6D;
}

.firma-table th {
    background-color: #003B6D;
    color: white;
    text-align: center;
    font-weight: bold;
    padding: 3px 8px;
    font-size: 11px;
    border-bottom: 0;
}

.firma-table tr {
    border: none;
}

.firma-table td {
    border: 1px solid #003B6D; /* Borde alrededor de todo el contenido */
    padding: 0;
    vertical-align: top;
}

.firma-row {
    padding: 0;
    border-bottom: 1px solid #000;
}

.firma-label {
    font-weight: bold;
    font-size: 10px;
    margin: 0;
    padding: 3px 5px;
}

.firma-space {
    height: 25px;
    border-bottom: 1px solid #000;
}

.firma-space-larger {
    height: 45px;
    border-bottom: 0; /* Sin borde en el último espacio */
}
    </style>
</head>

<body>

    <div class="container">
        <!-- HEADER -->
        <header style="margin-bottom:10px;">
            <table style="width:100%; border-collapse:collapse; table-layout:fixed;">
                <tr>
                    <td style="width:220px; vertical-align:middle; padding:0;">
                        <img src="{{ asset('images/LOGO_ACF.jpg') }}" alt="Logo ACF Technologies" style="width:220px; height:auto; display:block;">
                    </td>
                    <td style="width:400px; text-align:center; vertical-align:middle; font-weight:bold; font-size:13px; padding:0 5px;">
                        Col. Las Mercedes, Av. Los Espliegos y Calle<br>
                        Los Eucaliptos N°10, San Salvador, El Salvador,<br>
                        Tel. +503 2209-9400<br>
                        supportlat@acftechnologies.com<br>
                        www.acftechnologies.com
                    </td>
                    <td style="width:270px; padding:0;"></td>
                </tr>
            </table>
        </header>

        <!-- Nº SOLICITUD -->
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
        <!-- INICIO: SECCIÓN DE FECHAS Y ESTADO CORREGIDA -->
<div style="display:flex; justify-content:flex-start; gap:19em; align-items:flex-start; margin-bottom:30px;">
    
    <!-- Tabla de Fechas -->
    <table class="dates-table">
        <tr>
            <th>FECHA DE RECEPCION</th>
            <th>HORA DE RECEPCION</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>FECHA DE INICIO</th>
            <th>HORA DE INICIO</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>FECHA DE CULMINACION</th>
            <th>HORA DE CULMINACION</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <!-- Tabla de Estado -->
    <table class="estado-tabla">
        <thead>
            <tr>
                <th colspan="4">ESTADO DE LA ORDEN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ABIERTA</td>
                <td class="checkbox-cell"></td>
                <td>CERRADA</td>
                <td class="checkbox-cell"></td>
            </tr>
        </tbody>
    </table>

</div>
<!-- FIN: SECCIÓN DE FECHAS Y ESTADO CORREGIDA -->

        <!-- DATOS DEL CLIENTE -->
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td colspan="2" style="padding: 0; vertical-align: top; border: 1px solid var(--border-color); border-right: none;"><div class="field-header">CLIENTE:</div><div style="height: 25px;"></div></td>
                    <td colspan="2" style="padding: 0; vertical-align: top; border: 1px solid var(--border-color);"><div class="field-header">CONTACTO</div><div style="height: 25px;"></div></td>
                </tr>
                <tr>
                    <td style="width: 25%; padding: 0; vertical-align: top; border: 1px solid var(--border-color); border-top: none; border-right: none;"><div class="field-header">CIUDAD</div><div style="height: 25px;"></div></td>
                    <td style="width: 25%; padding: 0; vertical-align: top; border: 1px solid var(--border-color); border-top: none; border-right: none;"><div class="field-header">OFICINA</div><div style="height: 25px;"></div></td>
                    <td style="width: 25%; padding: 0; vertical-align: top; border: 1px solid var(--border-color); border-top: none; border-right: none;"><div class="field-header">TELEFONOS</div><div style="height: 25px;"></div></td>
                    <td style="width: 25%; padding: 0; vertical-align: top; border: 1px solid var(--border-color); border-top: none;"><div class="field-header">CORREO ELECTRONICO</div><div style="height: 25px;"></div></td>
                </tr>
                <tr>
                    <td colspan="4" style="padding: 0; vertical-align: top; border: 1px solid var(--border-color); border-top: none;"><div class="field-header">DIRECCION</div><div style="height: 25px;"></div></td>
                </tr>
            </tbody>
        </table>

        <!-- INICIO: BLOQUE UNIFICADO DE DESCRIPCIONES -->
        <table style="width: 100%; border-collapse: collapse; border: 1px solid var(--border-color); margin-bottom: 15px;">
            <tbody>
                <!-- Descripcion Cliente -->
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 0;">
                        <div class="field-header">DESCRIPCION DEL SERVICIO / FALLA (CLIENTE):</div>
                        <div class="field-content-large"></div>
                    </td>
                </tr>
                <!-- Descripcion Personal ACF -->
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 0;">
                        <div class="field-header">DESCRIPCION DEL SERVICIO / FALLA (PERSONAL ACF):</div>
                        <div class="field-content-large"></div>
                    </td>
                </tr>
                <!-- Actividad Realizada -->
                <tr>
                    <td style="padding: 0;">
                        <div class="field-header">ACTIVIDAD REALIZADA PARA LA SOLUCIÓN (ADJUNTAR FOTOS/VIDEO DE LA ACTIVIDAD):</div>
                        <div class="field-content-large"></div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- REPUESTOS (según la segunda imagen) -->
        <table class="repuesto-table" style="margin-bottom: 0;">
            <tr>
                <th style="width: 30%;">SE INSTALO ALGUN REPUESTO:</th>
                <td>
                    <span class="checkbox-label">SI <input type="checkbox" style="vertical-align: middle;"></span>
                    <span class="checkbox-label">NO <input type="checkbox" style="vertical-align: middle;"></span>
                    <span>CUAL: <span style="display: inline-block; width: 70%;">&nbsp;</span></span>
                </td>
            </tr>
        </table>

        <!-- Espacio de separación entre tablas -->
        <div style="height: 15px;"></div>

        <!-- CALIFICACIÓN DEL SERVICIO (según la segunda imagen) -->
        <table class="repuesto-table" style="margin-bottom: 15px;">
            <tr>
                <th style="width: 30%;">CALIFICACION DEL SERVICIO</th>
                <td>
                    <span class="checkbox-label">EXCELENTE <input type="checkbox" style="vertical-align: middle;"></span>
                    <span class="checkbox-label">BUENO <input type="checkbox" style="vertical-align: middle;"></span>
                    <span class="checkbox-label">REGULAR <input type="checkbox" style="vertical-align: middle;"></span>
                    <span class="checkbox-label">DEFICIENTE <input type="checkbox" style="vertical-align: middle;"></span>
                </td>
            </tr>
        </table>

        <!-- FIRMAS según la imagen de referencia exacta -->
<div style="display: flex; justify-content: space-between; gap: 25px; margin-top: 15px; margin-bottom: 15px;">
    <!-- Firma Cliente -->
    <table class="firma-table" style="width: 48%;">
        <tr>
            <th>CLIENTE:</th>
        </tr>
        <tr>
            <td style="padding: 0;">
                <div class="firma-label">NOMBRE Y APELLIDO</div>
                <div class="firma-space"></div>
                <div class="firma-label">C.I.</div>
                <div class="firma-space"></div>
                <div class="firma-label">CARGO</div>
                <div class="firma-space"></div>
                <div class="firma-label">FIRMA</div>
                <div class="firma-space-larger"></div>
            </td>
        </tr>
    </table>

    <!-- Firma ACF -->
    <table class="firma-table" style="width: 48%;">
        <tr>
            <th>ACF TECHNOLOGIES</th>
        </tr>
        <tr>
            <td style="padding: 0;">
                <div class="firma-label">NOMBRE Y APELLIDO</div>
                <div class="firma-space"></div>
                <div class="firma-label">C.I.</div>
                <div class="firma-space"></div>
                <div class="firma-label">CARGO</div>
                <div class="firma-space"></div>
                <div class="firma-label">FIRMA</div>
                <div class="firma-space-larger"></div>
            </td>
        </tr>
    </table>
</div>

    </div>

</body>

</html>