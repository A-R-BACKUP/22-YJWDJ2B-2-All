package com.example.dailydiary

import android.annotation.SuppressLint
import java.io.FileInputStream
import java.io.FileOutputStream

import android.view.View
import android.os.Bundle
import android.widget.Button
import android.widget.CalendarView
import android.widget.EditText
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import com.example.dailydiary.databinding.ActivityMainBinding


class MainActivity : AppCompatActivity() {
    lateinit var fname: String
    lateinit var str: String

    private val binding by lazy {
        ActivityMainBinding.inflate(layoutInflater)
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        binding.calendarView.setOnDateChangeListener { view, year, month, dayOfMonth ->
            binding.diaryTextView.visibility = View.VISIBLE
            binding.saveBtn.visibility = View.VISIBLE
            binding.contextEditText.visibility = View.VISIBLE
            binding.diaryContent.visibility = View.INVISIBLE
            binding.updateBtn.visibility = View.INVISIBLE
            binding.deleteBtn.visibility = View.INVISIBLE
            binding.diaryTextView.text = String.format("%d / %d / %d", year, month + 1, dayOfMonth)
            binding.contextEditText.setText("")
            checkDay(year, month, dayOfMonth)
        }

        binding.saveBtn.setOnClickListener {
            saveDiary(fname)
            binding.contextEditText.visibility = View.INVISIBLE
            binding.saveBtn.visibility = View.INVISIBLE
            binding.updateBtn.visibility = View.VISIBLE
            binding.deleteBtn.visibility = View.VISIBLE
            str = binding.contextEditText.text.toString()
            binding.diaryContent.text = str
            binding.diaryContent.visibility = View.VISIBLE
        }
    }

    // 달력 내용 조회, 수정
    fun checkDay(cYear: Int, cMonth: Int, cDay: Int) {
        //저장할 파일 이름설정
        fname = "" + cYear + "-" + (cMonth + 1) + "" + "-" + cDay + ".txt"

        var fileInputStream: FileInputStream
        try {
            fileInputStream = openFileInput(fname)
            val fileData = ByteArray(fileInputStream.available())
            fileInputStream.read(fileData)
            fileInputStream.close()
            str = String(fileData)
            binding.contextEditText.visibility = View.INVISIBLE
            binding.diaryContent.visibility = View.VISIBLE
            binding.diaryContent.text = str
            binding.saveBtn.visibility = View.INVISIBLE
            binding.updateBtn.visibility = View.VISIBLE
            binding.deleteBtn.visibility = View.VISIBLE
            binding.updateBtn.setOnClickListener {
                binding.contextEditText.visibility = View.VISIBLE
                binding.diaryContent.visibility = View.INVISIBLE
                binding.contextEditText.setText(str)
                binding.saveBtn.visibility = View.VISIBLE
                binding.updateBtn.visibility = View.INVISIBLE
                binding.deleteBtn.visibility = View.INVISIBLE
                binding.diaryContent.text = binding.contextEditText.text
            }
            binding.deleteBtn.setOnClickListener {
                binding.diaryContent.visibility = View.INVISIBLE
                binding.updateBtn.visibility = View.INVISIBLE
                binding.deleteBtn.visibility = View.INVISIBLE
                binding.contextEditText.setText("")
                binding.contextEditText.visibility = View.VISIBLE
                binding.saveBtn.visibility = View.VISIBLE
                removeDiary(fname)
            }
            if (binding.diaryContent.text == null) {
                binding.diaryContent.visibility = View.INVISIBLE
                binding.updateBtn.visibility = View.INVISIBLE
                binding.deleteBtn.visibility = View.INVISIBLE
                binding.diaryTextView.visibility = View.VISIBLE
                binding.saveBtn.visibility = View.VISIBLE
                binding.contextEditText.visibility = View.VISIBLE
            }
        } catch (e: Exception) {
            e.printStackTrace()
        }
    }


    // 달력 내용 제거
    @SuppressLint("WrongConstant")
    fun removeDiary(readDay: String?) {
        var fileOutputStream: FileOutputStream
        try {
            fileOutputStream = openFileOutput(readDay, MODE_NO_LOCALIZED_COLLATORS)
            val content = ""
            fileOutputStream.write(content.toByteArray())
            fileOutputStream.close()
        } catch (e: java.lang.Exception) {
            e.printStackTrace()
        }
    }


    // 달력 내용 추가
    @SuppressLint("WrongConstant")
    fun saveDiary(readDay: String?) {
        var fileOutputStream: FileOutputStream
        try {
            fileOutputStream = openFileOutput(readDay, MODE_NO_LOCALIZED_COLLATORS)
            val content = binding.contextEditText.text.toString()
            fileOutputStream.write(content.toByteArray())
            fileOutputStream.close()
        } catch (e: java.lang.Exception) {
            e.printStackTrace()
        }
    }
}