<?php

// require_once __DIR__ . '/vendor/autoload.php';
require_once '../vendor/autoload.php';
require '../functions.php';

$id_gaji = $_GET["id_gaji"];
$id_gaji_detail = $_GET["id_gaji_detail"];

$gaji_detail = query("SELECT * FROM gaji_detail
                        INNER JOIN gaji ON gaji_detail.id_gaji = gaji.id_gaji
                        INNER JOIN karyawan ON gaji_detail.id_karyawan = karyawan.id_karyawan
                        WHERE id_gaji_detail = $id_gaji_detail
                        ")[0];

$html = '
    <body style="font-size: 10pt; font-family: Arial, Helvetica, sans-serif; color: #000000;">
        <h4 style="text-transform: uppercase; margin-top:100px; text-align: center;">
        REKAP GAJI TOKO KIKI
        <br>
        <br>
        BULAN : ' . date('F Y', strtotime($gaji_detail["tanggal_gaji"])) . '
        </h4>
        <table style="border: 1px solid #000;" cellspacing="0" width="100%">
            <tr style="border: 1px solid #000;">
                <td style="border: 1px solid #000; padding: 10px; font-weight: bold;" width="30%">Nama</td>
                <td style="border: 1px solid #000; padding: 10px;"> : ' . $gaji_detail["nama"] . '</td>
            </tr>
            <tr style="border: 1px solid #000;">
                <td style="border: 1px solid #000; padding: 10px; font-weight: bold;" width="30%">Gaji Pokok / Hari</td>
                <td style="border: 1px solid #000; padding: 10px;"> : Rp. ' . number_format($gaji_detail["gaji_pokok"], 0, ',', '.') . ',-</td>
            </tr>
            <tr style="border: 1px solid #000;">
                <td style="border: 1px solid #000; padding: 10px; font-weight: bold;" width="30%">Jumlah Kehadiran</td>
                <td style="border: 1px solid #000; padding: 10px;"> : ' . $gaji_detail["kehadiran"] . ' Hari</td>
            </tr>
            <tr style="border: 1px solid #000;">
                <td style="border: 1px solid #000; padding: 10px; font-weight: bold;" width="30%">Total Gaji</td>
                <td style="border: 1px solid #000; padding: 10px;"> : Rp. ' . number_format($gaji_detail["total_gaji"], 0, ',', '.') . ',-</td>
            </tr>
        </table>

        <br>

        <table>
            <tr>
                <td width="35%"></td>
                <td width="35%"></td>
                <td width="30%" style="text-align: center;">
                    <p>
                        Cianjur, ' . date("d F Y") . '
                        <br>
                        Owner Toko Kiki
                    </p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>Nama</p>
                </td>
            </tr>
        </table>
    </body>
';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);

$stylesheet = file_get_contents('style_print.css');
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML("$html", \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output('Slip Gaji ' . $gaji_detail["nama"] . '.pdf', 'I');
// $mpdf->Output();
