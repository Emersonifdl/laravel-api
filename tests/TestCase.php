<?php

namespace Tests;

use Illuminate\Foundation\Testing\{TestCase as BaseTestCase, WithFaker};
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use WithFaker;
}
