package com.example.aakash.testing;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import java.util.Timer;
import java.util.TimerTask;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


            new Timer().schedule(new TimerTask() {
                @Override
                public void run() {
                    Intent intent = new Intent(MainActivity.this,MainPageActivity.class);
                    startActivity(intent);


                }
            }, 500);






    }
}
