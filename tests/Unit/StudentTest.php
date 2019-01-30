<?php

namespace Tests\Unit;

use Faker\Factory;
use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudentTest extends TestCase
{
    use DatabaseTransactions;

    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_stores_a_student()
    {
        $data = [
            'first_name' => $this->faker->firstNameMale,
            'last_name' => $this->faker->lastName,
            'gender' => 'M',
            'join_year' => $this->faker->year,
            'class_room_id' => $this->faker->numberBetween(1, 2)
        ];

        $response = $this->post('api/student/create', $data);

        $response->assertStatus(Response::HTTP_OK);
    }
}
