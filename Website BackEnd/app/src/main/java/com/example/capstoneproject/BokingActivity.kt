package com.example.capstoneproject

import android.app.DatePickerDialog
import android.app.TimePickerDialog
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import android.widget.ArrayAdapter
import android.widget.DatePicker
import android.widget.Toast
import com.example.capstoneproject.Service.SetAPI
import com.example.capstoneproject.model.Booking
import com.example.capstoneproject.model.BookingClient
import com.example.ecouns.Service.SessionManager
import kotlinx.android.synthetic.main.booking.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.text.SimpleDateFormat
import java.util.*

class BokingActivity : AppCompatActivity() {

    private var tanggal = Calendar.getInstance()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.booking)

        btn_book.setOnClickListener({
            booking()
        })

        tv_dateresult!!.text = "YYYY-MM-DD"

        val tipe = arrayOf("Futsal", "Volley")
        val tipeAdapter = ArrayAdapter(this, android.R.layout.simple_spinner_dropdown_item, tipe)
        option_tipe.adapter = tipeAdapter

        val lapangan = arrayOf(1, 2)
        val lapanganAdapter =
            ArrayAdapter(this, android.R.layout.simple_spinner_dropdown_item, lapangan)
        option_lapangan.adapter = lapanganAdapter


        val DateListener = object : DatePickerDialog.OnDateSetListener {
            override fun onDateSet(view: DatePicker?, year: Int, month: Int, day: Int) {
                tanggal.set(Calendar.YEAR, year)
                tanggal.set(Calendar.MONTH, month)
                tanggal.set(Calendar.DAY_OF_MONTH, day)
                updateDate()
            }
        }

        btn_datepicker!!.setOnClickListener(object : View.OnClickListener {
            override fun onClick(view: View) {
                DatePickerDialog(
                    this@BokingActivity, DateListener,
                    tanggal.get(Calendar.YEAR),
                    tanggal.get(Calendar.MONTH),
                    tanggal.get(Calendar.DAY_OF_MONTH)
                ).show()
            }
        })

        option_mulai.setOnClickListener {
            val calendar = Calendar.getInstance()
            val initialHour = calendar.get(Calendar.HOUR_OF_DAY)
            val initialMinute = calendar.get(Calendar.MINUTE)

            val timePickerDialog = TimePickerDialog(
                this@BokingActivity,
                TimePickerDialog.OnTimeSetListener { _, hourOfDay, minute ->
                    val selectedTime = String.format("%02d:%02d", hourOfDay, minute)
                    option_mulai.text = selectedTime
                },
                initialHour,
                initialMinute,
                true // is24HourView
            )
            timePickerDialog.show()
        }

        option_selesai.setOnClickListener {
            val calendar = Calendar.getInstance()
            val initialHour = calendar.get(Calendar.HOUR_OF_DAY)
            val initialMinute = calendar.get(Calendar.MINUTE)

            val timePickerDialog = TimePickerDialog(
                this@BokingActivity,
                TimePickerDialog.OnTimeSetListener { _, hourOfDay, minute ->
                    val selectedTime = String.format("%02d:%02d", hourOfDay, minute)
                    option_selesai.text = selectedTime
                },
                initialHour,
                initialMinute,
                true // is24HourView
            )
            timePickerDialog.show()
        }


    }


    private fun updateDate() {
        val formatdate = "yyyy-MM-dd"
        val sdf = SimpleDateFormat(formatdate, Locale.US)
        tv_dateresult!!.text = sdf.format(tanggal.time)
    }

    private fun booking(){
        val sessionManager = SessionManager(this)
        if(et_namatim.text.isEmpty()){
            et_namatim.error = "Kolom harus Diisi"
            et_namatim.requestFocus()
        }

        val biaya = 140000
        val waktuMulai = option_mulai.text.toString()
        val waktuSelesai = option_selesai.text.toString()

        SetAPI.instance.booking(
            token = "Bearer ${sessionManager.fetchAuthToken()}",
            BookingClient(
                tim = et_namatim.text.toString(),
                waktu_mulai = waktuMulai,
                waktu_selesai = waktuSelesai,
                tipe = option_tipe.selectedItem.toString(),
                id_lapangan = option_lapangan.selectedItem.toString(),
                biaya = biaya.toString(),
                tanggal = tv_dateresult.text.toString()
            )
        ).enqueue(object : Callback<Booking>{
            override fun onResponse(call: Call<Booking>, response: Response<Booking>) {
                val responBook = response.body()
                if (responBook != null) {
                    intent = Intent(this@BokingActivity, TransaksiActivity::class.java)
                    intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP or Intent.FLAG_ACTIVITY_NEW_TASK)
                    startActivity(intent)
                    Toast.makeText(this@BokingActivity, "Lanjutkan transaksi", Toast.LENGTH_SHORT).show()
                }else{
                        Toast.makeText(this@BokingActivity, "Gagal Tambah Data!", Toast.LENGTH_SHORT).show()
                }
            }

            override fun onFailure(call: Call<Booking>, t: Throwable) {
                Log.e("ERROR",t.message.toString())
            }

        })


    }
}