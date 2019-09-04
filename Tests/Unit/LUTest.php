<?php

namespace Modules\LU\Tests\Feature;

//-----  MODELS  -----
use Modules\LU\Models\User;
use Tests\TestCase;

class LUTest extends TestCase {
    public function saveTest() {
        $user = new User();
        $user->name = 'abc';
        $user->emal = 'abc@me.com';
        $user->password = 'xyz';
        $saved_user = $user->save();
        $this->assertTrue($saved_user);
    }

    public function testDatabase() {
        // Make call to application...
        $this->assertDatabaseHas('users', [
            'email' => 'sally@example.com',
        ]);
    }

    public function testCreateProductWithMiddleware() {
        $data = [
                        'name' => 'New Product',
                        'description' => 'This is a product',
                        'units' => 20,
                        'price' => 10,
                        'image' => 'https://images.pexels.com/photos/1000084/pexels-photo-1000084.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                               ];

        $response = $this->json('POST', '/api/products', $data);
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Unauthenticated.']);
    }

    public function testCreateProduct() {
        $data = [
                        'name' => 'New Product',
                        'description' => 'This is a product',
                        'units' => 20,
                        'price' => 10,
                        'image' => 'https://images.pexels.com/photos/1000084/pexels-photo-1000084.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                    ];
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user, 'api')->json('POST', '/api/products', $data);
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => 'Product Created!']);
        $response->assertJson(['data' => $data]);
    }

    public function testGettingAllProducts() {
        $response = $this->json('GET', '/api/products');
        $response->assertStatus(200);

        $response->assertJsonStructure(
                [
                    [
                            'id',
                            'name',
                            'description',
                            'units',
                            'price',
                            'image',
                            'created_at',
                            'updated_at',
                    ],
                ]
            );
    }

    public function testUpdateProduct() {
        $response = $this->json('GET', '/api/products');
        $response->assertStatus(200);

        $product = $response->getData()[0];

        $user = factory(\App\User::class)->create();
        $update = $this->actingAs($user, 'api')->json('PATCH', '/api/products/'.$product->id, ['name' => 'Changed for test']);
        $update->assertStatus(200);
        $update->assertJson(['message' => 'Product Updated!']);
    }

    /*
    * https://blog.pusher.com/tests-laravel-applications/ !!
    *
    **/
}//end class
