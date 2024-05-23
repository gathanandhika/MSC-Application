package com.example.capstoneproject.model

import com.google.gson.annotations.SerializedName

data class Rekening(

    @SerializedName("no_rekening")
    var norek : String,

    @SerializedName("atas_nama")
    var an : String,

    @SerializedName("nama_bank")
    var bank : String,

)
