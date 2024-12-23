<?php

namespace AbdullahAI\AIAutomation;

use GuzzleHttp\Client;

class AIAutomation {
    private $apiKey;
    private $httpClient;
    private $model;

    public function __construct(string $apiKey, string $model) {
        $this->apiKey = $apiKey;
        $this->model = $model;
        $this->httpClient = new Client([
            'base_uri' => 'https://api.openai.com/v1/', // Base URI for OpenAI API
            'timeout'  => 30, // Request timeout
        ]);
    }

    /**
     * Sends a prompt to the OpenAI ChatCompletion API and returns the AI's response.
     *
     * @param string $prompt The user's input prompt.
     * @return string The AI's response or an error message.
     */
    public function chatCompletion(string $prompt): string {
        $endpoint = 'chat/completions'; // OpenAI Chat API endpoint

        $data = [
            'model' => $this->model, // Specify the model
            'messages' => [
                ["role" => "system", "content" => "You are a helpful assistant."],
                ["role" => "user", "content" => $prompt],
            ],
            'temperature' => 0,
        ];
        

        $response = $this->makeApiCall($endpoint, $data);

        if (isset($response['choices'][0]['message']['content'])) {
            return $response['choices'][0]['message']['content'];
        }

        return $response['error'] ?? "No response received.";
    }

    /**
     * General function to make API calls.
     *
     * @param string $endpoint The API endpoint.
     * @param array $data The request payload.
     * @return array The response from the API.
     */
    private function makeApiCall(string $endpoint, array $data): array {
        try {
            $response = $this->httpClient->post($endpoint, [
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception("API request failed with status code {$response->getStatusCode()}");
            }

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Return the error as part of the response array
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}
