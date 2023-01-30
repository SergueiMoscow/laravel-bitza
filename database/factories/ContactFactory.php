<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $streets = [
            'ул. Ленина',
            'ул. Коммунистическая',
            'ул. Партизанская',
            'ул. 50-летия Октября',
            'проспект Ленина',
            'ул. Козьмы Никитича'
        ];
        $districts = [
            'Ленинский район',
            'Октябрьский район',
            'Советский район',
            'Московский район'
        ];
        $countries = [
            "Россия",
            "Белоруссия",
            "Казахстан",
            "Таджикистан",
            "Буркина-Фасо"
        ];
        $workPlaces = [
            "Пятёрочка",
            "Магнит",
            "Кремль",
            "Администрация президента",
            "ФСБ",
            "ЦРУ",
            "Перекрёсток",
            "Лукойл"
        ];
        return [
            'surname' => fake()->lastName(),
            'name' => fake()->firstName(),
            'birth_date' => fake()->date('2000-12-31'),
            'birth_place' => fake()->city(),
            'document' => 'Passport',
            'doc_series' => mt_rand(1001, 9999),
            'doc_number' => mt_rand(100000, 999999),
            'doc_date' => fake()->date('2021-12-31'),
            'doc_issued1' => fake()->city,
            'doc_issued2' => mt_rand(100, 999) . '-' . mt_rand(100, 999),
            'address1' => Arr::random($streets), // $streets[rand(0, count($streets)-1)] . ' ' . fake()->numberBetween(1, 120),
            'address2' => Arr::random($districts), //$districts[rand(0, count($districts)-1)],
            'city' => fake()->city(),
            'zip' => mt_rand(100000, 999999),
            'email' => fake()->email,
            'phone' => fake()->phoneNumber(),
            'state' => Arr::random($districts), //$districts[rand(0, count($districts)-1)],
            'country' => Arr::random($countries), //$countries[rand(0, count($countries)-1)],
            'workplace' => Arr::random($workPlaces), //$workPlaces[rand(0, count($workPlaces)-1)],
            'notes' => fake()->text(30),
            'status' => 'A'
        ];
    }
}
