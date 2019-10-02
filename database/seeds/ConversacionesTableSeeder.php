<?php

use Illuminate\Database\Seeder;
use App\Conversacione;

class ConversacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conversacione::create([
            'user_id'=>1,
            'contacto_id'=>2,    
            'last_message'=>null,
            'last_time'=>null,
        ]);    
        
        Conversacione::create([
            'user_id'=>2,
            'contacto_id'=>1,    
            'last_message'=>null,
            'last_time'=>null,
        ]); 

        Conversacione::create([
            'user_id'=>1,
            'contacto_id'=>3,    
            'last_message'=>null,
            'last_time'=>null,
        ]);  
    }
}
