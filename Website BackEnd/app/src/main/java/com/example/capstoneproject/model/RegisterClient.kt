package com.example.capstoneproject.model

import com.google.gson.annotations.SerializedName

data class RegisterClient(
    @SerializedName("email")
    var email : String,

    @SerializedName("password")
    var password : String,

    @SerializedName("name")
    var name : String,

    @SerializedName("username")
    var username : String,

    @SerializedName("no_telp")
    var no_telp : String,

    @SerializedName("alamat")
    var alamat : String,

    @SerializedName("role")
    var role : String,
)
