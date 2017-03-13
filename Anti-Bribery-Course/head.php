<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FCA Compliance Services</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="DC.Language" content="English" />
    <meta name="ROBOTS" content="ALL,NOODP" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="CSS/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <?php
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    ?>

    <?php if($_SERVER['PHP_SELF'] == "/FCACompliance/index.php" && $id < 1 ){ ?>
        <style>
            body{
                background: url("../images/shutterstock_149841719_small.jpg");
                background-repeat: no-repeat;;
            }
        </style>
    <?php } ?>

    <script>

        function answer() {

            var answer = document.getElementById("answer").value;
            var page = '<?php echo $pId ?>';

            var answerHidden = [<?php foreach($page['answer'] as $hiddenAnswer) {
                echo '"'.$hiddenAnswer.'",';
            } ?>];

            var email = '<?php echo $_SESSION['email']; ?>';

            //if (answer == answerHidden)
            if(answerHidden.indexOf(answer) >= 0)
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "index.php?checkEmail=true&ajax=true&email=" + email + "&page=" + page, true);
                xmlhttp.send();

                document.getElementById("buttonNext").style.display = 'inline';
                document.getElementById("buttonNextCompleted").style.display = 'none';
            }else{
                document.getElementById("buttonNext").style.display = 'none';
            }
        }

        function acceptPage()
        {
            document.getElementById("shortQuestion").style.display = 'inline';
        }

        function checkDiv()
        {
            var divOutput = document.getElementById("output").innerHTML;
            var email = '<?php echo $_SESSION["email"]; ?>';

            if (divOutput == email)
            {
                document.getElementById("buttonNext").style.display = 'inline';
                document.getElementById("buttonNextCompleted").style.display = 'none';
            }else{
                document.getElementById("buttonNext").style.display = 'none';
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="col-xs-12">
        <div class="blog-header">
            <h1 class="blog-title">Anti-Bribery Course</h1>
        </div>
    </div>
