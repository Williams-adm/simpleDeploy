<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $district = ['Huancayo', 'Tambo', 'Chilca', 'Pilcomayo', 'Cajas'];
        $districtrand = strtolower($this->faker->randomElement($district));
        $street = ['Ferrocarril', 'Giraldes', 'Huancavelica', 'Mariscal Castilla', 'Paseo la Breña'];
        return [
            'name' => $this->faker->words(2, true),
            'paternal_surname' => $this->faker->word(),
            'maternal_surname' => $this->faker->word(),
            'type_document' => 'DNI',
            'n_document' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'date_of_birth' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'country' => strtolower('Peru'),
            'region' => strtolower('Junin'),
            'province' => strtolower('Huancayo'),
            'city' => $districtrand,
            'street' => strtolower('AV.') . strtolower($this->faker->randomElement($street)),
            'prefix' => '+51', 
            'phone' => $this->faker->unique()->randomNumber(9, false)
        ];
    }
}
