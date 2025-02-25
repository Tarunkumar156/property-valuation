<?php

namespace Database\Seeders;

use App\Models\Admin\Settings\Termsandsupport\Support;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Customer
        Support::create([
            'panel' => 'CUSTOMER',
            'slug' => 'customer-terms-and-condition',
            'type' => 1,
            'description' => '<!DOCTYPE html> <html> <head> <style> body { color: black; } h1 { color: orange; } </style> </head> <body> <h1>Terms and Condition</h1> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> </body> </html>',
            'user_id' => 1,
        ]);

        Support::create([
            'panel' => 'CUSTOMER',
            'slug' => 'customer-faq',
            'type' => 2,
            'description' => '<!DOCTYPE html> <html> <head> <style> body { color: black; } h1 { color: orange; } </style> </head> <body> <h1>FAQ</h1> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> </body> </html>',
            'user_id' => 1,
        ]);

        Support::create([
            'panel' => 'CUSTOMER',
            'slug' => 'customer-contact-us',
            'type' => 3,
            'description' => '<!DOCTYPE html> <html> <head> <style> body { color: black; } h1 { color: orange; } </style> </head> <body> <h1>Contact Us</h1> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> <p>This is an ordinary paragraph. Notice that this text is blue. The default text color for a page is defined in the body selector.</p> </body> </html>',
            'user_id' => 1,
        ]);
    }
}
