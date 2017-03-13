<?php

class email
{

    // setup the variables we're going to use
    protected $questions;
    public $customer;
    public $from;
    public $to;
    public $title;
    public $emailTemplate;



    public function __construct($name, $email, $contactNumber, $address, $company)
    {
        // setup the from, so we can say $from['name'];

        $this->customer = array(
            'name' => $name,
            'email' => $email,
            'contactNumber' => $contactNumber,
            'address' => $address,
            'company' => $company
        );
    }

    public function email(){
        $headers  	= 	'MIME-Version: 1.0' . "\n";
        $headers 	.= 	"Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers 	.= 	"From: ".$this->from." <".$this->from.">"."\r\n";
        $headers 	.=	"Reply-To: ".$this->from." <".$this->from.">" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail('daniel.lambert15@gmail.com', $this->title, $this->emailTemplate, $headers);

        if (mail($this->to, $this->title, $this->emailTemplate, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    public function template($content){

        $template = '<h2>'.$this->title.'</h2>
        <p>Here are the answers from '.$this->customer['name'].'</p>';

        $template .= '<p>Contact details:</p>
        <ul>
            <li>Name: '.$this->customer['name'].'</li>
            <li>Email: '.$this->customer['email'].'</li>
            <li>Contact Number: '.$this->customer['contactNumber'].'</li>
            <li>Address: '.$this->customer['address'].'</li>
            <li>Company: '.$this->customer['company'].'</li>
        </ul>';

        $template .= $content;

        return $template;
    }

    public function buildTheEmail($content){
        $this->emailTemplate = $this->template($content);
    }

}
