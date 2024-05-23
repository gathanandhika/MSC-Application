package com.example.capstoneproject.model

import com.google.gson.annotations.SerializedName

data class BookingClient(
    @SerializedName("nama_tim")
    var tim : String,

    @SerializedName("waktu_mulai")
    var waktu_mulai : String,

    @SerializedName("waktu_selesai")
    var waktu_selesai : String,

    @SerializedName("tanggal")
    var tanggal : String,

    @SerializedName("id_lapangan")
    var id_lapangan : String,

    @SerializedName("tipe")
    var tipe : String,

    @SerializedName("biaya")
    var biaya : String,

)