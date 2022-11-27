package com.example.final2101161.model

import androidx.room.ColumnInfo
import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity
data class MyRecord(
    @PrimaryKey(autoGenerate = true) val rid:Int,
    val study:String,
    val whattime:String
)