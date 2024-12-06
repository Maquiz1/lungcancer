<?php

require_once 'pdf.php';
$user = new User();
$override = new OverideData();
$email = new Email();
$random = new Random();

if ($user->isLoggedIn()) {
    try {
        $user_data = $override->getNews('user','status',1,'accessLevel',3);
        $Total = $override->getCount('clients', 'status', 1);
        $data_enrolled = $override->getCount1('clients', 'status', 1, 'enrolled', 1);
        $successMessage = 'Report Successful Created';
    } catch (Exception $e) {
        die($e->getMessage());
    }
} else {
    Redirect::to('index.php');
}


$title = 'LUNGCANCER SUMMARY REPORT PER PERSON_' . date('Y-m-d');

$pdf = new Pdf();
$file_name = $title . '.pdf';

$output = ' ';

if ($user_data) {

    $output .= '
            <table width="100%" border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <td colspan="18" align="center" style="font-size: 18px">
                        <b>DATE  ' . date('Y-m-d') . '</b>
                    </td>
                </tr>

                <tr>
                    <td colspan="18" align="center" style="font-size: 18px">
                        <b>' . $title . '</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="18" align="center" style="font-size: 18px">
                        <b>Total Registered ( ' . $Total . ' ):  Total Enrolled( ' . $data_enrolled . ' )</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="18">                        
                        <br />
                        <table width="100%" border="1" cellpadding="5" cellspacing="0">
                            <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">NAME</th>
                                <th rowspan="2">RECRUITED</th>
                                <th rowspan="2">SCREENED.</th>
                                <th rowspan="2">ELIGIBLE</th>
                                <th rowspan="2">ENROLLED</th>
                                <th colspan="4"> TYPE</th>
                                <th rowspan="2">END</th>
                            </tr>
                            <tr>
                                <th>4A</th>
                                <th>4B</th>
                                <th>4C </th>
                                <th>OTHER </th>
                            </tr>
            ';

    // Load HTML content into dompdf
    $x = 1;
    foreach ($site_data as $row) {
        $registered = $override->countData('clients', 'status', 1, 'id', $row['id']);
        $registered_Total = $override->getCount('clients', 'status', 1);
        $screened = $override->countData2('clients', 'status', 1, 'screened', 1, 'id', $row['id']);
        $screened_Total = $override->countData('clients', 'status', 1, 'screened', 1);
        $eligible = $override->countData2('clients', 'status', 1, 'eligible', 1, 'id', $row['id']);
        $eligible_Total = $override->countData('clients', 'status', 1, 'eligible', 1);
        $enrolled = $override->countData2('clients', 'status', 1, 'enrolled', 1, 'id', $row['id']);
        $enrolled_Total = $override->countData('clients', 'status', 1, 'enrolled', 1);
        $end_study = $override->countData2('clients', 'status', 1, 'end_study', 1, 'id', $row['id']);
        $end_study_Total = $override->countData('clients', 'status', 1, 'end_study', 1);

        $output .= '
                <tr>
                    <td>' . $x . '</td>
                    <td>' . $row['firstname'] .' - '. $row['lastname'] . '</td>
                    <td>' . $registered . '</td>
                    <td align="right">' . $screened . '</td>
                    <td align="right">' . $eligible . '</td>
                    <td align="right">' . $enrolled . '</td>
                    <td align="right">' . $breast_cancer . '</td>
                    <td align="right">' . $brain_cancer . '</td>
                    <td align="right">' . $cervical_cancer . '</td>
                    <td align="right">' . $prostate_cancer . '</td>
                    <td align="right">' . $end_study . '</td>
                </tr>
            ';
        $x += 1;
    }

    $output .= '
                <tr>
                    <td align="right" colspan="2"><b>Total</b></td>
                    <td align="right"><b>' . $registered_Total . '</b></td>
                    <td align="right"><b>' . $screened_Total . '</b></td>
                    <td align="right"><b>' . $eligible_Total . '</b></td>
                    <td align="right"><b>' . $enrolled_Total . '</b></td>
                    <td align="right"><b>' . $breast_cancer_Total . '</b></td>
                    <td align="right"><b>' . $brain_cancer_Total . '</b></td>
                    <td align="right"><b>' . $cervical_cancer_Total . '</b></td>
                    <td align="right"><b>' . $prostate_cancer_Total . '</b></td>
                    <td align="right"><b>' . $end_study_Total . '</b></td>
                </tr>  

    ';

    $output .= '
            </table>    
               
        </table>    
';
}

// $output = '<html><body><h1>Hello, dompdf!' . $row . '</h1></body></html>';
$pdf->loadHtml($output);

// SetPaper the HTML as PDF
// $pdf->setPaper('A4', 'portrait');
$pdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$pdf->render();

// Output the generated PDF
$pdf->stream($file_name, array("Attachment" => false));
