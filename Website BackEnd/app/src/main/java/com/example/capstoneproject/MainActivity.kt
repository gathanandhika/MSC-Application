package com.example.capstoneproject

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.capstoneproject.Service.SetAPI
import com.example.capstoneproject.model.UserData
import com.example.ecouns.Service.SessionManager
import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.activity_profile.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)


        profiluser()
        navbar()
        opsi()

    }


    private fun profiluser(){
        val sessionManager = SessionManager(this)
        SetAPI.instance.profile(token = "Bearer ${sessionManager.fetchAuthToken()}"
        ).enqueue(object : Callback<UserData> {
            override fun onResponse(call: Call<UserData>, response: Response<UserData>) {
                val response = response.body()!!
                main_name.text = response.username
            }

            override fun onFailure(call: Call<UserData>, t: Throwable) {
                TODO("Not yet implemented")
            }

        })
    }

    private fun navbar(){
        navberanda1.setOnClickListener{
            startActivity(Intent (this, MainActivity::class.java))
        }

        navjadwal1.setOnClickListener{
            startActivity(Intent(this, JadwalActivity::class.java))
        }

        navinfo1.setOnClickListener{
            startActivity(Intent (this, InformasiActivity::class.java))
        }

        navprofil1.setOnClickListener{
            startActivity(Intent (this, ProfilActivity::class.java))
        }
        navbook1.setOnClickListener{
            intent = Intent(this@MainActivity, BokingActivity::class.java)
            startActivity(intent)
        }
    }

    private fun opsi(){
        opsibook.setOnClickListener{
            intent = Intent(this@MainActivity, BokingActivity::class.java)
            startActivity(intent)
        }

        opsijadwal.setOnClickListener{
            startActivity(Intent(this, JadwalActivity::class.java))
        }

        opsiinfo.setOnClickListener{
            startActivity(Intent (this, InformasiActivity::class.java))
        }

        opsiprofile.setOnClickListener{
            startActivity(Intent (this, ProfilActivity::class.java))
        }

        opsimf1.setOnClickListener{
            startActivity(Intent(this, Msc1Activity::class.java))
        }

        opsimf2.setOnClickListener{
            startActivity(Intent(this, Msc2Activity::class.java))
        }
    }

}