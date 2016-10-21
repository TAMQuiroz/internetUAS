<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    // 
    // ./vendor/bin/phpunit --filter=test_inv_
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */

    protected $baseUrl = 'http://localhost:8000';


    /**
     * Default preparation for each test
     *
     */
    public function setUp()
    {
        parent::setUp(); // Don't forget this!
     
        $this->prepareForTests();
    }   

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        ini_set('memory_limit','1024M');

        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        
        return $app;
    }

    /**
     * Migrates the database and set the mailer to 'pretend'.
     * This will cause the tests to run quickly.
     *
     */
    private function prepareForTests()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

}

