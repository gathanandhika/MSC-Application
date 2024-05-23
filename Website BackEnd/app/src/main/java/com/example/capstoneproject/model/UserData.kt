package com.example.capstoneproject.model

import com.google.gson.annotations.SerializedName

data class UserData(

    @SerializedName("username")
    var username : String,

    @SerializedName("name")
    var name : String,

    @SerializedName("no_telp")
    var nohp : String,

    @SerializedName("email")
    var email : String,

    @SerializedName("alamat")
    var alamat : String,


)
