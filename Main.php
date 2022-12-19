<?php
/**
 * @package: API Virtual Mail.
 * @Author: DangNhuNam.
 * @Create_date: 18/12/2022.
 ---------[ Note ]---------
 * This system is used to create virtual mail in 10 minutes.
 * The $session variable carries the value of the login session, used to store and receive information from the mail.
**/
    class Mailer {
          public static function getMail($session) {
              $curl = curl_init();
              curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://10minutemail.net/address.api.php?sessionid='.$session.'&_='.time(),
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_RETURNTRANSFER => TRUE,
                ));
              $result = curl_exec($curl);
              curl_close($curl);
              return $result;
          }
          public static function changeMail($session) {
              $curl = curl_init();
              curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://10minutemail.net/address.api.php?new=1&sessionid='.$session.'&_='.time(),
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_RETURNTRANSFER => TRUE,
                ));
               $result = curl_exec($curl);
               curl_close($curl);
               return $result;
          }
    }
   header('content-type: application/json');
   $mail = json_decode(Mailer::getMail('7am17pfrkf0bj09qglarup854f'), true);
   print_r($mail);
