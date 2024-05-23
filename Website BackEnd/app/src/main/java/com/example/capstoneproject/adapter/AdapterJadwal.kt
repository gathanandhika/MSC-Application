package com.example.capstoneproject.adapter

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.capstoneproject.R
import com.example.capstoneproject.model.Booking
import kotlinx.android.synthetic.main.item_jadwal.view.*

class AdapterJadwal(val list: ArrayList<Booking>) : RecyclerView.Adapter<AdapterJadwal.ViewHolder>() {
    inner class ViewHolder(itemview : View):RecyclerView.ViewHolder(itemview) {
        fun bind(role : Booking){
            with(itemView){
                itemView.itm_namatim.text = role.tim
                itemView.itm_tipe.text = role.tipe
                itemView.itm_tanggal.text = (role.tanggal)
                itemView.itm_mulai.text =  (role.waktu_mulai) + " - "
                itemView.itm_selesai.text = (role.waktu_selesai)
            }
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int) = ViewHolder (
        LayoutInflater.from(parent.context).inflate(R.layout.item_jadwal,parent,false)
    )

    override fun onBindViewHolder(holder: ViewHolder, position: Int) {
        holder.bind(list[position])
    }

    override fun getItemCount() = list.size
}