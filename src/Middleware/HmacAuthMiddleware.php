<?php
declare(strict_types=1);

namespace App\Middleware;

use Cake\Http\Exception\UnauthorizedException;
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

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {

        $path = $request->getUri()->getPath();

        // Only protect /api/*
        if (!str_starts_with($path, '/api/')) {
            return $handler->handle($request);
        }

        $ts  = $request->getHeaderLine('X-MC-Timestamp');
        $sig = $request->getHeaderLine('X-MC-Signature');

        if ($ts === '' || $sig === '' || !ctype_digit($ts)) {
            throw new UnauthorizedException('Missing or invalid HMAC headers');
        }

        if (abs(time() - (int)$ts) > $this->maxSkewSeconds) {
            throw new UnauthorizedException('Timestamp skew too large');
        }

        $rawBody = (string)$request->getBody();

        $canonical = strtoupper($request->getMethod())
            . "\n" . $path
            . "\n" . $ts
            . "\n" . hash('sha256', $rawBody);

        $expected = hash_hmac('sha256', $canonical, $this->secret);

        if (!hash_equals($expected, $sig)) {
            throw new UnauthorizedException('Invalid signature');
        }

        return $handler->handle($request);
    }
}