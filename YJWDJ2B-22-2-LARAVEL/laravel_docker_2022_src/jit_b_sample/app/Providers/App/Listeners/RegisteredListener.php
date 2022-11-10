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
    private $eloquent;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer, User $eloquent){
        $this->mailer= $mailer;
        $this->eloquent = $eloquent;

    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //
        $user = $this->eloquent->findOrFail($event->user->getAuthIdentifier()); // 쿼리처리
        //회원가입한 사용자의 정보를 활용하여 User모델로 조회
        $this->mailer->raw(
           '회원 등록 완료',
           function ($message) use($user){
              $message->subject('회원등록확인메일')->to($user->email);

           }
        );
    }
}
