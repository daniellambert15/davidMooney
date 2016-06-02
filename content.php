<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Gas &amp; Electrical Safety Certificates and Services</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="DESCRIPTION" content="We are a gas and electrical safety inspection company, providing a wide range of services and products for the rental sector, homeowners and businesses." />
    <meta name="KEYWORDS" content="Gas-Elec group offer gas and electrical safety checks, inspections and tests to current UK rules and regulations with franchise opportunities across the UK." />
    <meta name="DC.Language" content="English" />
    <meta name="ROBOTS" content="ALL,NOODP" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="AUTHOR" content="Gas Elec Safety Systems Ltd" />
    <meta name="COPYRIGHT" content="Gas Elec Safety Systems Ltd" />
    <meta name="google-site-verification" content="vsA9JRv7HzV6s7uDffcOcEQciMm5cqdtMmI3Bsq4lFs" />
    <meta name="verify-v1" content="DPkGY73ZeMpfuHTs+4H3lpW96No6vUToGmaGC43SeVU=" />
    <meta name="msvalidate.01" content="C51CB65A167185D08350FFE4B85AA357" />
    <link rel="image_src" href="http://www.gas-elec.co.uk/image/logo.jpg"/>
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="http://www.gas-elec.co.uk/CSS/Custom.css" rel="stylesheet">
    <link href="CSS/custom.css" rel="stylesheet">
        <!-- jQuery is used only for this example; it isn't required to use Stripe -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <script>

    		function answer() {

    			var answer = document.getElementById("answer").value;
    			var page = '<?php echo $pId ?>';
          //var answerHidden = document.getElementById("answerHidden").innerHTML;

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
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="padding: 0px 10px 0px 0px;" href="http://www.gas-elec.co.uk/">
                        <img src="http://www.gas-elec.co.uk/images/logo.png" alt="Gas, Electrical Safety Certificates, inspections and Services" />
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
      <div class="container whiteBG">
        <div class="col-xs-12">
          <div class="container">
            <div class="blog-header">
              <h1 class="blog-title">gas-<em>elec</em>'s Home Project Finance</h1>
            </div>

            <div class="row">

              <div class="col-xs-10 blog-main">

                <div class="blog-post">
                  <?php
                  if(isset($page['contentTitle'])){ ?>
                    <h2>
                    <?php
                    echo $page['contentTitle'];
                  ?></h2><?php } ?>
                  <?php
                  if(isset($page['content'])){
                    echo $page['content'];
                  } ?>

                  <?php
                  if(isset($page['formId']) && $page['formId'] < 15){ ?>
                      <div class="alert alert-danger" role="alert">Have you read and fully understood this section? Click the "Accept Page" button and then fill out the short question. If you would need extra information please contact us: 01895 420 777</div>
                    <div class="form-group">
                        <button type="submit" onclick="acceptPage()" class="btn btn-success col-xs-12 ">Accept Page</button>
                    </div>

                    <div class="form-group" id="shortQuestion" style="display:none">
                      <label for="postEmailAddress">Short question</label>
                      <p>
                      <?php
                      if(isset($page['question'])){
                        echo $page['question'];
                      } ?></p>

                      
                      <input type="text" onkeyup="answer(this.value)" class="form-control" id="answer" name="answer" placeholder="Answer">
                    </div>
                    <span id="output" style="display:none"></span>
                  <?php } ?>

                  <?php
                  if(isset($page['formId']) && $page['formId'] == 15){ ?>
                  <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=submitForm">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                      <label for="contactNumber">Contact Number</label>
                      <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Contact Number">
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Continue</button>
                  </form>
                  <?php } ?>

                </div><!-- /.blog-post -->
                <nav>
                  <ul class="pager">
                    <?php if(isset($page['urlPrevious']) && $pId != 1){ ?>
                      <li><a href="?id=<?php echo $page['urlPrevious']; ?>"><?php echo $page['buttonPreviousText']; ?></a></li>

                      <?php } ?>
                      <?php if(isset($page['urlNext'])){ ?>
                        <li id="buttonNext" style="display:none;"><a href="?id=<?php echo $page['urlNext']; ?>"><?php echo $page['buttonNextText']; ?></a></li><?php } ?>

                        <?php if(isset($page['urlNext']) && $introducer->hasSignedPage($pId)){ ?>
                        <li id="buttonNextCompleted"><a href="?id=<?php echo $page['urlNext']; ?>"><?php echo $page['buttonNextText']; ?></a></li><?php } ?>

                      </ul>
                    </nav>

                  </div><!-- /.blog-main -->

                  <div class="col-xs-2 blog-sidebar">
                    <div class="sidebar-module">
                      <h4>Completed Sections</h4>
                      <ol class="list-unstyled">
                        <?php for($i = 1; $i <= 14; $i++){ ?>
                        <?php if($introducer->hasSignedPage($i)){ ?>
                          <li><a href="?id=<?php echo $i ?>">Section <?php echo $i ?></a></li>
                        <?php } } ?>
                      </ol>
                    </div>
                  </div><!-- /.blog-sidebar -->

                  <div class="col-xs-2 blog-sidebar">
                    <div class="sidebar-module">
                      <h4>Not Completed Sections</h4>
                      <ol class="list-unstyled">
                        <?php for($i = 1; $i <= 14; $i++){ ?>
                        <?php if($introducer->hasNotSignedPage($i)){ ?>
                          <li><a href="?id=<?php echo $i ?>">Section <?php echo $i ?></a></li>
                        <?php } } ?>
                      </ol>
                    </div>
                  </div><!-- /.blog-sidebar -->

                </div><!-- /.row -->

              </div><!-- /.container -->

              <!-- Bootstrap core JavaScript
              ================================================== -->
              <!-- Placed at the end of the document so the pages load faster -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
          </div>
      </div>
    </div>

    <div class="row">
      <div class="container striketrhough whiteBG">
                <p class="seperator"></p>
            </div>
        </div>




        <div class="row">
          <div class="container whiteBG">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="col-xs-2">
                        <img height="100" class="center-block" src="http://www.gas-elec.co.uk/images/GD_Provider-withID.jpg" alt="Our Green Deal Acreditacion number." />
                    </div>
                    <?php if($pId == 1 OR $pId == 14 OR $pId == 15){ ?>
                    <div class="col-xs-2">
                        <img height="50" class="center-block" src="http://www.gas-elec.co.uk/image/ConsumerCreditLicense.jpg" alt="Logo of the Consumer Credit Licence" />
                    </div>

                    <div class="col-xs-2">
                        <img height="50" class="center-block" src="http://www.gas-elec.co.uk/image/ICO.jpg" alt="Logo of the Information Commissioner's Office" />
                    </div>
                    <?php } ?>
                    <div class="col-xs-2">
                        <img height="100" class="center-block" src="http://www.gas-elec.co.uk/images/Green-Deal-Logo-RGB-200px-height.jpg" alt="Logo of our green deal installer number" />
                    </div>
                    <div class="col-xs-2">
                        <img height="100" class="center-block" src="http://www.gas-elec.co.uk/image/HPFLogo.jpg" alt="Logo of our green deal installer number" />
                    </div>
                    <div class="col-xs-2">
                        <img height="100" class="center-block" src="http://www.gas-elec.co.uk/images/logo_established.png" alt="Logo of 20 years" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-right">
                    <strong>Gas Elec Safety Systems Limited</strong><br />
                    The Old Bakery, 14b The Green,<br /> West Drayton, UB7 7PJ<br /> <strong>Tel:</strong> +44 (0)1895 420 777 |<br />
                    <strong>Fax:</strong> +44 (0)1895 420 776<br />
                    <strong>Company Reg:</strong> 3403927<br />
                    <strong>Company Vat:</strong> 707562433
                </div>
            </div>
        </div>


        <div class="row">
          <div class="container whiteBG">
                <p>&copy; Copyright 2015 gas-<em>elec</em> group. All rights reserved<!-- br />
                Gas Safe Nbr. 171224</p -->
            </div>
        </div>


        <div class="row">
          <div class="container whiteBG">
                <p>
                    <a href="http://www.gas-elec.co.uk/Terms-and-Conditions.html">Terms and Conditions / Refund Policy</a> - <a href="http://www.gas-elec.co.uk/Privacy-policy.html">Privacy policy</a> - <a href="http://www.gas-elec.co.uk/Complaints.html">Complaints policy</a>
                </p>
            </div>
        </div>
    </body>
</html>
