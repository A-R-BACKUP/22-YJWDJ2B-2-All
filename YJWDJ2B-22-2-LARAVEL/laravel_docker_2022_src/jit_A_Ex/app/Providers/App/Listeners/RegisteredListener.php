<?php

namespace App\Providers\App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Mail\Mailer;
use App\Models\User;

class RegisteredListener
{
    private $mailer;
    private $eloquent;  // 사용자 모델 정보

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer, User $eloquent)
    {
        //
        $this->mailer = $mailer;
        $this->eloquent = $eloquent;
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    { // 이벤트 리스너의 처리
        //
        $user = $this->eloquent->findOrFail(// 쿼리 처리
            $event->user->getAuthIdentifier()
        ); 
        $this->mailer->raw(
            '회원 가입 완료했음',
            function($msg)use($user){  // 클로저
                $msg->subject('회원가입완료메일')->to($user->email);

            }
        );
    }
}
