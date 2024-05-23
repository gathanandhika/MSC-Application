package com.example.capstoneproject

import android.content.Intent
import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.capstoneproject.Service.SetAPI
import com.example.capstoneproject.model.LoginClient
import com.example.ecouns.Service.SessionManager
import kotlinx.android.synthetic.main.login.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class LoginActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.login)

        btn_login.setOnClickListener{
            loginAPI()
        }

        txt_daftar.setOnClickListener{
            startActivity(Intent (this, RegisterActivity::class.java))
        }
    }

    private fun loginAPI() {
        if(edt_email.text.isEmpty()){
            edt_email.error = "Email coloumn required!"
            edt_email.requestFocus()
            return
        }
        if(edt_password.text.isEmpty()){
            edt_password.error = "Password coloumn required!"
            edt_password.requestFocus()
            return
        }

        val sessionManager = SessionManager(this)
        SetAPI.instance.login(edt_email.text.toString(),edt_password.text.toString())
            .enqueue(object : Callback<LoginClient>{
                override fun onResponse(
                    call: Call<LoginClient>,
                    response: Response<LoginClient>
                ) {
                    var respon = response.body()!!
                    if(respon.Success == 1){
                        sessionManager.saveAuthToken(respon.token)
                       var intent = Intent(this@LoginActivity, MainActivity::class.java)
                        intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP or Intent.FLAG_ACTIVITY_NEW_TASK)
                        startActivity(intent)
                        Toast.makeText(this@LoginActivity,"Welcome to MahendrikSC APP",Toast.LENGTH_SHORT).show()
                    }
                }

                override fun onFailure(call: Call<LoginClient>, t: Throwable) {
                    Toast.makeText(this@LoginActivity,"Login Failed\n"+ t.message,Toast.LENGTH_SHORT).show()
                }

            })
    }
}