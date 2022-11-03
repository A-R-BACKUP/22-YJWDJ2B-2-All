package com.example.dumbhead

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View

class MainActivity : AppCompatActivity(), View.OnClickListener {

    var wincount = 0
    var drawcount = 0
    var losecount = 0
    var textView = ""
    var result = ""

    private val binding by lazy {
        ActivityMainBinding.inflate(layoutInflater)
    }

    private val listener = View.OnClickListener {
        try{
            result = "초기화"
            drawcount = 0
            losecount = 0
            wincount = 0
            textView = "$wincount 승, $drawcount 무, $losecount 패"

            binding.result.text = textView
            binding.winlose.text = result
        }catch (e:NumberFormatException){
        }
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        binding.button1.setOnClickListener(this)
        binding.button2.setOnClickListener(this)
        binding.button3.setOnClickListener(this)
        binding.buttonreset.setOnClickListener(listener)
    }

    override fun onClick(v: View?){
        try {
            val random = (1..3).random()
            if (random == 1) {
                drawcount++
                result = "무승부"
            } else if (random == 2) {
                losecount++
                result = "패배"
            } else {
                wincount++
                result = "승리"
            }
            textView = "$wincount 승, $drawcount 무, $losecount 패"

            binding.result.text = textView
            binding.winlose.text = result

        } catch (e:NumberFormatException){
            return
        }
    }
}