//package com.example.dumbhead
//
//import androidx.appcompat.app.AppCompatActivity
//import android.os.Bundle
//import android.view.View
//
//class MainActivity : AppCompatActivity(), View.OnClickListener {
//
//    var wincount = 0
//    var drawcount = 0
//    var losecount = 0
//    var textView = ""
//    var result = ""
//
//    private val binding by lazy {
//        ActivityMainBinding.inflate(layoutInflater)
//    }
//
//    private val listener = View.OnClickListener {
//        try{
//            result = "초기화"
//            drawcount = 0
//            losecount = 0
//            wincount = 0
//            textView = "$wincount 승, $drawcount 무, $losecount 패"
//
//            binding.result.text = textView
//            binding.winlose.text = result
//        }catch (e:NumberFormatException){
//        }
//    }
//
//    override fun onCreate(savedInstanceState: Bundle?) {
//        super.onCreate(savedInstanceState)
//        setContentView(binding.root)
//
//        binding.button1.setOnClickListener(this)
//        binding.button2.setOnClickListener(this)
//        binding.button3.setOnClickListener(this)
//        binding.buttonreset.setOnClickListener(listener)
//    }
//
//    override fun onClick(v: View?){
//        try {
//            val random = (1..3).random()
//            if (random == 1) {
//                drawcount++
//                result = "무승부"
//            } else if (random == 2) {
//                losecount++
//                result = "패배"
//            } else {
//                wincount++
//                result = "승리"
//            }
//            textView = "$wincount 승, $drawcount 무, $losecount 패"
//
//            binding.result.text = textView
//            binding.winlose.text = result
//
//        } catch (e:NumberFormatException){
//            return
//        }
//    }
//}

package com.example.game

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import com.example.game.databinding.ActivityMainBinding
import kotlin.random.Random

class MainActivity : AppCompatActivity() {
    private val binding by lazy { ActivityMainBinding.inflate(layoutInflater) }

    private val record = IntArray(3)
    private val resultString = arrayOf("승", "무", "패")

    /**
     * result: 0(승), 1(무), 2(패)
     */
    private fun updateUI(result:Int){
        if(result in 0..2)
            binding.textViewResult.text = resultString[result]
        else
            binding.textViewResult.text="-"

        binding.textViewRecord.text = "${record[0]}승 ${record[1]}무 ${record[2]}패"
    }

    private val listener = View.OnClickListener {
        val computer = Random.nextInt(3)
        /*val mine = when(it.id) {
            R.id.buttonScissors -> SCISSORS
            R.id.buttonRock -> ROCK
            else -> PAPER
        }

        var result:Int = -1
        if(computer == mine) {
            result = TIE
        } else {
            if(mine== SCISSORS){
                if(computer==ROCK)
                    result = LOSE
                else
                    result = WIN
            } else if (mine==ROCK){
                if(computer== SCISSORS)
                    result = WIN
                else
                    result = LOSE
            } else if (mine == PAPER){
                if(computer== SCISSORS)
                    result = LOSE
                else
                    result = WIN
            }
        }
        record[result]++
        updateUI(result)*/
        record[computer]++
        updateUI(computer)
    }
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        binding.buttonRock.setOnClickListener(listener)
        binding.buttonScissors.setOnClickListener(listener)
        binding.buttonPaper.setOnClickListener(listener)

        binding.buttonReset.setOnClickListener {
            record.fill(0)
            updateUI(-1)
        }
    }

    companion object{
        private const val WIN = 0
        private const val TIE = 1
        private const val LOSE = 2

        private const val SCISSORS = 0
        private const val ROCK = 1
        private const val PAPER = 2
    }
}