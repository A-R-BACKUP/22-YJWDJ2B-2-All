package com.example.listpractice

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView
import com.example.listpractice.util.ChatRoomInfo
import java.util.Collections


class ChatAdapter:RecyclerView.Adapter<ChatAdapter.ChatViewHolder>() {

    private var data = mutableListOf<ChatRoomInfo>()

    fun setData(data:MutableList<ChatRoomInfo>){
        this.data = data
        notifyDataSetChanged()
    }

    fun swapItem(from:Int, to:Int){
        Collections.swap(data, from, to)
        notifyItemMoved(from, to)
    }

    fun removeItem(index:Int){
        data.removeAt(index)
        notifyItemRemoved(index)
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ChatViewHolder {
        val view = LayoutInflater.from(parent.context)
            .inflate(R.layout.item_chat_list, parent, false)
        return ChatViewHolder(view)
    }

    override fun onBindViewHolder(holder: ChatViewHolder, position: Int) {
        val item = data[position]
        holder.imageView.setImageResource(item.image)
        holder.textViewName.text = item.name
        holder.textViewTime.text = item.time
    }

    override fun getItemCount(): Int {
        return data.size
    }

    class ChatViewHolder(v: View):RecyclerView.ViewHolder(v){
        val imageView:ImageView = v.findViewById(R.id.imageView)
        val textViewName:TextView = v.findViewById(R.id.textViewName)
        val textViewTime:TextView = v.findViewById(R.id.textViewTime)// item 레이아웃에 있던 위젯의 아이디

    }

}