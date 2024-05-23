package com.example.capstoneproject

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import com.example.capstoneproject.Service.SetAPI
import com.example.capstoneproject.model.User
import com.example.capstoneproject.model.UserData
import com.example.ecouns.Service.SessionManager
import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.activity_profile.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ProfilActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_profile)

        profiluser()
        navbar()
        option()


    }


    private fun navbar(){
        navberanda2.setOnClickListener{
            startActivity(Intent (this, MainActivity::class.java))
        }

        navjadwal2.setOnClickListener{
            startActivity(Intent(this, JadwalActivity::class.java))
        }

        navinfo2.setOnClickListener{
            startActivity(Intent (this, InformasiActivity::class.java))
        }

        navprofil2.setOnClickListener{
            startActivity(Intent (this, ProfilActivity::class.java))
        }
        navbook2.setOnClickListener{
            intent = Intent(this@ProfilActivity, BokingActivity::class.java)
            startActivity(intent)
        }
    }


    private fun profiluser(){
        val sessionManager = SessionManager(this)
        SetAPI.instance.profile(token = "Bearer ${sessionManager.fetchAuthToken()}"
        ).enqueue(object : Callback<UserData> {
            override fun onResponse(call: Call<UserData>, response: Response<UserData>) {
                val response = response.body()!!
                tv_notelp1.text = response.nohp
                tv_username.text = response.username
                tv_name.text = response.name
                tv_notelp.text = response.nohp
                tv_user.text = response.email
                tv_alamat.text = response.alamat
                tv_email.text = response.username
            }

            override fun onFailure(call: Call<UserData>, t: Throwable) {
                TODO("Not yet implemented")
            }

        })
    }

    private fun option(){
        editprofil1.setOnClickListener{
            Toast.makeText(this@ProfilActivity,"Belum Berfungsi",Toast.LENGTH_SHORT).show()
        }

        option_editprofile.setOnClickListener{
            Toast.makeText(this@ProfilActivity,"Belum Berfungsi",Toast.LENGTH_SHORT).show()
        }

        option_history.setOnClickListener{
            startActivity(Intent(this@ProfilActivity,RiwayatActivity::class.java))
        }

        option_bantuan.setOnClickListener{
            startActivity(Intent(this@ProfilActivity,BantuanActivity::class.java))
        }

        option_policy.setOnClickListener{
            startActivity(Intent(this@ProfilActivity,KebijakanActivity::class.java))
        }

        opsilogout.setOnClickListener{
            Toast.makeText(this@ProfilActivity,"Belum Berfungsi",Toast.LENGTH_SHORT).show()
        }
    }


}