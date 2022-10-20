package com.example.register

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.text.TextWatcher
import com.example.register.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity(), TextWatcher() {
    private val binding: ActivityMainBinding by lazy {
        ActivityMainBinding.inflate(layoutInflater)
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)
        binding.editTextTextPersonName.addTextChangedListener(this)
    }
}