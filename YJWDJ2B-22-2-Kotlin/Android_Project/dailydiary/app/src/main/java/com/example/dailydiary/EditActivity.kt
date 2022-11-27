package com.example.dailydiary

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.dailydiary.databinding.EditactivityMainBinding
import com.example.dailydiary.model.MyDatabase
import com.example.dailydiary.model.MyRecord
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import java.time.LocalDateTime

class EditActivity : AppCompatActivity() {
    private lateinit var binding: EditactivityMainBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = EditactivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.diarySavebutton.setOnClickListener{
            var diary = binding.editTextTextMultiLine.text.toString()
            var time = ""

            CoroutineScope(Dispatchers.IO).launch {
                val db = MyDatabase.getInstance(this@EditActivity)
                db.myDao().insert(MyRecord(0, diary, time))
            }
        }
    }
}