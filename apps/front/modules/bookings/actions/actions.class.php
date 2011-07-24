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
        $eventData = $request->getParameter('eventdata');
        $message = $this->getMailer()->compose(
        array('webmaster@thecarltonapp.com' => 'The Carlton App'),
        'hi.zuhair@gmail.com',
        'New Booking',
      <<<EOF
Test Mail
EOF
    );
 
    $this->getMailer()->send($message);
    }
  }
}
