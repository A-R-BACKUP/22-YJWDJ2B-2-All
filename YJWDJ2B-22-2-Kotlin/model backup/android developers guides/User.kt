package com.example.dailydiary.model

import androidx.room.ColumnInfo
import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity
data class User(
    @PrimaryKey val uid: Int,
    @ColumnInfo(name = "writed_date") val writed_date: String?,
    @ColumnInfo(name = "writed_diary") val writed_diary: String?

)