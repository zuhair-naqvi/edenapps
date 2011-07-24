<?php

/**
 * bookings actions.
 *
 * @package    edenapps
 * @subpackage bookings
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bookingsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if($request->isMethod('post'))
    {
//        $eventStr = $_REQUEST['eventstr'];
//        $eventData = json_decode($eventStr);
//        $c = count($eventData);
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $time = $_REQUEST['date'];
        $guests = $$_REQUEST['guests'];
        

        $message = $this->getMailer()->compose(
        array('webmaster@thecarltonapp.com' => 'The Carlton App'),
        'hi.zuhair@gmail.com',
        'New Booking',
      <<<EOF
From: $name <$email>
For: $guests guests
At: $time
EOF
    );
 
    $this->getMailer()->send($message);
    }
  }
}
