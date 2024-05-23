package com.example.capstoneproject.model

import com.google.gson.annotations.SerializedName

data class LapanganData(

    @SerializedName("nama_lapangan")
    var nama_lapangan : String,

    @SerializedName("harga_sewa")
    var harga : Int,

    @SerializedName("detail")
    var detail : String,


)
