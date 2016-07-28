<?php
  session_start();

  include 'introducer.class.php';


  $introducer = new fcaIntroducer;


  if(isset($_REQUEST['ajax']))
  {

    if(isset($_REQUEST['email']) && isset($_REQUEST['checkEmail']))
    {

      // this will run everytime a user presses a key into the email form field.
      // we want to only run this query WHEN the user correctly types in their
      // correct email

      if($_REQUEST['email'] == $_SESSION['email'])
      {
        // now we know they've typed in the correct email. we want to add them to
        // the list of pages visited.

        $introducer->signedPage($_REQUEST['page']);
      }
      echo $_REQUEST['email'];
    }

    exit;
  }



  if(isset($_POST['postEmail']) && $_POST['postEmailAddress'] != "")
  {
    // set the email within the system.
    $introducer->setEmail($_POST['postEmailAddress']);
  }

  //  echo $_SESSION['email'];

  if(!isset($_SESSION['email']))
  {

    $page = $introducer->content('email');

  }elseif(isset($_GET['id']) && $_SESSION['email'] != "")
  {
    $page = $introducer->content($_GET['id']);
  }else{
    $page = $introducer->content(1);
  }

  if(isset($_GET['id'])){
    $pId = $_GET['id'];
  }else{
    $pId = 1;
  }

  if(isset($_REQUEST['action']) && isset($_SESSION['email']))
  {

    if($_REQUEST['name'] != "" && $_REQUEST['email'] != "" && $_REQUEST['contactNumber'] != "" && $_REQUEST['address'] != "")
    {
      include 'thankyou.php';
      $introducer->sendMail();
      session_destroy();
      exit;
    }else{
      header('Location: http://www.gas-elec.co.uk/HomeProjectFinance/index.php?id=15');
    }
  }

  include 'content.php';


?>
