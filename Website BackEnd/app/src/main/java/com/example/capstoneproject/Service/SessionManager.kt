package com.example.ecouns.Service

import android.content.Context
import android.content.SharedPreferences

class `SessionManager`(context: Context) {
    private var prefs : SharedPreferences =context.getSharedPreferences("capstoneproject", Context.MODE_PRIVATE)

    companion object{
        const val USER_TOKEN = "user_token"
    }

    //function to save auth token
    fun saveAuthToken(token: String?){
        val editor = prefs.edit()
        editor.putString(USER_TOKEN, token)
        editor.apply()
    }

    //function to fetch auth token
    fun fetchAuthToken(): String? {
        return prefs.getString(USER_TOKEN, null)
    }
}