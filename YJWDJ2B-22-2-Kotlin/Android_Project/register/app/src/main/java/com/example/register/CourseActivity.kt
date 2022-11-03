package com.example.register

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.register.databinding.ActivityCourseBinding

class CourseActivity : AppCompatActivity() {
    private val binding by lazy { ActivityCourseBinding.inflate(layoutInflater) }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_course)
    }
}