package com.example.capstoneproject.adapter

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.capstoneproject.R
import com.example.capstoneproject.model.AdminClient
import com.example.capstoneproject.model.Rekening
import kotlinx.android.synthetic.main.item_admin.view.*
import kotlinx.android.synthetic.main.item_rekening.view.*

class AdapterAdmin (val listadmin: ArrayList<AdminClient>) : RecyclerView.Adapter<AdapterAdmin.ViewHolder>(){
    inner class ViewHolder(itemview : View): RecyclerView.ViewHolder(itemview) {
        fun bind(role : AdminClient){
            with(itemView){
                itemView.itm_namaadmin.text = role.adminname
                itemView.itm_nohp.text = role.notelp
            }
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int) = ViewHolder (
        LayoutInflater.from(parent.context).inflate(R.layout.item_admin,parent,false)
    )

    override fun onBindViewHolder(holder: ViewHolder, position: Int) {
        holder.bind(listadmin[position])
    }

    override fun getItemCount() = listadmin.size
}