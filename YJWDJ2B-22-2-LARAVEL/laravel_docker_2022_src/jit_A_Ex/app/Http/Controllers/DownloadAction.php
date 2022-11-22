<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use function response;

final class DownloadAction
{
    public function __invoke(Request $request): BinaryFileResponse
    {
        //Response::download('./path/to/srvFile.pdf');
        // 헬퍼 함수 이용 시
        //$response = response()->download('./path/to/srvFile.pdf');
        // content-type 지정
        $response = response()->download(
            './path/to/srvFile.pdf',
            'testdownload.pdf',
            [
                'content-type' => 'application/pdf',
            ]
        );
        return $response;
    }
}
