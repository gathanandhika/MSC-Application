package com.example.capstoneproject.Service

import com.example.capstoneproject.model.*
import retrofit2.Call
import retrofit2.http.*

interface APIService {
    @FormUrlEncoded
    @POST("login")
    fun login(
        @Field("email") email: String,
        @Field("password") password:String
    ): Call<LoginClient>

    @POST ("registrasi")
    fun registrasi(@Body request: RegisterClient
    ): Call<User>

    @POST ("booking/create")
    fun booking(
        @Header("Authorization") token: String?,
        @Body request: BookingClient
    ): Call<Booking>

    @GET ("booking/get")
    fun booklist(
        @Header("Authorization") token: String?,
    ):Call<List<Booking>>

    @GET ("rekening/get")
    fun rekeninglist(
        @Header("Authorization") token: String?,
    ):Call<List<Rekening>>

    @GET ("user/get")
    fun profile(
        @Header("Authorization") token: String?,
    ):Call<UserData>

    @GET ("lapangan/msc1")
    fun msc1(
        @Header("Authorization") token: String?,
    ):Call<LapanganData>

    @GET ("lapangan/msc2")
    fun msc2(
        @Header("Authorization") token: String?,
    ):Call<LapanganData>

    @GET ("user/admin")
    fun adminlist(
        @Header("Authorization") token: String?,
    ):Call<List<AdminClient>>


}