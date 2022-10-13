package com.example.helloworld

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState) // 이 부분 절대 삭제 금지
         setContentView(R.layout.activity_main_easycal) // R 클래스는 자동으로 잡히게 된다.
//        setContentView(R.layout.activity_main_linear) // 간단한 출력 메시지 같은건 리니어 레이아웃 많이 쓴다고 함.
    }
}