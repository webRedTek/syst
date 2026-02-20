<?php
declare(strict_types=1);

namespace App\Middleware;

use Cake\Http\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class HmacAuthMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly string $secret,
        private readonly int $maxSkewSeconds = 300
    ) {}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $path = $request->getUri()->getPath();

        if (!str_starts_with($path, '/api/')) {
            return $handler->handle($request);
        }

        // Fail closed if secret not configured
        if ($this->secret === '' || $this->secret === '__MISSING__' || $this->secret === 'CHANGE_ME_DEV_ONLY') {
            return $this->jsonError(500, 'HMAC secret not configured');
        }

        $ts  = $request->getHeaderLine('X-MC-Timestamp');
        $sig = $request->getHeaderLine('X-MC-Signature');

        if ($ts === '' || $sig === '' || !ctype_digit($ts)) {
            return $this->jsonError(401, 'Missing or invalid HMAC headers');
        }

        if (abs(time() - (int)$ts) > $this->maxSkewSeconds) {
            return $this->jsonError(401, 'Timestamp skew too large');
        }

        $rawBody = (string)$request->getBody();
        $canonical = strtoupper($request->getMethod())
            . "\n" . $path
            . "\n" . $ts
            . "\n" . hash('sha256', $rawBody);

        $expected = hash_hmac('sha256', $canonical, $this->secret);

        if (!hash_equals($expected, $sig)) {
            return $this->jsonError(401, 'Invalid signature');
        }

        return $handler->handle($request);
    }

    private function jsonError(int $status, string $message): ResponseInterface
    {
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
}