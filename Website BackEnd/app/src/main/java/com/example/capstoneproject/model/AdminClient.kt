package com.example.capstoneproject.model

import com.google.gson.annotations.SerializedName

data class AdminClient(

    @SerializedName("username")
    var username : String,

    @SerializedName("email")
    var email : String,

    @SerializedName("alamat")
    var alamat : String,

    @SerializedName("role")
    var role : String,

    @SerializedName("name")
    var adminname : String,

    @SerializedName("no_telp")
    var notelp : String,


    )
