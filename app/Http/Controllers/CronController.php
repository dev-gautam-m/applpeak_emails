<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\EmailLog;
use App\Models\EmailTemplate;
use App\Models\Server;
use Carbon\Carbon;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class CronController extends Controller
{
    public function sendEmails(){
        $res = EmailLog::where('scheduled_at', '<', Carbon::now())->where('processed', 0)->limit(1)->get(); 
  
        if ($res->isNotEmpty()) {  
            foreach ($res as $rs) {

                $contact = Contact::where('id', $rs->contact_id)->first();
                $server = Server::first(); 
                $template = EmailTemplate::where('id', $rs->template_id)->first(); 

                $mail = new PHPMailer(true);
                $mail->isSMTP();                                 
                $mail->Host = $server->hostname;                
                $mail->SMTPAuth = true;          
                $mail->Username = $server->username;
                $mail->Password = $server->password;
                $mail->SMTPSecure = $server->protocol;                       
                $mail->Port = $server->port;     
                $mail->setFrom($server->from_email, $server->from_name);
                $mail->addAddress($contact->email, $contact->first_name); 
                $mail->isHTML(true);

                // replace subject parts before sending
                $mail->Subject = $template->subject;
                $content = $template->content;

                //replace parts
                $content = str_replace('[first_name]', ucfirst($contact->first_name), $content);
                // replace other parts here 


                $mail->Body    = "<html><body>$content</body></html>";
 
 
                if ($mail->send()) {
                    $rs->processed = 1;
                    $rs->save();                    
                } else { 
                    // 100, for error
                    $rs->processed = 10;
                    $rs->save();    
                }
            }
        } else {
            echo "No more emails";
        }
    }

    public function setOpenedDate($randomCode)
    {
        $log = EmailLog::where('code', $randomCode)->first();

        if ($log) {
            $log->deleted_at = now();
            $log->save();
        }
    }
 
}
