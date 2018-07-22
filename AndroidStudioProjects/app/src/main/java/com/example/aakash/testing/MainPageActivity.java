package com.example.aakash.testing;

import android.content.Intent;
import android.speech.RecognizerIntent;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import java.util.ArrayList;
import java.util.Locale;



  import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.RelativeLayout;
public class MainPageActivity extends AppCompatActivity {

    private DrawerLayout mdrawerLayout;
    private ActionBarDrawerToggle mToggle;
    private FirebaseAuth mAuth;

RelativeLayout rellay_timeline, rellay_friends, rellay_chat, rellay_music,
                rellay_gallery, rellay_map, rellay_weather, rellay_settings;

        @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_main_page);

            mAuth = FirebaseAuth.getInstance();

            rellay_timeline = findViewById(R.id.rellay_timeline);
            rellay_friends = findViewById(R.id.rellay_friends);
            rellay_chat = findViewById(R.id.rellay_chat);
            rellay_music = findViewById(R.id.rellay_music);
            rellay_gallery = findViewById(R.id.rellay_gallery);
            rellay_map = findViewById(R.id.rellay_map);
            rellay_weather = findViewById(R.id.rellay_weather);
            rellay_settings = findViewById(R.id.rellay_settings);

            mdrawerLayout = findViewById(R.id.drawer);
            mToggle = new ActionBarDrawerToggle(this,mdrawerLayout,R.string.open,R.string.close);
            mdrawerLayout.addDrawerListener(mToggle);
            mToggle.syncState();
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);



            rellay_timeline.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(MainPageActivity.this, SlidingInfoActivity.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP);
                    startActivity(intent);
                }
            });

            rellay_friends.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(MainPageActivity.this, MagicButtonActivity.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP);
                    startActivity(intent);
                }
            });
            rellay_chat.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(MainPageActivity.this, ChatbotActivity.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP);
                    startActivity(intent);
                }
            });
            rellay_music.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(MainPageActivity.this, FriendsConnectActivity.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP);
                    startActivity(intent);
                }
            });
            rellay_gallery.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(MainPageActivity.this, YoutubeConnectActivity.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP);
                    startActivity(intent);
                }
            });
            rellay_map.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(MainPageActivity.this, CheckPhotosActivity.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP);
                    startActivity(intent);
                }
            });
            rellay_weather.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(MainPageActivity.this, NearByActivity.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP);
                    startActivity(intent);
                }
            });
            rellay_settings.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(MainPageActivity.this, CollapsingInformation.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP);
                    startActivity(intent);
                }
            });
        }


    @Override
    protected void onStart() {
        super.onStart();
        FirebaseUser currentUser = mAuth.getCurrentUser();

        if(currentUser==null)
        {
            Intent i = new Intent(MainPageActivity.this,AuthActivity.class);
            startActivity(i);

        }
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
            if(mToggle.onOptionsItemSelected(item)){
                return true;
            }
        return super.onOptionsItemSelected(item);
    }
}
