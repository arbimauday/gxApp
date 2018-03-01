<?php

namespace App\Http\Controllers\Email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use pop3;

class Pop3List extends Controller
{

    public function view(){

        require_once __DIR__ . '/../../../../vendor/autoload.php';
        require_once __DIR__ . '/../../../../vendor/eden/core/src/Control.php';


// connect to POP3
        $pop3 = eden('mail')->pop3(
            'mail.dps.globalxtreme.net',
            'kevin@dps.globalxtreme.net',
            'global',
            110,
            false);

// emails
        $emails = $pop3->getEmails(0, $pop3->getEmailTotal());


        $i = 0  ;
        foreach($emails as $email){
            $initialSubject = $email['subject'][0] . $email['subject'][1];

            $message = urlencode($email['body']['text/plain']);
            echo json_encode($email).'<br>';
            $i++;
        }

        $pop3->disconnect();

    }
}
