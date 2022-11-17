package com.example.myrecoder

import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.annotation.RequiresApi
import com.example.myrecoder.databinding.ActivityMainBinding
import com.example.myrecorder.model.MyDatabase
import com.example.myrecorder.model.MyRecord
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import java.time.LocalDate
import java.time.LocalDateTime

class MainActivity : AppCompatActivity() {

    private val binding by lazy {
        ActivityMainBinding.inflate(layoutInflater)
    }

    @RequiresApi(Build.VERSION_CODES.O)
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        binding.buttonRecord.setOnClickListener{
            val food = binding.editTextFoodName.text.toString()
            val time = LocalDateTime.now().toString()

            CoroutineScope(Dispatchers.IO).launch {
                val db = MyDatabase.getInstance(this@MainActivity)
                db.myDao().insert(MyRecord(0,food,time))
            }
        }
    }
}