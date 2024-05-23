package com.example.capstoneproject

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.capstoneproject.Service.SetAPI
import com.example.capstoneproject.model.RegisterClient
import com.example.capstoneproject.model.User
import com.example.ecouns.Service.SessionManager
import kotlinx.android.synthetic.main.registrasi.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class RegisterActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.registrasi)

        btn_register.setOnClickListener {
            registrasi()
            }


        tv_login.setOnClickListener{
            startActivity(Intent (this, LoginActivity::class.java))
        }
    }

    private fun registrasi() {
        if (et_email1.text.isEmpty()) {
            et_email1.error = "Email coloumn required!"
            et_email1.requestFocus()
            return
        }
        if (et_password1.text.isEmpty()) {
            et_password1.error = "Password coloumn required!"
            et_password1.requestFocus()
            return

        }
        if (et_username1.text.isEmpty()) {
            et_username1.error = "Username coloumn required!"
            et_username1.requestFocus()
            return

        }
        if (et_nama1.text.isEmpty()) {
            et_nama1.error = "Name coloumn required!"
            et_nama1.requestFocus()
            return

        }
        if (et_nomor1.text.isEmpty()) {
            et_nomor1.error = "Number coloumn required!"
            et_nomor1.requestFocus()
            return

        }
        if (et_alamat1.text.isEmpty()) {
            et_alamat1.error = "Address coloumn required!"
            et_alamat1.requestFocus()
            return

        }

        val sessionManager = SessionManager(this)

        SetAPI.instance.registrasi(
            RegisterClient(
                email = et_email1.text.toString(),
                password = et_password1.text.toString(),
                name = et_nama1.text.toString(),
                username = et_username1.text.toString(),
                no_telp = et_nomor1.text.toString(),
                alamat = et_alamat1.text.toString(),
                role = "pelanggan"
            )
        ).enqueue(object : Callback<User> {
            override fun onResponse(call: Call<User>, response: Response<User>) {
                var responseRegister = response.body()
                if (responseRegister != null) {
                    sessionManager.saveAuthToken(responseRegister.token)
                    Toast.makeText(this@RegisterActivity, "Regitrasi Berhasil", Toast.LENGTH_SHORT).show()
                    startActivity(Intent(this@RegisterActivity, LoginActivity::class.java))
                } else {
                    Toast.makeText(this@RegisterActivity, "Registrasi Gagal", Toast.LENGTH_SHORT).show()
                    Log.e("Error", toString(), Throwable())
                }
            }

            override fun onFailure(call: Call<User>, t: Throwable) {
                Toast.makeText(this@RegisterActivity, "Registrasi Gagal", Toast.LENGTH_SHORT).show()
                Log.e("ERROR", t.message.toString())
            }
        })
    }
}