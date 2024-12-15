<?php

use PHPUnit\Framework\TestCase;
use Abdullah\AIAutomation\AIAutomation;

class AIAutomationTest extends TestCase {
    public function testSendMessage() {

        $automation = new AIAutomation("your-api-key");

        $response = $automation->sendMessage("Hello");
        $this->assertIsString($response);
    }
}
