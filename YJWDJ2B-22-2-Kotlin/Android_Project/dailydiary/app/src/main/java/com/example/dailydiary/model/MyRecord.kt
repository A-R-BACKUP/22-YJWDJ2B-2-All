package com.example.dailydiary.model

import androidx.room.ColumnInfo
import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity
data class MyRecord(
    @PrimaryKey(autoGenerate = true) val rid:Int,
    val diary:String,
    val time:String
)