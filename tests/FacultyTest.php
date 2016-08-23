<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacultyTest extends TestCase
{
    //To hanlde Auth Middleware
    use WithoutMiddleware;

    public function testFacultyListIsOk()
    {
        $this->visit('/faculty')
             ->assertResponseOk();
    }

    public function testFacultyCreateLinkIsOk()
    {
        $this->visit('/faculty')
             ->click('Nueva Especialidad')
             ->seePageIs('/faculty/new');
    }


}
