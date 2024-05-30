<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class ValidatorTest extends TestCase
{
    public function testValidatorSuccess()
    {
        $data = [
            "username" => "admin",
            "password" => "rahasia"
        ];

        $rules = [
            "username" => "required",
            "password" => "required",
        ];

        $validator = Validator::make($data, $rules);
        self::assertNotNull($validator);
        self::assertTrue($validator->passes());
        self::assertFalse($validator->fails());
    }

    public function testValidatorInvalid()
    {
        $data = [
            "username" => "",
            "password" => ""
        ];

        $rules = [
            "username" => "required",
            "password" => "required",
        ];

        $validator = Validator::make($data, $rules);
        self::assertNotNull($validator);
        self::assertFalse($validator->passes());
        self::assertTrue($validator->fails());

        $message = $validator->getMessageBag();
        Log::info($message->toJson(JSON_PRETTY_PRINT));
    }

    public function testValidatorValidationException()
    {
        $data = [
            "username" => "",
            "password" => ""
        ];

        $rules = [
            "username" => "required",
            "password" => "required",
        ];

        $validator = Validator::make($data, $rules);
        self::assertNotNull($validator);
        
        try {
            $validator->validate();
            self::fail("ValidationException not thrown");
        } catch(ValidationException $exception) {
            self::assertNotNull($exception);
            $message = $exception->validator->errors();
            Log::error($message->toJson(JSON_PRETTY_PRINT));
        }
    }
}
