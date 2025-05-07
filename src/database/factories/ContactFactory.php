<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5), 
            'first_name' => $this->faker->lastName(), 
            'last_name'=> $this->faker->FirstName(), 
            'gender' =>$this->faker->numberBetween(1, 3),
            'email'=> $this->faker->safeEmail(), 
            'tel' => $this->faker->numberBetween(10,11), 
            'address'=> $this->faker->streetAddress() ,
            'building'=> $this->faker->secondaryAddress() , 
            'detail'=> $this->faker->text(30),
        ];
    }
}
