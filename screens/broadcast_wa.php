<?php
$resultMessage = "";
$resultDetail = "";
$resultId = "";
$resultProcess = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pesan = $_POST['pesan'];

    if ($_FILES['csvfile']['error'] == UPLOAD_ERR_OK) {
        $csvFilePath = $_FILES['csvfile']['tmp_name'];
        
        $targetList = array();

        if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $targetList[] = $data[0]; // Assuming the target numbers are in the first column
            }
            fclose($handle);
        }

        $targetString = implode(',', $targetList);

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.fonnte.com/send',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array(
            'target' => $targetString,
            'message' => $pesan,
            'countrycode=' => '62',
            'delay' => '2',
          ),
          CURLOPT_HTTPHEADER => array(
            "Authorization: iYim35wPw5cZcp9wDzjo"
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        if (isset($apiResponse['status']) && $apiResponse['status'] === true) {
          $resultMessage = "Pesan berhasil dikirim kepada " . count($apiResponse['target']) . " nomor.";
          $resultDetail = $apiResponse['detail'];
          $resultId = $apiResponse['id'][0];
          $resultProcess = $apiResponse['process'];
      }
    }
}
?>
