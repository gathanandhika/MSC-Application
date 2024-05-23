package com.example.capstoneproject.model

import com.google.gson.annotations.SerializedName

data class User(
    @SerializedName("token")
    var token : String
)
