<?php
declare(strict_types=1);

namespace App\Error;

use Cake\Error\ExceptionRenderer;
use Cake\Http\Response;

class ApiExceptionRenderer extends ExceptionRenderer
{
    public function render(): Response
    {
        $response = parent::render();

        $status = $response->getStatusCode();
        $message = $this->error->getMessage();

        $payload = json_encode([
            'ok' => false,
            'error' => [
                'code' => $status,
                'message' => $message !== '' ? $message : 'Error',
            ],
        ], JSON_UNESCAPED_SLASHES);

        return $response
            ->withType('application/json')
            ->withStringBody($payload);
    }
}