package com.example.dailydiary

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.dailydiary.databinding.EditactivityMainBinding
import com.example.dailydiary.model.MyDatabase
import com.example.dailydiary.model.MyRecord
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import java.time.LocalDateTime

// 진짜 정신 없다;;

class EditActivity : AppCompatActivity() {
    private var myDatabase : MyDatabase? = null
    private lateinit var binding: EditactivityMainBinding

//    private fun onSave(){
//        with(sharedPreferences().edit()){
//            val diary = binding.editTextTextMultiLine.text.toString()
//            if(diary.isNotEmpty()) {
//                this.putString("diary", diary)
//                val date = intent.getStringExtra("checkDate").toString()
//                this.putString("date", date)
//                this.apply()
//                CoroutineScope(Dispatchers.IO).launch {
//                    val db = MyDatabase.getInstance(this@EditActivity)
//                    db.myDao().insert(MyRecord(0, date, diary))
//                }
//            }
//        }
//    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = EditactivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        myDatabase = MyDatabase.getInstance(this)

        // 일기 저장 및 메인 액티비티로 돌아가기.
        binding.diarySavebutton.setOnClickListener{
            val diary = binding.editTextTextMultiLine.text.toString()
            val date = intent.getStringExtra("checkDate").toString()

            CoroutineScope(Dispatchers.IO).launch {
                val db = MyDatabase.getInstance(this@EditActivity)
                db.myDao().insert(MyRecord(0, date, diary))
            }

            val gotoMain = Intent(this, MainActivity::class.java)
            startActivity(gotoMain)
        }

        binding.deletebutton.setOnClickListener{

            val date = intent.getStringExtra("checkDate").toString()

            CoroutineScope(Dispatchers.IO).launch {
                val db = MyDatabase.getInstance(this@EditActivity)
                db.myDao().delete(MyRecord(0, date, diary))
            }

            val gotoMain = Intent(this, MainActivity::class.java)
            startActivity(gotoMain)
        }
    }
}