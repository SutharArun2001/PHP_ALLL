<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Student;
use App\Models\User;
use Database\Factories\studentFactory;


class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('table');

        $response->assertStatus(302);
    }

    

    public function test_user_added_new_user()
    {
        Student::create([
            'firstname' => 'arun',
            'lastname' => 'suthar',
            'email' => 'arun@gmail.com',
            'phonenumber' => '7788994455',
            'gender' => 'male',
            'role' => '',
            'password' => 'arun1234',
            'user_photo' => ''
        ]);

        $this->assertDatabaseHas('student', ['firstname' => 'arun']);

        $response = $this->post('/login', [
            'email' => 'arun@gmail.com',
            'password' => 'arun1234',
        ]);
        // $this->assertRedirected('table');
        // $response->assertRedirect('table');
        // $response->assertRedirectToRoute('/');
        // $this->assertAuthenticated();

        $this->post('/register',[
            'firstname' => 'arun',
            'lastname' => 'suthar',
            'email' => 'arun2@gmail.com',  
            'phonenumber' => '7788994455',
            'gender' => 'male',
            'password' => 'arun1234'
        ]);

        // $response->assertStatus(200);
        $this->assertEquals(1, Student::count());
        // $this->assertRedirectTo('table')
        // $responsereg->assertRedirect('table');
        // $response->assertRedirectToRoute('get.view');
        // $response->assertRedirectToRoute('table');


        // $this->assertDatabaseHas('User', ['firstname' => 'arun']);
    }
    public function test_login_form_validation(){
        // for testing input field is empty.
        $response = $this->post('/login', [
            'email' => '1@gmail',
            'password' => ''
        ]);
        $response->assertStatus(202);
        $response->assertSessionHasErrors('email','password');


    }
    public function test_user_login_with_email_and_password()
    {
        // $user = Student::factory()->create();

        Student::create([
            'firstname' => 'arun',
            'lastname' => 'suthar',
            'email' => 'arun@gmail.com',
            'phonenumber' => '7788994455',
            'gender' => 'male',
            'role' => '',
            'password' => 'arun1234',
            'user_photo' => ''
        ]);
        
        // $response = $this->post('/login', [
        //     'email' => 'arun@gmail.com',
        //     'password' => 'arun1234'
        // ]); 
        $response = $this->post('/login', [
            'email' => '',
            'password' => ''
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('email','password');
        // $response->('table');
        $this->assertDatabaseHas('student', ['firstname' => 'arun']);
        $this->assertEquals(1, Student::count());
        // $response->assertRedirectToRoute('table');

    }

}