package com.example.final2101161

import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.final2101161.databinding.ActivityMainBinding
import com.example.final2101161.model.MyDatabase
import com.example.final2101161.model.MyRecord
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch

class MainActivity : AppCompatActivity() {

    private val binding by lazy {
        ActivityMainBinding.inflate(layoutInflater)
    }


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        binding.savebutton.setOnClickListener{
            val study = binding.studyeditText.text.toString()
            val whattime = when(binding.RadioGroup.checkedRadioButtonId){
                R.id.overhourradioButton -> "1시간 초과"
                R.id.onehourradioButton -> "1시간"
                else -> "1시간 미만"
            }.toString()
        }

        CoroutineScope(Dispatchers.IO).launch {
            val db = MyDatabase.getInstance(this@MainActivity)
            db.myDao().insert(MyRecord(0,study,whattime))
        }
    }
}