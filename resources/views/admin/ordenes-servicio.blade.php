<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Orden de Servicio ACF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            color: #000;
            margin: 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            vertical-align: top;
        }

        .header-blue {
            background-color: #2F5496;
            color: white;
            font-weight: bold;
            text-align: center;
            border: 1px solid #000;
            padding: 4px;
        }

        .line-cell {
            border: 1px solid #000;
            height: 25px;
        }

        .no-border {
            border: none;
        }

        .titulo {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin: 15px 0 10px 0;
        }

        .signature-box {
            height: 60px;
            border: 1px solid black;
        }

        .checkbox {
            font-size: 14px;
            margin-right: 10px;
        }

        .font-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- ENCABEZADO -->
    <table>
        <tr>
            <td class="no-border" style="width: 50%;">
                <div style="display: flex; align-items: flex-start;">
                    <img src="LOGO_ACF.jpg" alt="ACF Logo" style="height: 50px; margin-right: 8px;">
                    <div style="line-height: 1.2; margin-top: 2px;">
                        <div style="color: #00458C; font-weight: bold; font-size: 18px;">ACF</div>
                        <div style="color: #84BD00; font-size: 13px;">TECHNOLOGIES</div>
                    </div>
                </div>
            </td>
            <td class="no-border" style="width: 50%; text-align: right; font-size: 9px; line-height: 1.4;">
                Col. Las Mercedes, Av. Los Espliegos y Calle<br>
                Los Eucaliptos N°10, San Salvador, El Salvador.<br>
                Tel. +503 2209-9400<br>
                supportlat@acftechnologies.com<br>
                www.acftechnologies.com
            </td>
        </tr>
    </table>

    <!-- TÍTULO -->
    <div class="titulo">ORDEN DE SERVICIO</div>

    <!-- SECCIÓN PRINCIPAL (2 COLUMNAS) -->
    <table style="width:100%; margin-bottom: 10px;">
        <tr>
            <!-- COLUMNA IZQUIERDA (Fechas) -->
            <td style="width: 50%; vertical-align: top;">
                <table style="width: 100%;">
                    <tr>
                        <td class="header-blue">FECHA DE RECEPCION</td>
                        <td class="header-blue">HORA DE RECEPCION</td>
                    </tr>
                    <tr>
                        <td class="line-cell"></td>
                        <td class="line-cell"></td>
                    </tr>
                    <tr>
                        <td class="header-blue">FECHA DE INICIO</td>
                        <td class="header-blue">HORA DE INICIO</td>
                    </tr>
                    <tr>
                        <td class="line-cell"></td>
                        <td class="line-cell"></td>
                    </tr>
                    <tr>
                        <td class="header-blue">FECHA DE CULMINACION</td>
                        <td class="header-blue">HORA DE CULMINACION</td>
                    </tr>
                    <tr>
                        <td class="line-cell"></td>
                        <td class="line-cell"></td>
                    </tr>
                </table>
            </td>

            <!-- COLUMNA DERECHA (Solicitudes + Estado) -->
            <td style="width: 50%; vertical-align: top;">
                <table style="width: 100%; margin-bottom: 15px;">
                    <tr>
                        <td class="header-blue">N° de Solicitud ACF</td>
                        <td class="header-blue">N° de Solicitud Cliente</td>
                    </tr>
                    <tr>
                        <td class="line-cell"></td>
                        <td class="line-cell"></td>
                    </tr>
                </table>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2" class="header-blue">ESTADO DE LA ORDEN</td>
                    </tr>
                    <tr>
                        <td class="line-cell" style="text-align: center;">ABIERTA &#9744;</td>
                        <td class="line-cell" style="text-align: center;">CERRADA &#9744;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- INFORMACIÓN DE CLIENTE -->
    <table>
        <tr>
            <td class="header-blue" style="width: 25%;">CLIENTE</td>
            <td class="line-cell" style="width: 25%;"></td>
            <td class="header-blue" style="width: 25%;">CONTACTO</td>
            <td class="line-cell" style="width: 25%;"></td>
        </tr>
        <tr>
            <td class="header-blue">CIUDAD</td>
            <td class="line-cell"></td>
            <td class="header-blue">OFICINA</td>
            <td class="line-cell"></td>
        </tr>
        <tr>
            <td class="header-blue">TELEFONOS</td>
            <td class="line-cell"></td>
            <td class="header-blue">CORREO ELECTRONICO</td>
            <td class="line-cell"></td>
        </tr>
        <tr>
            <td class="header-blue">DIRECCION</td>
            <td class="line-cell" colspan="3"></td>
        </tr>
    </table>

    <!-- DESCRIPCIÓN CLIENTE -->
    <table style="margin-top: 10px;">
        <tr>
            <td colspan="4" class="header-blue">DESCRIPCIÓN DEL SERVICIO / FALLA (CLIENTE):</td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
    </table>

    <!-- DESCRIPCIÓN PERSONAL ACF -->
    <table style="margin-top: 10px;">
        <tr>
            <td colspan="4" class="header-blue">DESCRIPCIÓN DEL SERVICIO / FALLA (PERSONAL ACF):</td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
    </table>

    <!-- ACTIVIDAD REALIZADA -->
    <table style="margin-top: 10px;">
        <tr>
            <td colspan="4" class="header-blue">ACTIVIDAD REALIZADA PARA LA SOLUCIÓN (ADJUNTAR FOTOS/VIDEO DE LA ACTIVIDAD):</td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
        <tr>
            <td colspan="4" class="line-cell"></td>
        </tr>
    </table>

    <!-- REPUESTO -->
    <p style="margin-top: 10px;">
        <span class="font-bold">¿SE INSTALÓ ALGÚN REPUESTO?</span> &#9744; SI &nbsp;&nbsp; &#9744; NO &nbsp;&nbsp;
        <span class="font-bold">¿CUÁL?</span> ____________________________________________
    </p>

    <!-- CALIFICACIÓN -->
    <p style="margin-top: 5px;">
        <span class="font-bold">CALIFICACIÓN DEL SERVICIO:</span>
        <span class="checkbox">EXCELENTE &#9744;</span>
        <span class="checkbox">BUENO &#9744;</span>
        <span class="checkbox">REGULAR &#9744;</span>
        <span class="checkbox">DEFICIENTE &#9744;</span>
    </p>

    <!-- FIRMAS -->
    <table style="margin-top: 10px;">
        <tr>
            <td style="width: 50%;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2" class="header-blue">CLIENTE:</td>
                    </tr>
                    <tr>
                        <td class="font-bold" style="width: 30%;">NOMBRE Y APELLIDO</td>
                        <td class="line-cell"></td>
                    </tr>
                    <tr>
                        <td class="font-bold">C.I.</td>
                        <td class="line-cell"></td>
                    </tr>
                    <tr>
                        <td class="font-bold">CARGO</td>
                        <td class="line-cell"></td>
                    </tr>
                    <tr>
                        <td class="font-bold">FIRMA</td>
                        <td class="signature-box" colspan="1"></td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2" class="header-blue">ACF TECHNOLOGIES</td>
                    </tr>
                    <tr>
                        <td class="font-bold" style="width: 30%;">NOMBRE Y APELLIDO</td>
                        <td class="line-cell"></td>
                    </tr>
                    <tr>
                        <td class="font-bold">C.I.</td>
                        <td class="line-cell"></td>
                    </tr>
                    <tr>
                        <td class="font-bold">CARGO</td>
                        <td class="line-cell"></td>
                    </tr>
                    <tr>
                        <td class="font-bold">FIRMA</td>
                        <td class="signature-box" colspan="1"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>