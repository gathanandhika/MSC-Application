package com.example.capstoneproject

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.capstoneproject.Service.SetAPI
import com.example.capstoneproject.model.LapanganData
import com.example.capstoneproject.model.UserData
import com.example.ecouns.Service.SessionManager
import kotlinx.android.synthetic.main.activity_profile.*
import kotlinx.android.synthetic.main.msc1.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class Msc1Activity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.msc1)

        datalapangan()

    }

    private fun datalapangan(){
        val sessionManager = SessionManager(this)
        SetAPI.instance.msc1(token = "Bearer ${sessionManager.fetchAuthToken()}"
        ).enqueue(object : Callback<LapanganData> {
            override fun onResponse(call: Call<LapanganData>, response: Response<LapanganData>) {
                val response = response.body()!!
                tvlap1nama.text = response.nama_lapangan
                tvlap1harga.text = "Harga   : " +response.harga.toString()
                tvlap1detail.text = "Alamat :" +response.detail
            }

            override fun onFailure(call: Call<LapanganData>, t: Throwable) {
                TODO("Not yet implemented")
            }


        })
    }
}