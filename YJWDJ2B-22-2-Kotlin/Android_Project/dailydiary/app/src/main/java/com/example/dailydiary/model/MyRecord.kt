package com.example.dailydiary.model

import androidx.room.ColumnInfo
import androidx.room.Entity
import androidx.room.Index
import androidx.room.PrimaryKey

@Entity(indices = [Index(value = ["date"], unique = true)])
data class MyRecord(
    @PrimaryKey(autoGenerate = true)
    val rid:Int,
    val date:String,
    val diary:String
)