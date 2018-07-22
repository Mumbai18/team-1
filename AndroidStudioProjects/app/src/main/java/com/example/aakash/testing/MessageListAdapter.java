//package com.example.aakash.testing;
//
//
//import android.os.Message;
//import android.support.v7.widget.RecyclerView;
////import android.util.Log;
//import android.view.LayoutInflater;
//import android.view.View;
//import android.view.ViewGroup;
//import android.widget.TextView;
//
////import com.google.firebase.auth.FirebaseAuth;
//
//import java.util.ArrayList;
//
///**
// * Created by PANKAJ on 3/13/2018.
// */
//
//public class MessageListAdapter extends RecyclerView.Adapter<MessageListAdapter.MyViewHolder> {
//
//    private ArrayList<Message> dataSet;
//
//    @Override
//    public int getItemViewType(int position) {
//        //  String viewType = dataSet.get(position).getMessageUser();
//        //   Log.d("Pankaj",viewType);
////        if(viewType.equals(FirebaseAuth.getInstance().getUid()))
////        {
////            return  1;
////        }
////        else  {
////            return  2;
////        }
//        return 2;
//    }
//
//    public static class MyViewHolder extends RecyclerView.ViewHolder {
//
//        TextView textViewName,tvr;
//
//        public MyViewHolder(View itemView) {
//            super(itemView);
//            this.textViewName = (TextView) itemView.findViewById(R.id.ctv);
//            this.tvr = (TextView) itemView.findViewById(R.id.ctvUser);
//
//        }
//    }
//
//    public MessageListAdapter(ArrayList<Message> data) {
//        this.dataSet = data;
//    }
//
//    @Override
//    public MyViewHolder onCreateViewHolder(ViewGroup parent,
//                                           int viewType) {
//        if(viewType==1) {
//            View view = LayoutInflater.from(parent.getContext())
//                    .inflate(R.layout.card_view_right, parent, false);
//            MyViewHolder myViewHolder = new MyViewHolder(view);
//            return myViewHolder;
//        }
//        else
//        {
//            View view = LayoutInflater.from(parent.getContext())
//                    .inflate(R.layout.card_view, parent, false);
//            MyViewHolder myViewHolder = new MyViewHolder(view);
//            return myViewHolder;
//        }
//    }
//
//    @Override
//    public void onBindViewHolder(final MyViewHolder holder, final int listPosition) {
//
//        TextView textViewName = holder.textViewName;
//        TextView textView = holder.tvr;
//        textView.setText(" "+dataSet.get(listPosition).getMessageUser());
//        textViewName.setText(" "+dataSet.get(listPosition).getMessageText()+" ");
//
//    }
//
//    @Override
//    public int getItemCount() {
//        return dataSet.size();
//    }
//}