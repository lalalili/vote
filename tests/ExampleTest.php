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
            ->see('§���j�ϲ��ﬡ��');

    }

    public function testAdminPage()
    {

        $this->visit('/admin/')
            ->see('��');
    }
}
