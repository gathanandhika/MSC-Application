package com.example.capstoneproject

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.capstoneproject.Service.SetAPI
import com.example.capstoneproject.adapter.AdapterAdmin
import com.example.capstoneproject.adapter.AdapterRekening
import com.example.capstoneproject.model.AdminClient
import com.example.capstoneproject.model.Rekening
import com.example.ecouns.Service.SessionManager
import kotlinx.android.synthetic.main.activity_bantuan.*
import kotlinx.android.synthetic.main.transaksi.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class BantuanActivity : AppCompatActivity() {

    private val list = ArrayList<AdminClient>()
    private lateinit var adapter: AdapterAdmin

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_bantuan)


        adapter = AdapterAdmin(list)
        rc_admin.setHasFixedSize(true)
        rc_admin.layoutManager = LinearLayoutManager(this@BantuanActivity)
        rc_admin.adapter = adapter

        adminData()

    }


    private fun adminData() {
        val sessionManager = SessionManager(this)
        SetAPI.instance.adminlist(
            token = "Bearer ${sessionManager.fetchAuthToken()}",
        ).enqueue(object : Callback<List<AdminClient>> {
            override fun onResponse(
                call: Call<List<AdminClient>>,
                response: Response<List<AdminClient>>)
            {
                if (response.isSuccessful) {
                    val adminlist = response.body()
                    if (adminlist != null) {
                        list.clear()
                        list.addAll(adminlist)
                        adapter.notifyDataSetChanged()
                    }
                } else {
                    Log.e("BantuanActivity", "Failed to fetch data: ${response.message()}")
                }
            }
            override fun onFailure(call: Call<List<AdminClient>>, t: Throwable) {
                Log.e("BantuanActivity", "Error while fetching data", t)

            }
        })
    }
}