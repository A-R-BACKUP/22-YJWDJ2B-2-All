package com.example.dailydiary

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import com.example.dailydiary.databinding.ActivityMainBinding
import java.time.LocalDate
import java.time.LocalDateTime

class MainActivity : AppCompatActivity() {
    private val binding by lazy {
        ActivityMainBinding.inflate(layoutInflater)
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        var checkDate = ""

        binding.diaryDateView.text = LocalDate.now().toString()

        binding.calendarView.setOnDateChangeListener {
            calendarView, year, month, dayOfMonth ->
            binding.diaryDateView.text = String.format("%d-%d-%d", year, month + 1, dayOfMonth)
            checkDate = String.format("%d-%d-%d", year, month + 1, dayOfMonth)
        }

        binding.openEditorButton.setOnClickListener{
            val editintent = Intent(this, EditActivity::class.java)
            editintent.putExtra("checkDate", checkDate)
            startActivity(editintent)
        }
    }
}