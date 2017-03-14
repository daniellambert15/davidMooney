<?php

/*
    What this class is for is to create the content on the FCA introducer
    section of the gas-elec site.

    We want to email a list of people tho visit this page and then read and sign
    that they've read each section before being allowed to go to the next step.

    At this point in time i do not think we need to intergrate it with a database
    as i think we dont need to save where they are in the journey.
*/


class fcaIntroducer{

  public $email;
  public $signedPages;

  function __construct() {
    if(isset($_SESSION['signedPages'])){
      $this->signedPages = $_SESSION['signedPages'];
    }
  }

  public function setEmail($email)
  {
    $this->email = $email;
    $_SESSION['email'] = $email;
  }

  public function content($id)
  {
      switch ($id) {
        case 'email':
            return $this->email();
            break;
        case 1:
            return $this->slide1();
            break;
        case 2:
            return $this->slide2();
            break;
        case 3:
            return $this->slide3();
            break;
        case 4:
            return $this->slide4();
            break;
        case 5:
            return $this->slide5();
            break;
        case 6:
            return $this->slide6();
            break;
        case 7:
            return $this->slide7();
            break;
        case 8:
            if(
              $this->hasSignedPage(1) &&
              $this->hasSignedPage(2) &&
              $this->hasSignedPage(3) &&
              $this->hasSignedPage(4) &&
              $this->hasSignedPage(5) &&
              $this->hasSignedPage(6) &&
              $this->hasSignedPage(7)
              )
            {
              return $this->end();
            }else{
              return $this->slide1();
            }
            break;
        }
  }

  public function sendMail()
  {
    $headers  	= 	'MIME-Version: 1.0' . "\n";
  	$headers 	.= 	'Content-type: text/html; charset=iso-8859-1' . "\n";
  	$headers 	.= 	'From: David Mooney <fcacomplianceservices@gmail.com>'. "\n";
  	$headers 	.=	'Reply-To: David Mooney <fcacomplianceservices@gmail.com>' . "\n" .
     					'X-Mailer: PHP/' . phpversion();
    mail('fcacomplianceservices@gmail.com', "Anti-Bribery", $this->emailTemplate(), $headers);
  }

  public function signedPage($pageId)
  {
    if(!$this->hasSignedPage($pageId)){
      $this->signedPages[] = $pageId;
      $_SESSION['signedPages'] = $this->signedPages;
    }
  }

  public function hasSignedPage($pageId)
  {
    if(!empty($this->signedPages)){
      if(in_array($pageId, $this->signedPages))
      {
        return true;
      }else{
        return false;
      }
    }
  }

  public function hasNotSignedPage($pageId)
  {
    if(!empty($this->signedPages)){
      if(!in_array($pageId, $this->signedPages))
      {
        return true;
      }else{
        return false;
      }
    }
  }

  public function email()
  {
      $array = array(
        'contentTitle' => 'Enter your email to start',
        'content' => '
        <form method="post" action="'.$_SERVER['PHP_SELF'].'?id=1">
          <div class="form-group">
            <label for="postEmailAddress">Email address</label>
            <input type="hidden" name="postEmail" value="y">
            <input type="email" class="form-control" id="postEmailAddress" name="postEmailAddress" placeholder="Email">
          </div>
          <button type="submit" class="btn btn-default">Start</button>
        </form>

        '
      );
      return $array;
  }

