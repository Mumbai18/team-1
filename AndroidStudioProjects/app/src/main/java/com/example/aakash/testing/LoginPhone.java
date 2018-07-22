package com.example.aakash.testing;

import android.content.Intent;
import android.net.Uri;
import android.speech.RecognizerIntent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.Locale;

public class LoginPhone extends AppCompatActivity {

    private FirebaseAuth mAuth;
    private Button mLogout;

    private ImageView imageView;

    private ImageButton speakName;

    public EditText etUserName, etPassword;

    private Button btn_login,btn_signup,btn_google,btn_fb;
    private String resId;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login_phone);

        mAuth = FirebaseAuth.getInstance();
        // mLogout = (Button)findViewById(R.id.btnLogout);

//        mLogout.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                mAuth.signOut();
//                Intent i = new Intent(MainPageActivity.this,AuthActivity.class);
//                startActivity(i);
//            }
//        });


        imageView = (ImageView)findViewById(R.id.imageView);

        speakName =(ImageButton)findViewById(R.id.speakName);


        btn_login =(Button)findViewById(R.id.btn_login);
        btn_signup =(Button)findViewById(R.id.btn_signup);
        btn_google =(Button)findViewById(R.id.btn_google);
        btn_fb =(Button)findViewById(R.id.btn_fb);







        speakName.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(RecognizerIntent.ACTION_RECOGNIZE_SPEECH);
                intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_MODEL, RecognizerIntent.LANGUAGE_MODEL_FREE_FORM);
                intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE, Locale.getDefault());

                if (intent.resolveActivity(getPackageManager()) != null) {
                    startActivityForResult(intent, 10);
                } else {
                    Toast.makeText(LoginPhone.this, "Your Device Don't Support Speech Input", Toast.LENGTH_SHORT).show();
                }
            }
        });

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(LoginPhone.this,MainPageActivity.class);
                startActivity(i);
                finish();

            }
        });

        btn_signup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(LoginPhone.this,MainPageActivity.class);
                startActivity(i);
                finish();
            }
        });
        btn_google.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(LoginPhone.this,MainPageActivity.class);
                startActivity(i);
                finish();
            }
        });
        btn_fb.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(LoginPhone.this,MainPageActivity.class);
                startActivity(i);
                finish();
            }
        });

        imageView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(LoginPhone.this,ProfileUploadActivity.class);
                startActivity(i);
                finish();
            }
        });


        Bundle bundle = getIntent().getExtras();
        if(bundle!=null)
        {

            resId = bundle.getString("resId");
            Uri downloadUri = Uri.parse(resId);
            Picasso.get().load(downloadUri).into(imageView);
        }


    }





    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        etUserName =(EditText)findViewById(R.id.etUsername);
        etPassword=(EditText)findViewById(R.id.etPassword);
        switch (requestCode) {
            case 10:
                if (resultCode == RESULT_OK && data != null) {
                    ArrayList<String> result = data.getStringArrayListExtra(RecognizerIntent.EXTRA_RESULTS);
                    etUserName.setText(result.get(0));

                }
                break;
        }
    }

}
