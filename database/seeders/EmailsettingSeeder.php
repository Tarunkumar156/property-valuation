<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Generalsettings\Emailsetting;
use Illuminate\Database\Seeder;

class EmailsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Emailsetting::create([
            'provider_name' => 'Google',
            'email_from_name' => 'Edfish',
            'email_from_mail' => 'vimalrajedfish@gmail.com',
            'email_mail_driver' => 'smtp',
            'email_mail_host' => 'smtp.googlemail.com',
            'email_mail_port' => 465,
            'email_mail_username' => 'vimalrajedfish@gmail.com',
            'email_mail_password' => 'edfish123',
            'email_mail_encryption' => 'ssl',
            'is_default' => true,
        ]);
    }
}
