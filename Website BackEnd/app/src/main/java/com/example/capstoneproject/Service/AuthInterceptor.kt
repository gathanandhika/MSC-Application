package com.example.ecouns.Service

import android.content.Context
import okhttp3.Interceptor
import okhttp3.Response

class AuthInterceptor(context: Context) : Interceptor{
    private val sessionManager = SessionManager(context)

    override fun intercept(chain: Interceptor.Chain): Response {
        val requestBulider = chain.request().newBuilder()

//        if token has been save, add it to request
        sessionManager.fetchAuthToken()?.let {
            requestBulider.addHeader("Authorization", "Bearer $it")
        }
        return  chain.proceed(requestBulider.build())
    }
}