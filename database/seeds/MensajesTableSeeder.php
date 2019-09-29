<?php

use Illuminate\Database\Seeder;
use App\Mensaje;
class MensajesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mensaje::create([
            'from_id'=>1,
            'to_id'=>2,
            'content'=>'Hola como estas?'

        ]);
        Mensaje::create([
            'from_id'=>2,
            'to_id'=>1,
            'content'=>'Bien Gracias. Y Tu?'

        ]);
    }
}
