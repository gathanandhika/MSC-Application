package com.example.capstoneproject.adapter

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.capstoneproject.R
import com.example.capstoneproject.model.Rekening
import kotlinx.android.synthetic.main.item_jadwal.view.*
import kotlinx.android.synthetic.main.item_rekening.view.*

class AdapterRekening (val listrekening: ArrayList<Rekening>) : RecyclerView.Adapter<AdapterRekening.ViewHolder>(){
    inner class ViewHolder(itemview : View):RecyclerView.ViewHolder(itemview) {
        fun bind(role : Rekening){
            with(itemView){
                itemView.itm_bank.text = role.bank
                itemView.itm_norek.text = role.norek
                itemView.itm_an.text = (role.an)
            }
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int) = ViewHolder (
        LayoutInflater.from(parent.context).inflate(R.layout.item_rekening,parent,false)
    )

    override fun onBindViewHolder(holder: ViewHolder, position: Int) {
        holder.bind(listrekening[position])
    }

    override fun getItemCount() = listrekening.size
}