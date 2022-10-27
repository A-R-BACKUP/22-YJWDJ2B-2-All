package com.example.register

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.text.Editable
import android.text.TextWatcher
import android.util.Log
import android.widget.EditText
import com.example.register.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity(){
    private val binding:ActivityMainBinding by lazy{
        ActivityMainBinding.inflate(layoutInflater)
    }

    private fun updateWidgets(){
        var progress=0
        if(binding.editTextTextPersonName.text.isNotEmpty())
            progress++
        if(binding.editTextPhone.text.isNotEmpty())
            progress++
        // check radio - 선택된 버튼이 없을 때 -1
        if(binding.radioGroup.checkedRadioButtonId > -1)
            progress++
        if(binding.checkBoxEURA.isChecked)
            progress++

        binding.progressBar.progress = progress
        binding.buttonApply.isEnabled = progress==binding.progressBar.max
    }

    private val textWatcher:TextWatcher = object:TextWatcher{
        override fun beforeTextChanged(s: CharSequence?, start: Int, count: Int, after: Int) {}
        override fun onTextChanged(s: CharSequence?, start: Int, before: Int, count: Int) {}
        override fun afterTextChanged(s: Editable?) {
            updateWidgets()
        }
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        binding.progressBar.max=4

        binding.editTextTextPersonName.addTextChangedListener(textWatcher)
        binding.editTextPhone.addTextChangedListener(textWatcher)

        binding.radioGroup.setOnCheckedChangeListener { _, _ ->  updateWidgets()}
        binding.checkBoxEURA.setOnClickListener { updateWidgets() }
    }
}