package com.example.dumbhead

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import com.example.dumbhead.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity() {
    private val binding by lazy {ActivityMainBinding.inflate(layoutInflater)}

    private val record = IntArray(3)
    private val resultString = arrayOf("win", "draw", "lose")

    private fun updateUI(result:Int){
        if(result in 0 .. 2)
            binding.textViewRecord.text = resultString[result]
        else
            binding.textViewResult.text = "${record[0]}win ${record[1]}draw ${record[2]}lose"
    }
}
//SSIBAL

private val listener = View.OnClickListener {
    val computer = Random.nextInt(3)
    val mine = when(it.id) {
        R.id.buttonScissors -> SCISSORS
        R.id.buttonRock -> ROCK
        else -> PAPER
    }

    var result:Int = -1
    if(computer == mine)
        result = TIE
    else
        if(mine==SCISSORS)
            if(computer == ROCK)
                result = LOSE
            else
                result = WIN
        else if (mine == ROCK)
            if(computer == PAPER)
                result = 0
            else
                result = 2
        else if (mine == 1)
            if(computer == 2)
                result = 2
            else
                result = 0
    record[result]++
    updateUI(result)
}
override fun
