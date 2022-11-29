package com.example.dailydiary

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import androidx.lifecycle.LiveData
import com.example.dailydiary.databinding.ActivityMainBinding
import com.example.dailydiary.model.MyDatabase
import com.example.dailydiary.model.MyRecord
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import java.time.LocalDate
import java.time.LocalDateTime

class MainActivity : AppCompatActivity() {
    private var myDatabase : MyDatabase? = null

    private val binding by lazy {
        ActivityMainBinding.inflate(layoutInflater)
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        myDatabase = MyDatabase.getInstance(this)

        var checkDate = LocalDate.now().toString()

        binding.diaryDateView.text = LocalDate.now().toString() // 오늘 날짜 불러오기


        binding.calendarView.setOnDateChangeListener {
            calendarView, year, month, dayOfMonth ->
            binding.diaryDateView.text = String.format("%d-%d-%d", year, month + 1, dayOfMonth)
            checkDate = String.format("%d-%d-%d", year, month + 1, dayOfMonth)
        }


        val diaryViewModel: LiveData<List<MyRecord>>
        binding.diaryContentsView.text = diaryViewModel.

        binding.openEditorButton.setOnClickListener{
            val editintent = Intent(this, EditActivity::class.java)
            editintent.putExtra("checkDate", checkDate)
            startActivity(editintent)
        }
    }
}

7200