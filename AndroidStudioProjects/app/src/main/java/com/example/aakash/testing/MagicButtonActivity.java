package com.example.aakash.testing;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

import com.spark.submitbutton.SubmitButton;

public class MagicButtonActivity extends AppCompatActivity {
        SubmitButton btnTick;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_magic_button);


        btnTick = findViewById(R.id.btnTick);
    }
}
