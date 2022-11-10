package com.example.listpractice

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.AbsListView.RecyclerListener
import android.widget.Toast
import androidx.recyclerview.widget.ItemTouchHelper
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.example.listpractice.databinding.ActivityMainBinding
import com.example.listpractice.util.DataGenerator

class MainActivity : AppCompatActivity() {
    private val binding by lazy{
        ActivityMainBinding.inflate(layoutInflater)
    }

    private val adapter = ChatAdapter()

    private val itemTouchCallback =
        object:ItemTouchHelper.SimpleCallback(
            ItemTouchHelper.UP or ItemTouchHelper.DOWN,
            ItemTouchHelper.LEFT
        ){
            override fun onMove(
                recyclerView: RecyclerView,
                viewHolder: RecyclerView.ViewHolder,
                target: RecyclerView.ViewHolder
            ): Boolean {
                adapter.swapItem(viewHolder.layoutPosition, target.layoutPosition)
                return true
            }

            override fun onSwiped(viewHolder: RecyclerView.ViewHolder, direction: Int) {
                adapter.removeItem(viewHolder.layoutPosition)
            }
        }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        val manager = LinearLayoutManager(this)
        binding.recyclerView.layoutManager = manager
        binding.recyclerView.adapter = adapter

        adapter.setListener(ChatAdapter.OnItemClickListener {
            Toast.makeText(this@MainActivity,
            it.toString(), Toast.LENGTH_SHORT).show()

            val chatRoomInfo = adapter.getItem(it)
            if(chatRoomInfo!=null){
                val intent = Intent(this, RoomActivity::class.java).apply {
                    putExtra("name", chatRoomInfo.name)
                }
                startActivity(intent)
            }
        })

        binding.buttonRandom.setOnClickListener {
            val data = DataGenerator.get()
            adapter.setData(data)
        }
//        val data = DataGenerator.get()
//        data.forEach { Log.d("ListPractice", it.toString()) }
    }
}