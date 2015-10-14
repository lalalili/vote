<?php

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->visit('/')
            ->see('禮貌大使票選活動');

    }

    public function testAdminPage()
    {

        $this->visit('/admin/')
            ->see('天');
    }
}
