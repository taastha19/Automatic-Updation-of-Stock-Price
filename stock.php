<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Stock price</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      </head>
      <body>
        
    <?php
    $serverName = "127.0.0.1";
    $userName = "root";
    $password = "";
    $dbname = "NHPC_STOCK";

    // Create connection
    $conn = mysqli_connect($serverName, $userName, $password, $dbname);

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect!";
        exit();
    }
    // echo "Connection success!";
    // $nse_price = $_POST['nse_price'];
    // $nse_dateTime = $_POST['nse_dateTime'];
    // $bse_price = $_POST['bse_price'];
    // $bse_dateTime = $_POST['bse_dateTime'];

    echo "Connection success!";
    $nse_price = $_POST['nse_price'];
    $nse_dateTime = $_POST['nse_dateTime'];
    $bse_price = $_POST['bse_price'];
    $bse_dateTime = $_POST['bse_dateTime'];

    // Update the database
    $sql = "UPDATE NHPC_STOCK SET NSE_StockPrice = '$nse_price', NSE_DateTime = '$nse_dateTime', BSE_StockPrice = '$bse_price', BSE_DateTime = '$bse_dateTime'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>

  </body>   