package com.example.helloworld

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.TextView
import com.example.helloworld.databinding.ActivityMainBinding

//class MainActivity : AppCompatActivity(), View.OnClickListener() {
//    override fun onCreate(savedInstanceState: Bundle?) {
//        super.onCreate(savedInstanceState) // 이 부분 절대 삭제 금지
//        setContentView(R.layout.activity_main_easycal) // R 클래스는 자동으로 잡히게 된다.
////        setContentView(R.layout.activity_main_linear) // 간단한 출력 메시지 같은건 리니어 레이아웃 많이 쓴다고 함.
//
////        val textViewTitle = findViewByid<TextView>(R.id.textView)
////        textViewTitle.text="Hello"
//    }
//}

class MainActivity : AppCompatActivity(), View.OnClickListener{
    private val binding by lazy{
        ActivityMainBinding.inflate(layoutInflater)
    }
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        binding.buttonAdd.setOnClickListener(this)
        binding.buttonSub.setOnClickListener(listener)
        binding.buttonMul.setOnClickListener(View.OnClickListener {
            try {
                val number1 = binding.editTextNumber1.text.toString().toDouble()
                val number2 = binding.editTextNumber2.text.toString().toDouble()
                binding.textViewResult.text = ( number1 * number2 ).toString()
            } catch (e:NumberFormatException) {
            }
        })

    }

    override fun onClick(v: View?) {
        try{
            val number1 = binding.editTextNumber1.text.toString().toDouble()
            val number2 = binding.editTextNumber2.text.toString().toDouble()
            binding.textViewResult.text =   (number1+number2).toString()
        }catch (e:NumberFormatException) {
            return
        }
    }

    private val listener = View.OnClickListener{
        try {
            val number1 = binding.editTextNumber1.text.toString().toDouble()
            val number2 = binding.editTextNumber2.text.toString().toDouble()
            binding.textViewResult.text = (number1 - number2).toString()
        } catch (e:NumberFormatException) {
        }
    }
}