<?php
if (isset($_POST['submit'])) {
      $event = $_POST['event'];
      $date = $_POST['dateid'];
      $persons = $_POST['persons'];
      $seat = $_POST['seat'];
	  $fname = $_POST['fname'];
	  $lname = $_POST['lname'];
	  $bemail = $_POST['bemail'];
	          
      // load previous XML from file
      $xml = simplexml_load_file("./xml/booking.xml") or die("ERROR: Cannot load booking.xml");

      // add a new feedback node
      $feedback = $xml->addChild('booking');

      // add form data to XML
      $feedback->addChild('event', $event);
      $feedback->addChild('date', $date);
      $feedback->addChild('persons', $persons);
      $feedback->addChild('seat', $seat);
	  $feedback->addChild('fname', $fname);
	  $feedback->addChild('lname', $lname);
	  $feedback->addChild('bemail', $bemail);

      // save the whole modified XML
      $xml->asXml('./xml/booking.xml');
      
      // Display thank you
      header("Location: ../success.html");
  
} else {
      // nothing happened --go back to feedback form
      header("Location: ../index.html");
}
?>