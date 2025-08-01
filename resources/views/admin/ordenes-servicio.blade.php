<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Servicio - ACF Technologies</title>
    <link rel="stylesheet" href="{{ asset('css/ordenes-servicio.css') }}">
</head>

<body>

    <div class="container">
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

        <div class="main-title" style="margin:-10px 0 30px;">
            ORDEN DE SERVICIO
        </div>

<div style="display:flex; justify-content:flex-start; gap:19em; align-items:flex-start; margin-bottom:30px;">
    
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

        <table style="width: 100%; border-collapse: collapse; border: 1px solid var(--border-color); margin-bottom: 15px;">
            <tbody>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 0;">
                        <div class="field-header">DESCRIPCION DEL SERVICIO / FALLA (CLIENTE):</div>
                        <div class="field-content-large"></div>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 0;">
                        <div class="field-header">DESCRIPCION DEL SERVICIO / FALLA (PERSONAL ACF):</div>
                        <div class="field-content-large"></div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0;">
                        <div class="field-header">ACTIVIDAD REALIZADA PARA LA SOLUCIÓN (ADJUNTAR FOTOS/VIDEO DE LA ACTIVIDAD):</div>
                        <div class="field-content-large"></div>
                    </td>
                </tr>
            </tbody>
        </table>

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

        <div style="height: 15px;"></div>

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