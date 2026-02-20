<?php
declare(strict_types=1);

namespace App\Error;

use Cake\Error\Renderer\WebExceptionRenderer;
use Cake\Http\Response;

class AppExceptionRenderer extends WebExceptionRenderer
{
    public function render(): Response
    {
        $request = $this->getRequest();
        $path = $request->getUri()->getPath();

        // Force JSON only for /api/*
        if (str_starts_with($path, '/api/')) {
            $status = $this->getHttpCode($this->exception);
            $message = $this->exception->getMessage() ?: 'Error';

            $payload = json_encode([
                'ok' => false,
                'error' => [
                    'code' => $status,
                    'message' => $message,
                ],
            ], JSON_UNESCAPED_SLASHES);

            return (new Response())
                ->withStatus($status)
                ->withType('application/json')
                ->withStringBody($payload);
        }

        return parent::render();
    }
}