  public function slide1()
  {
    $array = array(
      'contentTitle' => 'Introduction',
      'content' => '<p>
		  Training is necessary for effective anti-corruption compliance. This learning programme looks at the UK Bribery Act, which has far-reaching powers that apply to all organisations. The penalties for committing a bribery offence can be very severe, so it&rsquo;s essential that you understand how to minimise the risks.
	  </p>
	  <p>
		  All firms are at risk under the Bribery Act as offences don&rsquo;t only arise when giant corporations compete to win overseas government contracts. Your firm has policies covering such mundane matters as business gifts, working lunches and corporate hospitality and you need to understand their relevance and importance.
	  </p>
	  <p>
		  It is important that The Financial Conduct Authority places a responsibility on all regulated firms to make sure that the firm cannot be used to further financial crime including bribery that is also subject to the Bribery Act 2010.
	  </p>
	  <p>
		  Your firm is committed to doing business ethically, with the highest standards of integrity, and expects its employees, self-employed &lsquo;advisers&rsquo; or &lsquo;consultants&rsquo; and business partners to work to these standards.
	  </p>
	  <p>
		  The good news is that many organisations will face little or no risk of bribery, especially if their business is undertaken primarily in the UK. A company that operates overseas tends to have a higher risk.
	  </p>
	  <p>
		  The Bribery Act is not concerned with fraud, theft, books and record offences, Companies Act offences, money laundering offences or competition law.
	  </p>',
      'buttonNextText' => 'Next',
      'urlNext' => '2',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '1',
      'formId' => '1',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide2()
  {
    $array = array(
      'contentTitle' => 'Anti-Bribery Principles:',
      'content' => '
	  <ol>
		  <li><strong>Proportionality</strong> – the action that you take should be proportionate to the size of your business and the risks that you face.</li>
		  <li><strong>Top Level Commitment</strong> – a top down approach and senior management involvement is a must.</li>
		  <li><strong>Risk Assessment</strong> – analyse the risks involved in your industry and try to mitigate them.</li>
		  <li><strong>Due Diligence</strong> – perform background and credit checks and know your customer.</li>
		  <li><strong>Communication</strong> – training, awareness and policy dissemination ensures staff involvement.</li>
		  <li><strong>Monitoring and Review</strong> – perform frequent gap analysis and process audits to ensure they are working, fit for purpose and effective.</li>
	  </ol>

      ',
      'buttonNextText' => 'Next',
      'urlNext' => '3',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '1',
      'formId' => '2',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide3()
  {
    $array = array(
      'contentTitle' => 'Bribery and Corruption – serious economic crimes',
      'content' => '<p>
		  Corruption is one of the biggest global issues of our time. It&rsquo;s estimated to increase  the cost of doing business worldwide by around 10&#37;. But it&rsquo;s not just business that bears the cost. Every bribe paid serves to perpetuate a web of corruption which keeps millions of the world&rsquo;s poorest and most vulnerable people trapped in poverty.
	  </p>
	  <p>
		  Governments are becoming increasingly aware of this fact and are taking tough action. You only need to consider the record &#36;490 million fine handed to GlaxoSmithKline to see how seriously this issue is being taken.
	  </p>
	  <p>
		  Unfortunately, it seems that in some countries nothing gets done without backhanders being paid in one form or another.
	  </p>',
      'buttonNextText' => 'Next',
      'urlNext' => '4',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '2',
      'formId' => '3',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide4()
  {
    $array = array(
      'contentTitle' => 'Bribery',
      'content' => '
	  <p>
		  The Bribery Act 2010, which came into force on 1st July 2011, sets out the circumstances in which individuals may commit an offence of bribery. Generally, these are:
	  </p>
	  <ul>
		  <li>Offering a bribe</li>
		  <li>Promising to pay a bribe</li>
		  <li>Giving a bribe</li>
		  <li>Asking for a bribe</li>
		  <li>Agreeing to receive a bribe</li>
		  <li>Receiving a bribe</li>
	  </ul>
	  <p>
		  In these cases a bribe is a payment (or other advantage) given to a person with the intention that they will act in an improper way. For example, to encourage someone to award a contract to one firm over another or to overlook matters such as poor credit history when giving advice.
	  </p>
	  <p>
		  It is also an offence to give, offer, promise, ask for, agree to receive or receive a payment as a reward for improper acts that have already happened. It doesn&rsquo;t even matter if the person who carried out the improper act understood that it was improper at the time.
	  </p>
	  <p>
		  Finally, it would also be an offence to act in an improper way if you thought you might receive anything, even if it hasn&rsquo;t been offered, and you haven&rsquo;t asked.
	  </p>
	  <p style="font-weight: bold;">
		  If you are offered any kind of gift or payment you must report this to Principal of your Firm. Any gift, payment or hospitality valued at over &pound;50 should be recorded in your Gift &amp; Hospitality Register (&pound;50 has been discussed and agreed by the firm and its advisers as being a reasonable maximum value to accept without being constituted as an influencing factor. If in individual circumstances you consider that a gift of lower value might not be proper then you should report this and seek further advice from your compliance officer).
	  </p>
	  <p>
		  Often such gifts may be intended innocently, for example, relationship building, corporate away days, or a thank you from a third party where you were genuinely doing your job. It is essential, however innocent you think they are, to follow this policy to make it clear that you accepted the gift or payment in good faith.
	  </p>
	  <p>
		  Please remember though that genuine hospitality or similar business expenditure that is reasonable is completely acceptable. It is only where the hospitality was really a cover for bribing someone, would the authorities look at such things as the level of hospitality offered, the way in which is was provided and the level of influence the person receiving it had on the business decision in question. But, as a general proposition, hospitality or promotional expenditure which is proportionate and reasonable given the sort of business you do is very unlikely to engage the Act. So, for example, you can continue to provide tickets to concerts or sporting events, take clients to dinner, offer gifts to clients as a reflection of your good relations, or pay for reasonable travel expenses in order to demonstrate your goods or services to clients if that is reasonable and proportionate for your business.
	  </p>',

      'buttonNextText' => 'Next',
      'urlNext' => '5',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '3',
      'formId' => '4',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide5()
  {
    $array = array(
      'contentTitle' => 'Reporting Bribery',
      'content' => '<p>
		  If you are offered a gift, hospitality, or any other kind of advantage that you think may be intended to influence you, or you suspect that another person may be engaged in any kind of bribery, you must report this immediately.
	  </p>
	  <p>
		  To report a suspicion of bribery please put together all the information that you have and send it to the person responsible within your firm.
	  </p>
	  <p>
		  If you are concerned about any repercussions of making a report then you should refer to the Whistleblowing Policy of the FCA for information on alternative methods of making a report.
	  </p>
	  <p>
		  All notifications made will be handled with strict confidentiality. However, please note that there may be circumstances in which your firm are required to reveal an individual&rsquo;s identity, for example where they are compelled to do so by law and therefore anonymity cannot be guaranteed.
	  </p>
	  <p>
		  All notifications relating to other employees within the Firm will be handled in line with the Public Interest Disclosure Act 1998.
	  </p>',
      'buttonNextText' => 'Next',
      'urlNext' => '6',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '4',
      'formId' => '5',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide6()
  {
    $array = array(
      'contentTitle' => 'Subsequent Investigation',
      'content' => '
	  <p>
		  Your firm is committed to supporting regulators and law enforcement officers in the prevention of bribery and other financial crime.
	  </p>
	  <p>
		  All employees are expected to cooperate fully with any investigations; however, employees must also recognise that laws and procedures may apply to the disclosure of information and should therefore contact your compliance officer before disclosing information about customers or employees when contacted directly by law enforcement officers.
	  </p>
	  <p>
		  Failure to notify an appropriate person about criminal actions of which you are aware, in breach of this policy, may be considered to be a contractual breach leading to disciplinary actions.
	  </p>
	  <p>
		  The Government has also produced detailed guidance about the Bribery Act and the procedures that organisations can put in place to prevent bribery, as well as a set of illustrative case studies which you may find of further assistance available at: <a href="www.justic.gov.uk/guidance/bribery.htm">www.justic.gov.uk/guidance/bribery.htm</a>
	  </p>',
      'buttonNextText' => 'Next',
      'urlNext' => '7',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '5',
      'formId' => '6',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }



  public function slide7()
  {
    $array = array(
      'contentTitle' => 'Summary',
      'content' => '
      <p><strong>If you have any other questions or need any other support. please call David Mooney on 07887 552 442 or email <a href="mailto:fcacomplianceservices@gmail.com">fcacomplianceservices@gmail.com</a></strong></p>
      <p><strong>In any case, we shall be in touch to establish any other support.</strong></p>',
      'buttonNextText' => 'Next',
      'urlNext' => '8',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '6',
      'formId' => '7',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function end()
  {
    $array = array(
      'contentTitle' => 'You have Completed',
      'content' => '<p>Thank you for completing our course. Please re type your email
      and click the continue button.</p>',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '7',
      'formId' => '8',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function emailTemplate()
  {
    $message = '<!DOCTYPE html>
  <html>
  	<head>
  		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  		<title>
  			Anti-Bribery
  		</title>
  		<style>
  				body{
  					background: #ccc;
  					padding: 0px;
  					margin: 0px;
  					border: 0px;
  					font-family: arial;
  				}
  		</style>
  	</head>
  	<body>
  		<table align="center" border="0" cellpadding="0" cellspacing="0" style="background: #fff;" width="710">
  			<tr>
  				<td>
  					<table align="center" border="0" cellpadding="0" cellspacing="0" style="background: #fff;" width="690">
  						<tr>
  							<td>
  								<table border="0" cellpadding="0" cellspacing="0" width="690">
  									<tr>
  										<td height="10">
  										</td>
  									</tr>
  									<tr>
  										<td align="left" style="padding-right: 5px" valign="top">
  											<!-- CONTENT IN HERE -->
  												<h1>Anti-Bribery</h1>
						                          <p>
						                            The introducer has signed all of the pages. They used this email to start the session with:
						                            '.$_SESSION['email'].'
						                          </p>
						                          <p>Here are their details</p>
						                          <ul>
						                          <li><strong>Name:</strong> '.$_POST['name'].'</li>
						                          <li><strong>Email:</strong> '.$_POST['email'].'</li>
						                          <li><strong>Contact Number:</strong> '.$_POST['contactNumber'].'</li>
						                          <li><strong>Address:</strong> '.$_POST['address'].'</li>
						                          </ul>
  											<!-- CONTENT END HERE -->
  										</td>
  									</tr>
  									<tr>
  										<td height="10">
  										</td>
  									</tr>
  								</table>
  							</td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  		</table>
  	</body>
  </html>';

  return $message;
  }

}

?>
