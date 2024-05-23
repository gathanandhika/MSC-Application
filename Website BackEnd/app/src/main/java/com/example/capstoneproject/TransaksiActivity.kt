package com.example.capstoneproject

import android.content.Intent
import android.os.Bundle
import android.util.Log
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.capstoneproject.Service.SetAPI
import com.example.capstoneproject.adapter.AdapterJadwal
import com.example.capstoneproject.adapter.AdapterRekening
import com.example.capstoneproject.model.Booking
import com.example.capstoneproject.model.Rekening
import com.example.ecouns.Service.SessionManager
import kotlinx.android.synthetic.main.transaksi.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class TransaksiActivity : AppCompatActivity() {

    private val list = ArrayList<Rekening>()
    private lateinit var adapter: AdapterRekening

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.transaksi)

        btn_konfirmasi.setOnClickListener {
            startActivity(Intent(this@TransaksiActivity, MainActivity::class.java))
        }

        adapter = AdapterRekening(list)
        rc_rekening.setHasFixedSize(true)
        rc_rekening.layoutManager = LinearLayoutManager(this@TransaksiActivity)
        rc_rekening.adapter = adapter

        fetchData()

    }

    private fun fetchData() {
        val sessionManager = SessionManager(this)
        SetAPI.instance.rekeninglist(
            token = "Bearer ${sessionManager.fetchAuthToken()}",
        ).enqueue(object : Callback<List<Rekening>>{
            override fun onResponse(call: Call<List<Rekening>>,
                                    response: Response<List<Rekening>>) {
                if (response.isSuccessful) {
                    val rekeninglist = response.body()
                    if (rekeninglist != null) {
                        list.clear()
                        list.addAll(rekeninglist)
                        adapter.notifyDataSetChanged()
                    }
                } else {
                    Log.e("JadwalActivity", "Failed to fetch data: ${response.message()}")
                }
            }

            override fun onFailure(call: Call<List<Rekening>>, t: Throwable) {
                Log.e("JadwalActivity", "Error while fetching data", t)
            }
        })

    }
}