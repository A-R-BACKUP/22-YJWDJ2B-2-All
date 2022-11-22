<?php
declare(strict_types=1);

namespace App\Http\Responder;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

final class TokenResponder
{
    public function __invoke($token, int $ttl): JsonResponse
    {
        if (!$token) {
            return new JsonResponse(
                [
                    'error' => 'Unauthorized'   // 미승인
                ], Response::HTTP_UNAUTHORIZED
            );
        }
        return new JsonResponse(
            [
                'access_token' => $token, // 토큰값
                'token_type' => 'bearer',  // 헤더
                'expires_in' => $ttl   // 토큰 수명
            ], Response::HTTP_OK
        );
    }
}
