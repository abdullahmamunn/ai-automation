# AI Automation

**AI Automation** is a PHP package that provides a simple interface to interact with OpenAI's GPT models, enabling seamless AI-driven automation and chat capabilities in your PHP projects.

---

## Features
- Send prompts to OpenAI's GPT models (e.g., `gpt-3.5-turbo`) and receive responses.
- AI for chatbots, automation, and more.
- Designed for modern PHP applications, with support for `.env` configuration.

---

## Installation

### Step 1: Install the Package
Add the package to your Laravel or PHP project using Composer:
```bash
composer require abdullah-ai/ai-automation:dev-master

```
---

## Configuration

### Step 2: Set Up Your API Key
1. Obtain your OpenAI API key from OpenAI API Keys.
2. Add the API key to your Laravel or PHP project’s `.env` file:

```bash
AI_AUTOMATION_API_KEY=your-openai-api-key

```
---

## Usage

### Example in Laravel
Below is an example of how to use the AI Automation package in a Laravel project:

```php
use AbdullahAI\AIAutomation\AIAutomation;
or
require 'vendor/autoload.php';

public function getAIResponse() {
    // Fetch the API key from the .env file
    $apiKey = env('AI_AUTOMATION_API_KEY');

    $model = 'gpt-3.5-turbo', // you can Specify the model

    // Initialize the AIAutomation instance
    $automation = new AIAutomation($apiKey, $model);

    // Example user prompt
    $prompt = "I have purchased a product but it is of poor quality.";

    // Get AI response
    $response = $automation->chatCompletion($prompt);

    // Return the response as JSON
    return response()->json(['AI Response' => $response]);
}
```
---

## Methods
- `__construct(string $apiKey)`
  
 Initializes the AIAutomation class with your OpenAI API key.

- **Parameter:** `$apiKey` - The OpenAI API key.
    `chatCompletion(string $message): string`
    Sends a user prompt to OpenAI's API and retrieves the AI's response.

- **Parameter:** `$message` - The user-provided input for the AI.
- **Returns:** A string containing the AI's response.

---

## Requirements
- PHP 8.0 or higher
- Composer
- GuzzleHTTP (^7.0)
- Laravel (optional, for framework integration)
- PHPUnit (^10.5 for development and testing)

---

## Author
### Abdullah Al Mamun

For support or questions:
   📧 almamun00021@gmail.com
