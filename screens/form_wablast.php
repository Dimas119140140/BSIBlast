<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Debitur by WA - Bank Syariah Indonesia</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #009688;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .navbar {
            background-color: #ffffff;
            width: 100%;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            width: 150px;
            height: auto;
            margin-left: 20px;
            margin-bottom: 10px;
        }

        .logo2 {
            width: 115px;
            height: auto;
            margin-right: 20px; /* Jarak dari tepi kanan */
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            margin-top: 150px;
        }

        .container h2 {
            margin-top: 0;
            font-size: 24px;
            color: #1a4780;
        }

        .form-group {                   
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="file"],
        textarea {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #1a4780;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #153761;
        }

        .powered-by {
            font-size: 12px;
            color: rgba(0, 0, 0, 0.5);
            text-align: center;
            margin-top: 10px;
        }

        .powered-by a {
            color: #1a4780;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="https://ir.bankbsi.co.id/bsi_assets/vendor2/images/logo.png" alt="Bank Syariah Indonesia" class="logo">
        <img src="https://www.bni.co.id/portals/1/BNI/Beranda/images/LOGO-AKHLAK-NOBG-v2.jpg" alt="AKHLAK" class="logo2">
    </div>
    <div class="container">
        <h2>SISTEM DEBITUR BSI</h2>
        <form action="broadcast_wa.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="csvfile">Unggah File CSV:</label>
                <input type="file" name="csvfile" id="csvfile" accept=".csv" required>
            </div>
            <div class="form-group">
                <label for="pesan">Pesan :</label>
                <textarea name="pesan" id="pesan" rows="4" required></textarea>
            </div>
            <button type="submit">Kirim</button>
        </form>
        <div class="result-container">
            <?php if (!empty($resultMessage)) { ?>
                <p class="result-message"><?php echo $resultMessage; ?></p>
                <?php if (!empty($resultDetail)) { ?>
                    <p class="result-detail">Detail: <?php echo $resultDetail; ?></p>
                <?php } ?>
                <?php if (!empty($resultId)) { ?>
                    <p class="result-id">ID Pesan: <?php echo $resultId; ?></p>
                <?php } ?>
                <?php if (!empty($resultProcess)) { ?>
                    <p class="result-process">Status Proses: <?php echo $resultProcess; ?></p>
                <?php } ?>
            <?php } ?>
        </div>
        <p class="powered-by">Powered by 
            <a href="https://www.instagram.com/muhmlna_/" target="_blank">muhmlna_</a>
            <a href="https://www.instagram.com/aqshal.d/" target="_blank">aqshal</a>
        </p>    
    </div>
</body>
</html>
