<?php
    namespace App\Notifications;
    use App\Entity\Contact;
use Swift_Message;
use Twig\Environment;

class Notification{
    /*
    * @var \Swift_Mailer
    */
    private $renderer;
    /*
    *@var Environement
    **/
    private $mailer;
        public function __construct (\Swift_Mailer $mailer, Environment $renderer){
                $this->mailer=$mailer;
                $this->renderer=$renderer;

        }
        public function notify(Contact $contact)
        {
           $message=(new Swift_Message('Boutique'.$contact->getBijoux()->getLibelle()))
           ->setFrom('noreply@server.com')
           ->setTo('agence@server.com')
           ->setBody($this->renderer->render('home/email.html.twig',['contact'=>$contact]),'text/html')
           ->setReplyTo($contact->getEmail());
           $this->mailer->send($message);
        }
    }
?>
