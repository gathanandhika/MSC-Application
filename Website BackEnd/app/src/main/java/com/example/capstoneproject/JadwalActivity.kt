package com.example.capstoneproject

import android.content.Intent
import android.os.Bundle
import android.util.Log
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.capstoneproject.Service.SetAPI
import com.example.capstoneproject.adapter.AdapterJadwal
import com.example.capstoneproject.model.Booking
import com.example.ecouns.Service.SessionManager
import kotlinx.android.synthetic.main.jadwal.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response



class JadwalActivity : AppCompatActivity() {

    private val list = ArrayList<Booking>()
    private lateinit var adapter: AdapterJadwal

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.jadwal)


        adapter = AdapterJadwal(list)
        rc_jadwal.setHasFixedSize(true)
        rc_jadwal.layoutManager = LinearLayoutManager(this@JadwalActivity)
        rc_jadwal.adapter = adapter

        fetchData()
        navbar()
    }

    private fun fetchData() {
        val sessionManager = SessionManager(this)
        SetAPI.instance.booklist(
            token = "Bearer ${sessionManager.fetchAuthToken()}",
            ).enqueue(object : Callback<kotlin.collections.List<Booking>>{
            override fun onResponse(call: Call<kotlin.collections.List<Booking>>, response: Response<kotlin.collections.List<Booking>>) {
                if (response.isSuccessful) {
                    val bookingList = response.body()
                    if (bookingList != null) {
                        list.clear()
                        list.addAll(bookingList)
                        adapter.notifyDataSetChanged()
                    }
                } else {
                    Log.e("JadwalActivity", "Failed to fetch data: ${response.message()}")
                }
            }

            override fun onFailure(call: Call<kotlin.collections.List<Booking>>, t: Throwable) {
                Log.e("JadwalActivity", "Error while fetching data", t)
            }
        })

    }

    private fun navbar(){
        navberanda3.setOnClickListener{
            startActivity(Intent (this, MainActivity::class.java))
        }

        navjadwal3.setOnClickListener{
            startActivity(Intent(this, JadwalActivity::class.java))
        }

        navinfo3.setOnClickListener{
            startActivity(Intent (this, InformasiActivity::class.java))
        }

        navprofil3.setOnClickListener{
            startActivity(Intent (this, ProfilActivity::class.java))
        }
        navbook3.setOnClickListener{
            intent = Intent(this, BokingActivity::class.java)
            startActivity(intent)
        }
    }
}
