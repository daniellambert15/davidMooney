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
            return $this->slide8();
            break;
        case 9:
            return $this->slide9();
            break;
        case 10:
            return $this->slide10();
            break;
        case 11:
            return $this->slide11();
            break;
        case 12:
            return $this->slide12();
            break;
        case 13:
            return $this->slide13();
            break;
        case 14:
            return $this->slide14();
            break;
        case 15:
            if(
              $this->hasSignedPage(1) &&
              $this->hasSignedPage(2) &&
              $this->hasSignedPage(3) &&
              $this->hasSignedPage(4) &&
              $this->hasSignedPage(5) &&
              $this->hasSignedPage(6) &&
              $this->hasSignedPage(7) &&
              $this->hasSignedPage(8) &&
              $this->hasSignedPage(9) &&
              $this->hasSignedPage(10) &&
              $this->hasSignedPage(11) &&
              $this->hasSignedPage(12) &&
              $this->hasSignedPage(13) &&
              $this->hasSignedPage(14)
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
    mail('fcacomplianceservices@gmail.com', "FCA introducer", $this->emailTemplate(), $headers);
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
      'content' => '<p>Welcome and thank you for watching and taking part in this training presentation.</p>
<p>We are very pleased to be working with you to provide loans to customers and by having access to a finance facility you should improve your level of sales, service and credibility..</p>

<p>Having access to a finance facility is a great way to increase average order values, reduce cancellations and generate more money by providing your customers with affordability, convenience, payment flexibility and peace of mind.</p>

<p>Within these pages we will familiarise you with certain areas of the finance industry and help you to understand your role and how important it is to treat customers fairly and ensure finance is promoted and sold correctly. Our aim in producing this training course is to break down key areas into easy to understand sections and to support your practices when working with us to ensure at all times you recognise and meet the FCA Requirements.</p>

<p>It is important that you complete all the sections to demonstrate that you have read and fully understood everything and if you have any questions or queries then please do not hesitate to ask.</p>

<p>The FCA is the Financial Conduct Authority and is the financial regulatory body in the United Kingdom that regulates financial firms providing services to consumers and maintains the integrity of the UK’s financial markets. It handles regulated credit activities and like most financial products and services, there are very strict rules when it comes to advertising, promoting and selling loans and credits. These come from the Consumer Credit Act and the FCA Handbook. </p>

<p>The role of the Financial Conduct Authority is to:</p>
<ul style="color: #f00">
    <li>Issue “permissions” to sell, broker or lend finance</li>
    <li>Regulate and monitor the practices of companies in order to ensure standards are met</li>
    <li>Monitor complaints through the Financial Ombudsman Service</li>
    <li>Protect customers against scams and unfair contracts</li>
    <li>Ensure customers are treated fairly</li>
    <li>Protect vulnerable customers</li>
</ul>

<p>Becoming authorised and regulated by the Financial Conduct Authority is a long and complicated process taking around 8 months to complete with many detailed questions asked during this time including checking the fitness and suitability of the directors and shareholders. </p>

<p>Not everyone is able or capable of obtaining FCA authorisation and so it is important when undertaking any finance arrangement that you understand the governance of the finance industry, in particular taking the principles, procedures and relevant processes seriously.</p>',
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
      'contentTitle' => 'What our partnership means:',
      'content' => '
      <p>Our partnership means that our firm are able to provide loans and credit agreements to customers through a panel of credit lenders and act under our FCA authorisation to sell them. Our firm is described as a credit broker and acts as a “go between” in order to facilitate the loan between the lender and the customer.</p>

      <p>In our partnership our firm is classed as “the Principal firm” and your organisation is classed as “an IAR”, or Introducer Appointed Representative”.</p>

      <p>Our firm’s values are that we act fairly, ethically and openly at all times and make sure the loans are promoted, advertised and sold appropriately and we act within the law. For example, it is important that the customer understands who is providing the loan and your relationship and association with our firm.</p>

      <p>Every customer should fully understand their obligations and legal rights, and not be misled in any way or felt under pressure to take out a loan or make a decision to borrow quickly</p>

      <p style="color: #f00">It is important that you understand and accept that you provide a “pure client introduction” and do not maintain a client relationship in relation to regulated financial activities. You are only required to provide a simple introduction and so you are likely to pass on contact details to our firm.</p>

      <p>Our firm takes the regulatory responsibility for the IAR and must ensure it meets FCA requirements. </p>

      <p>Your firm is limited to effecting introductions and distributing financial promotions which relates to the financial products or services that we offer through our lenders.</p>

      <p>You must use customer data you collect and pass on appropriately.</p>

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
      'contentTitle' => 'Consumer Credit Act &amp; Consumer Credit Directive',
      'content' => '<p>These laws and regulations cover how companies selling customer credit must act, the information they provide, how they are categorised, and the protection the law gives to consumers.</p>

      <p>Customers must be provided with a verbal and written “adequate explanation” of the loan, which covers the general purpose of the loan, repayments, the customers legal right to withdraw from the agreement after they have signed it, and the consequences of not keeping up repayments.</p>

      <p>The “Your Loan Explained” section of a credit agreement document helps to provide an adequate explanation to the customer which is supplied by the lender and not something you would be involved with.</p>

      <p>Customers have a legal right to withdraw, without giving reasons, from their loan agreement. They have a mandatory 14 days cooling off period to do this, starting from the day after the loan agreement is signed by the lender or when it has been confirmed in writing, if this is later.</p>

      <p>Unless otherwise set out in the contract, a customer withdrawing from the loan agreement does not cancel the purchase they have made from you. The customer will need to make separate arrangements, if any, to make payment or return the goods and services provided.</p>',
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
      'contentTitle' => 'Customer’s right to make a claim for faulty or unsatisfactory goods and services',
      'content' => '
      <p>This is called “a claim under section 75 of the Consumer Credit Act”.</p>

      <p>If a customer believes goods and services bought using a loan are faulty or unsatisfactory (sometimes referred to as “not of merchantable quality”), they can make a claim against the company that provided the loan.</p>

      <h2>Customer’s right to make a claim if finance has been mis-sold.</h2>

      <p>This is called “a claim under section 56 of the Consumer Credit Act”.</p>

      <p>If a customer believes they have been disadvantaged financially because they were not given the full facts, or were given misleading facts about the loan they took out, they can make a claim against the company that provided the loan.</p>',

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
      'contentTitle' => 'Treating Customers Fairly otherwise known as TCF',
      'content' => '
      <p>We are committed to meeting customer expectations of performance, quality, price and delivery in all that we do. Treating Customers Fairly must now remain central to your conduct, and even though you are simply introducing the customer to ourselves you must put the well-being of your customers at the heart of how you deal with them.</p>

<p>TCF has six key customer outcomes that you need to demonstrate that you have delivered and we require you to achieve:</p>

      <p style="color: red;"><strong>Outcome 1 </strong>- CULTURE<br />Consumers must be confident that they are dealing with a firm or individual where the fair treatment of customers is central to the corporate culture.</p>

      <p style="color: red;"><strong>Outcome 2 </strong>- MARKETING<br />Products and services marketed and sold must be designed to meet the needs of identified consumer groups and targeted accordingly.</p>

      <p style="color: red;"><strong>Outcome 3 </strong>- INFORMATION<br />Consumers must be provided with clear information and kept appropriately informed, before, during and after the point of sale.</p>

      <p style="color: red;"><strong>Outcome 4 </strong>- ADVICE<br />Where consumers receive advice, the advice must be suitable and takes account of their circumstances. (In this instance you will not be providing financial advice).</p>

      <p style="color: red;"><strong>Outcome 5 </strong>- PRODUCT<br />Consumers must be provided with products that perform as they have been led to expect, and the associated service is of an acceptable standard.</p>

      <p style="color: red;"><strong>Outcome 6 </strong>- BARRIERS<br />Consumers must not face unreasonable post-sale barriers to change products, switch providers, submit claims or make a complaint.</p>

      <p>These six outcomes serve as the basis for treating customers fairly.</p>',
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
      'contentTitle' => 'Vulnerable Customers',
      'content' => '
      <p>Although you will not be selling finance it is likely when visiting customers that along the way you meet a vulnerable customer. We need to make sure that you can recognise the signs and signals at the beginning and then have a process to deal with the circumstances of the individuals.</p>

<p>Firstly, let’s identify what we mean by a vulnerable customer?</p>

<p>These may be people affected by Dementia. In the UK for example 800,000 people live with dementia and this is expected to double in the next 40 years.</p>

<p>It could perhaps be somebody who has suffered a bereavement who isn’t really in the right state of mind, particularly when it comes down to making decisions.</p>

<p>It could even be people perhaps preparing parents to go into a care home and having to pay the fees associated with that.</p>

<p>It comes down to us leading the way in which vulnerable people are dealt with.</p>

      <h2>Other people may be affected by the following:</h2>

      <div class="row">
        <div class="col-xs-6" style="color: red;">Mental Health Issues <br /><br />
        Serious or Chronic Illness<br /><br />
        Non English Speakers<br /><br />
        Recently Bereaved<br /><br />
        Bi-Polar	<br /><br />
        Post-Traumatic Stress Disorder</div>
        <div class="col-xs-6" style="color: red;"><br /><br />
        Experiencing Serious Stressful Events<br /><br />
        Deaf/Blind<br /><br />
        Age awareness<br /><br />
        Under the influence of drink or drugs<br /><br />
        </div>
      </div>

      <h2>Characteristics to look out for may include the following:</h2>

      <p style="color: red;">
      The customer may repeat themselves <br /><br />
      Say “YES” before you have explained everything<br /><br />
      Ask unrelated questions<br /><br />
      Seem distracted or wander off the topic<br /><br />
      They tell you they have a history of mental and health issues<br /><br />
      May seem agitated or confused about you being there<br /><br />
      Appear not to understand everything even when you have explained something a couple of times
      </p>


      ',
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
      'contentTitle' => 'What to do under any of these circumstances?',
      'content' => '
      <p>There are actions that you should consider, and although not an exhaustive list, sometimes common sense needs to be applied. For example:</p>
      <p style="color: red;">Ask the customer to invite a friend or family member to be there</p>
      <p style="color: red;">Leave the appointment</p>
      <p style="color: red;">Re-appoint when they have a friend or family member to sit with them</p>
      <p style="color: red;">Document the response of the customer and why you consider they may be vulnerable</p>
      <p style="color: red;">Ask the customer to repeat back to you their understanding of the sale and product</p>
      <p style="color: red;">Don’t rush, speak clearly always remain professional</p>
      <p style="color: red;">Please advise your line manager</p>

      <p>Remember it could be your relative or a close friend and so treat the customer with respect and don’t always just go for the sale. </p>

      <p>By the way, you should not assume that a person who is vulnerable or who has a mental capacity issue cannot make an informed decision as this could be seen as discrimination.</p>',

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

  public function slide8()
  {
    $array = array(
      'contentTitle' => 'Your Role and Responsibilities:',
      'content' => '
      <ul style="color: red;">
        <li>Provide clear, concise and truthful information</li>
        <li>Identify the person and the firm at the outset and make clear the purpose of the communication</li>
        <li>Clearly state the service you offer and the relationship with our firm and the lender – you are an introducer and just simply introducing our firm to the customer as a finance provider if the customer expresses an interest in a finance option</li>
        <li>Take responsibility for your own knowledge</li>
        <li>Follow all relevant processes and policies</li>
        <li>Be aware that you are responsible for what <em>you</em> say and do</li>
        <li>Any discussion or explanation of finance MUST NOT take place – that is our responsibility</li>
        <li>Take appropriate action if you consider the customer to be “vulnerable”</li>
        <li><em>Before leaving your customer ensure they fully understand everything</em></li>
      </ul>
      <p>As part of our obligations monitoring calls will be made to your customers in order to check that the sales process is being carried out correctly.</p>',
      'buttonNextText' => 'Next',
      'urlNext' => '9',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '7',
      'formId' => '8',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide9()
  {
    $array = array(
      'contentTitle' => 'Visiting Consumers in their Home',
      'content' => '
      <p>If your activities involve visiting a consumer in their home, then the FCA expects all of us to have tight controls and systems in place.</p>
      <p>For example:-</p>
      <ul style="color: red;">
        <li>You must obtain consent for the visit from the consumer;</li>
        <li>For the consent to be given, the information to the customer must have been given in a clear, concise and fair way by the sales person;</li>
        <li>You need to identify the person and the firm at the outset and make clear the purpose of the communication;</li>
        <li>Ensure an appropriate time of day for the visit;</li>
        <li>State the services the firm is authorised to offer;</li>
        <li>State any relationship which is relevant to the services offered. In other words, make it clear you are acting as an introducer only for finance and that’s where your association with finance ends.</li>
      </ul>
      <p>Staff visiting consumers in their home will also need to undergo a Disclosure and Barring Service (DBS) check to prevent unsuitable people from working with vulnerable groups. </p>',
      'buttonNextText' => 'Next',
      'urlNext' => '10',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '8',
      'formId' => '9',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide10()
  {
    $array = array(
      'contentTitle' => 'Getting your adverts and promotions approved',
      'content' => '
      <p>If you are planning on undertaking any advertising or promotional activity that mentions finance in any way then you must inform us in advance and obtain written approval to ensure that you fully comply with the Financial Promotions Rules and Regulations around the advertising of loans and credit. This includes your website and any internal as well as external materials.</p>

      <p>We are here to help and assist you to ensure you remain compliant throughout and avoid any fines and prosecutions and remember:</p>

      <ul style="color: red;">
        <li>All adverts must be clear, fair and not misleading and be in plain and easy to understand language;</li>
        <li>As an advertiser, you must be able to substantiate any claims you make;</li>
        <li>Advertising and marketing communications must be legal, decent, honest, truthful, responsible, and must not mislead or offend.</li>
      </ul>',
      'buttonNextText' => 'Next',
      'urlNext' => '11',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '9',
      'formId' => '10',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide11()
  {
    $array = array(
      'contentTitle' => 'Data Protection',
      'content' => '
      <p>The Data Protection Act defines UK law on the processing of personal data. Personal data is any data you collect that can identify a living individual.</p>
      <p>If you introduce a customer to us in order for them to apply for a loan you could be perceived as collecting and storing their personal data on the lender’s behalf as some of this data is used to make a decision about their creditworthiness and to administer their loan.</p>
      <p>You have a legal obligation to protect your customer’s personal information and we strongly recommend that you register with ICO which stands for the Information Commissioners Office and deals with issues about data protection. <a href="http://www.ico.org.uk" target="_blank">www.ico.org.uk.</a></p>
      <p>Before commencing the sale of finance please ensure you are covered and protected and read and understand the Data Protection Act and the 8 principles.</p>',
      'buttonNextText' => 'Next',
      'urlNext' => '12',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '10',
      'formId' => '11',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide12()
  {
    $array = array(
      'contentTitle' => 'Anti-Money Laundering or AML',
      'content' => '
      <p>Money laundering means exchanging money or assets that were obtained criminally for money or other assets that are “clean”. The clean money or assets don’t have an obvious link with any criminal activity. Money laundering also includes money that’s used to fund terrorism, however it’s obtained.</p>
      <p>The Proceeds of Crime Act contains the principal money laundering legislation in the UK and deals with a wide range of matters relevant to UK law on proceeds of crime issues.</p>
      <p>You must be aware of AML and put in place certain control measures in order to prevent you or your business being used for money laundering which includes nominating a person to inform us if you know or suspect that another person is laundering money or financing terrorism. You don’t need any proof or evidence just a reasonable suspicion.</p>',
      'buttonNextText' => 'Next',
      'urlNext' => '13',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '11',
      'formId' => '12',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide13()
  {
    $array = array(
      'contentTitle' => 'Complaints',
      'content' => '
      <p>A complaint is an indication of dissatisfaction and can be made by a customer in writing or verbally.</p>
      <p>There are strict regulatory rules and requirements around how complaints about financial products and services are handled and we publish our complaints handling procedure on our website and have to report to the FCA any complaints that we receive.</p>
      <p>If you receive a complaint, which also relates to finance, then you must pass it to us within the same business day that you receive it and complete any actions that we give you to solve a complaint in the timescale agreed at the time.</p>
      <p>We must make reasonable efforts to settle the complaint or dispute about the product or service.</p>
      <p>The Financial Ombudsman Service can become involved to settle a complaint if a customer is not satisfied with the response from a financial provider about their products and services, but we should be given the opportunity to settle it before they become involved.</p>',
      'buttonNextText' => 'Next',
      'urlNext' => '14',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '12',
      'formId' => '13',
      'question' => 'If you have read the above document, please type "yes" into the box below and then click next',
      'answer' => array('yes', 'Yes', 'YEs', 'YES', 'yES', 'yeS', 'YeS', 'yEs')
    );
    return $array;
  }

  public function slide14()
  {
    $array = array(
      'contentTitle' => 'Summary',
      'content' => '
      <p>Many thanks for taking the time to watch this training presentation, which we hope has helped to educate you some more on finance products and given you a background to the financial industry as a whole.</p>
      <p>With your customers access to this finance facility you could be winning more quotes and expanding your sales.</p>
      <p>Remember we are also on hand to provide you with further help, guidance and advice to meet requirements.
</p>
      <p><strong>If you have any other questions or need any other support. please call David Mooney on 07887 552 442 or email <a href="mailto:fcacomplianceservices@gmail.com">fcacomplianceservices@gmail.com</a></strong></p>
      <p><strong>In any case, we shall be in touch to establish any other support.</strong></p>',
      'buttonNextText' => 'Next',
      'urlNext' => '15',
      'buttonPreviousText' => 'Previous',
      'urlPrevious' => '13',
      'formId' => '14',
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
      'urlPrevious' => '14',
      'formId' => '15',
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
  			Untitled Document
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
  												<h1>FCA Introducer</h1>
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
