<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

use function flush;
use function ob_flush;
use function rand;
use function usleep;

final class StreamAction extends Controller
{
    public function __invoke(): StreamedResponse
    {
        return response()->stream(
            function () {// 클로저, SSE로 실행시킬 응답내용
                while (true) {
                    echo 'data: ' . rand(1, 100) . "\n\n";  // 버퍼에 출력
                    ob_flush();  // 실시간으로 버퍼 내용 비우기: 클라이언트에 전달
                    flush();
                    usleep(200000); // 마이크로초단위로 슬립
                }
            },
            Response::HTTP_OK, //응답코드
            [  // 응답헤더
                'content-type' => 'text/event-stream',
                'X-Accel-Buffering' => 'no',
                'Cache-Control' => 'no-cache',
            ]
        );
    }
}
