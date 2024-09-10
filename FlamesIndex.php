<?php
session_start();
$finalResult = "";
$colorClass = ""; 
if(isset($_SESSION['fresult'])){
     $finalResult = $_SESSION['fresult'];
     session_destroy();

     switch($finalResult){
        case "F":
            $finalResult = "Friend";
            $colorClass = "bg-success text-white text-center ";
            break;
        case "L":
             $finalResult = "Love";
             $colorClass = "bg-danger text-white text-center";

        case "A":
             $finalResult = "Affection";
             $colorClass = "bg-warning text-dark text-center"; 
             break;
        case "M":
            $finalResult = "Married";
            $colorClass = "bg-primary text-white text-center"; 
            break;
        case "E":
            $finalResult = "Enemy";
            $colorClass = "bg-dark text-white text-center"; 
            break;
        case "S":
            $finalResult = "Sister";
            $colorClass = "bg-info text-dark text-center"; 
            break;
     }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLAMES Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            /* background: linear-gradient(120deg, #c89ee0 0%, #00d4ff 80%); */
            background: linear-gradient(100deg, #fc466b 0%, #fc46e9 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 10px 15px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            font-size: 30px;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .result-box {
            padding: 20px;
            border-radius: 10px;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        input[type="text"] {
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            border: 2px solid #ddd;
            margin-bottom: 15px;
            font-size: 17px;
        }
        input[type="text"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
            outline: none;
        }
        input[type="submit"] {
            background: linear-gradient(90deg, #00c6ff 0%, #0072ff 90%);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
        }
        input[type="submit"]:hover {
            background: linear-gradient(90deg, #0072ff 0%, #00c6ff 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>FLAMES Result</h1>
        <form action="FlamesLogic.php" method="post">
            <input type="text" name="value1" id="value1" placeholder="Enter Value 1" class="form-control" required>
            <input type="text" name="value2" id="value2" placeholder="Enter Value 2" class="form-control" required>
            <div class="result-box <?php echo $colorClass; ?>">
                <?php echo $finalResult; ?>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function(){
        //     if($("#result").text().trim() !== "") {
        //         $("#result").fadeIn(6000).css("display", "inline-block");
        //     }
        // });
    </script>
</body>
</html>
