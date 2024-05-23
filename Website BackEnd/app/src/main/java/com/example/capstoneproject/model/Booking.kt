package com.example.capstoneproject.model

import com.google.gson.annotations.SerializedName

data class Booking(
    @SerializedName("nama_tim")
    var tim : String,

    @SerializedName("waktu_mulai")
    var waktu_mulai : String,

    @SerializedName("waktu_selesai")
    var waktu_selesai : String,

    @SerializedName("tanggal")
    var tanggal : String,

    @SerializedName("id_lapangan")
    var id_lapangan : Int,

    @SerializedName("tipe")
    var tipe : String,

    @SerializedName("biaya")
    var biaya : String,

    @SerializedName("status")
    var status : String,

    @SerializedName("id_pengguna")
    var id_pengguna : Int,


)
