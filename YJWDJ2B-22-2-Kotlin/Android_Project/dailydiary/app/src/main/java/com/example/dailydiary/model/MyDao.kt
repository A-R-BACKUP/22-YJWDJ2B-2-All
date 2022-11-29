package com.example.dailydiary.model

import android.content.ContentValues
import androidx.room.Dao
import androidx.room.Delete
import androidx.room.Insert
import androidx.room.OnConflictStrategy
import androidx.room.OnConflictStrategy.*
import androidx.room.Query
import androidx.room.Update

@Dao
interface MyDao {
    @Query("select * from MyRecord order by date desc")
    fun selectAll(): List<MyRecord>

    @Insert(onConflict = OnConflictStrategy.REPLACE)
    suspend fun insert(values: MyRecord)

    @Delete
    suspend fun delete(values: MyRecord)

    @Update()
    suspend fun update(record: MyRecord)
}