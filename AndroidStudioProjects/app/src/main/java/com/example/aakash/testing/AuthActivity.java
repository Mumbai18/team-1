package com.example.aakash.testing;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.FirebaseException;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseAuthInvalidCredentialsException;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.auth.PhoneAuthCredential;
import com.google.firebase.auth.PhoneAuthProvider;

import java.util.concurrent.TimeUnit;

public class AuthActivity extends AppCompatActivity {

  private RelativeLayout lock;
  private RelativeLayout phone;

  private EditText etPhone;
  private EditText etLock;

  private ProgressBar pb1;
  private ProgressBar pb2;

  private TextView errorText;

  private Button btn ;

  private FirebaseAuth mAuth;
  public String phone_no;

  private PhoneAuthProvider.OnVerificationStateChangedCallbacks mCallbacks;
  private PhoneAuthProvider.ForceResendingToken mResendToken;
  private String mVerificationId;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_auth);


        lock = (RelativeLayout) findViewById(R.id.lock);
        phone = (RelativeLayout) findViewById(R.id.phone);

        etPhone =(EditText) findViewById(R.id.etPhone);
        etLock =(EditText) findViewById(R.id.etLock);

        pb1 = (ProgressBar) findViewById(R.id.pb1);
        pb2 = (ProgressBar) findViewById(R.id.pb2);

        errorText =(TextView) findViewById(R.id.errorText);

        btn =(Button) findViewById(R.id.btn_send);

        mAuth=FirebaseAuth.getInstance();

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pb1.setVisibility(View.VISIBLE);
                etPhone.setEnabled(false);
                btn.setEnabled(false);

                 phone_no = etPhone.getText().toString();



                PhoneAuthProvider.getInstance().verifyPhoneNumber(
                        phone_no,        // Phone number to verify
                        60,                 // Timeout duration
                        TimeUnit.SECONDS,   // Unit of timeout
                        AuthActivity.this,               // Activity (for callback binding)
                        mCallbacks);
            }
        });


        mCallbacks = new PhoneAuthProvider.OnVerificationStateChangedCallbacks() {
            @Override
            public void onVerificationCompleted(PhoneAuthCredential phoneAuthCredential) {

                signInWithPhoneAuthCredential(phoneAuthCredential);

            }

            @Override
            public void onVerificationFailed(FirebaseException e) {

                errorText.setText("Please Enter A Valid Phone Number");
                errorText.setVisibility(View.VISIBLE);

                if(phone_no.length()==10)
                {
                    etPhone.setEnabled(false);

                }
                else
                {
                    pb1.setEnabled(false);
                    etPhone.setFocusable(true);
                }

            }


            @Override
            public void onCodeSent(String verificationId,
                                   PhoneAuthProvider.ForceResendingToken token) {



                mVerificationId = verificationId;
                mResendToken = token;

              pb1.setVisibility(View.INVISIBLE);
              lock.setVisibility(View.VISIBLE);
              btn.setText("Verify Code");

            }
        };



    }


    private void signInWithPhoneAuthCredential(PhoneAuthCredential credential) {

        mAuth.signInWithCredential(credential)
                .addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        if (task.isSuccessful()) {

                            FirebaseUser user = task.getResult().getUser();

                            Intent i = new Intent(AuthActivity.this,LoginPhone.class);
                            startActivity(i);
                            finish();

                        } else {
                            // Sign in failed, display a message and update the UI
                            errorText.setText("Some Error Occured while logging in");
                            errorText.setVisibility(View.VISIBLE);
                            if (task.getException() instanceof FirebaseAuthInvalidCredentialsException) {
                                // The verification code entered was invalid
                            }
                        }
                    }
                });
    }
}
