<?php

require 'pdf.php';
$user = new User();
$override = new OverideData();
$email = new Email();
$random = new Random();

if ($user->isLoggedIn()) {
    try {
        // $clients = $override->getNewsNULL('clients', 'status', 1, 'pt_type');
        // $Total = $override->getCountNULL('clients', 'status', 1, 'pt_type');
        // $clients = $override->getNews('clients', 'status', 1, 'pt_type',0);
        // $Total = $override->getCount1('clients', 'status', 1, 'pt_type',0);
        // $clients = $override->getNewsNULL('clients', 'status', 1, 'treatment_type');
        // $Total = $override->getCountNULL('clients', 'status', 1, 'treatment_type');
        $clients = $override->getNews('clients', 'status', 1, 'screened', 1);
        $screened = $override->getCount1('clients', 'status', 1, 'screened', 1);
        $eligible = $override->getCount1('clients', 'status', 1, 'eligible', 1);
        $successMessage = 'Report Successful Created';
    } catch (Exception $e) {
        die($e->getMessage());
    }
} else {
    Redirect::to('index.php');
}

$span0 = 19;
$span1 = 11;
$span2 = 8;

$title = 'LUNGCANCER SCREENING STUDY : LIST OF ELIGIBEL CLIENTS-' . date('Y-m-d');

$pdf = new Pdf();

// $title = 'NIMREGENIN SUMMARY REPORT_'. date('Y-m-d');
$file_name = $title . '.pdf';

$output = ' ';


$output .= '
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
    
                <tr>
                    <tr>
                        <tr>
                        <td colspan="' . $span0 . '" align="center" style="font-size: 18px">
                                <b>' . $title . '</b>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="' . $span0 . '" align="center" style="font-size: 18px">
                                <b>Total Screened ( ' . $screened . ' ):  Total Eligible( ' . $eligible . ' )</b>
                            </td>
                        </tr>
            
                        <tr>
                            <th colspan="1">No.</th>
                            <th colspan="2">Date Conseted</th>
                            <th colspan="2">Study ID</th>
                            <th colspan="2">Age</th>
                            <th colspan="2">Sex</th>
                            <th colspan="2">Patient Name</th>
                            <th colspan="2">Patient Phone</th>
                            <th colspan="2">Patient Phone 2</th>
                            <th colspan="2">Status</th>
                            <th colspan="2">SITE</th>
                        </tr>
    
     ';

// Load HTML content into dompdf
$x = 1;
foreach ($clients as $client) {
    $site = $override->get('sites', 'id', $client['site_id'])[0];
    $sex = $override->get('sex', 'id', $client['sex'])[0];
    if ($client['eligible'] == 1) {
            if ($screening['consented'] == 1) {
                $consent = 'Called';
            } elseif ($screening['consented'] == 2) {
                $consent = 'No';
            } else {
                $consent = 'Not Called';
            }

            $output .= '
            <tr>
                <td colspan="1">' . $x . '</td>
                <td colspan="2">' . $client['date_registered'] . '</td>
                <td colspan="2">' . $client['study_id'] . '</td>
                <td colspan="2">' . $client['age'] . '</td>
                <td colspan="2">' . $sex['name'] . '</td>
                <td colspan="2">' . $client['firstname'] . ' ' . $client['middlename'] . ' ' . $client['lastname'] . '</td>
                <td colspan="2">' . $client['patient_phone'] . '</td>
                <td colspan="2">' . $client['patient_phone2'] . '</td>
                <td colspan="2">' . $consent . '</td>
                <td colspan="2">' . $site['name'] . '</td>
            </tr>
            ';
        $x += 1;
    }
}

$output .= '
   
    </tr>
        </table>  
    ';

// $output = '<html><body><h1>Hello, dompdf!' . $row . '</h1></body></html>';
$pdf->loadHtml($output);

// SetPaper the HTML as PDF
$pdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$pdf->render();

// Output the generated PDF
$pdf->stream($file_name, array("Attachment" => false));
