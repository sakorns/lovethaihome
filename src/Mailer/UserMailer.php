<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer {

    public function forgot_password($user) {
        $this->to($user->email)
                ->subject(sprintf('Welcome %s', $user->username))
                ->template('forgotpassword') // By default template with same name as method name is used.
                ->layout('default')
                ->set(['subject' => 'Hi', 'username' => $user->username, 'url' => '']);
    }

    public function resetPassword($user) {
        $this->to($user->email)
                ->subject('Reset password')
                ->set(['token' => $user->token]);
    }

}

?>
