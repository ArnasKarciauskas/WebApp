<?php
if (isset($_POST['submit'])) {
	  $name = $_POST['name'];
      $email = $_POST['email'];
	  $phone = $_POST['phone'];
      $textarea = $_POST['textarea'];
	  $promotional = $_POST['promotional'];
      
      
      // load previous XML from file
      $xml = simplexml_load_file("./xml/contact.xml") or die("ERROR: Cannot load contact.xml.");

      // add a new feedback node
      $feedback = $xml->addChild('enquiry');

      // add form data to XML
	  $feedback->addChild('name', $name);
      $feedback->addChild('email', $email);
	  $feedback->addChild('phone', $phone);
      $feedback->addChild('textarea', $textarea);
	  $feedback->addChild('promotional', $promotional);
      

      // save the whole modified XML
      $xml->asXml('./xml/contact.xml');
      
      // Display thank you
      header("Location: ../thankyou.html");
  
} else {
      // nothing happened --go back to feedback form
      header("Location: ../index.html");
}
?>