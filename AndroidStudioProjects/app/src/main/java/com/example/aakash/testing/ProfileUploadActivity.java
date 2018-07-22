package com.example.aakash.testing;

import android.annotation.TargetApi;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Build;
import android.os.Environment;
import android.provider.MediaStore;
import android.support.annotation.NonNull;
import android.support.annotation.RequiresApi;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.OnProgressListener;
import com.google.firebase.storage.StorageReference;
import com.google.firebase.storage.UploadTask;
import com.squareup.picasso.Picasso;

import java.io.File;
import java.io.IOException;
import java.util.UUID;

public class ProfileUploadActivity extends AppCompatActivity {
    ImageView imageView;

    Button btnCamera, btnGallery, btnUpload;

    public Uri filepath,uri,downloadUri;

    private final int PICK_IMAGE_REQUEST=71;
    private static final int CAMERA_REQUEST_CODE=1;

    FirebaseStorage storage;
    StorageReference storageReference,mStorage;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile_upload);


        btnCamera =(Button)findViewById(R.id.btnCamera);
        btnGallery =(Button) findViewById(R.id.btnGallery);
        btnUpload=(Button)findViewById(R.id.btnUpload);

        imageView=(ImageView)findViewById(R.id.imageView);

        storage=FirebaseStorage.getInstance();
        storageReference=storage.getReference();

        btnCamera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);

                startActivityForResult(intent,CAMERA_REQUEST_CODE);


            }
        });


        btnGallery.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                chooseImage();
            }


        });


        btnUpload.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                uploadImage();

            }
        });
    }

    private void uploadImage() {


        if(filepath != null)
        {
            final ProgressDialog progressDialog = new ProgressDialog(this);
            progressDialog.setTitle("Uploading...");
            progressDialog.show();

            StorageReference ref = storageReference.child("images/").child(filepath.getLastPathSegment());
            ref.putFile(filepath)
                    .addOnSuccessListener(new OnSuccessListener<UploadTask.TaskSnapshot>() {
                        @Override
                        public void onSuccess(UploadTask.TaskSnapshot taskSnapshot) {
                            progressDialog.dismiss();
                            Toast.makeText(ProfileUploadActivity.this, "Uploaded", Toast.LENGTH_SHORT).show();


                             downloadUri= taskSnapshot.getDownloadUrl();
                            Picasso.get().load(downloadUri).into(imageView);

                            Intent i = new Intent(ProfileUploadActivity.this, LoginPhone.class);
                            i.putExtra("resId",downloadUri.toString());
                            startActivity(i);
                            finish();

                        }
                    }).addOnFailureListener(new OnFailureListener() {
                @Override
                public void onFailure(@NonNull Exception e) {
                    progressDialog.dismiss();
                    Toast.makeText(ProfileUploadActivity.this, "Failed"+e.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }).addOnProgressListener(new OnProgressListener<UploadTask.TaskSnapshot>() {
                @Override
                public void onProgress(UploadTask.TaskSnapshot taskSnapshot) {
                   double progress = (100.0*taskSnapshot.getBytesTransferred()/taskSnapshot.getTotalByteCount());
                    progressDialog.setMessage("Uploading...  "+(int)progress+"%");
                }
            });


        }
    }




    private void chooseImage() {
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent,"Select Picture"),PICK_IMAGE_REQUEST);
        }




        @Override
            protected void onActivityResult(int requestCode, int resultCode, Intent data) {
            super.onActivityResult(requestCode, resultCode, data);

            switch (requestCode){
                case CAMERA_REQUEST_CODE:

                    if(resultCode==RESULT_OK && data !=null && data.getData() !=null)
                    {
                        final ProgressDialog progressDialog = new ProgressDialog(this);
                        progressDialog.setTitle("Uploading...");
                        progressDialog.show();

                         uri=data.getData();
                        StorageReference filepath = storageReference.child("images/").child(uri.getLastPathSegment());

                        filepath.putFile(uri).addOnSuccessListener(new OnSuccessListener<UploadTask.TaskSnapshot>() {
                            @Override
                            public void onSuccess(UploadTask.TaskSnapshot taskSnapshot) {
                                Uri downloadUri = taskSnapshot.getDownloadUrl();
                                Picasso.get().load(downloadUri).into(imageView);

                                progressDialog.dismiss();
                                Toast.makeText(ProfileUploadActivity.this, "Uploaded", Toast.LENGTH_SHORT).show();


                            }
                        }).addOnFailureListener(new OnFailureListener() {
                            @Override
                            public void onFailure(@NonNull Exception e) {
                                progressDialog.dismiss();
                                Toast.makeText(ProfileUploadActivity.this, "Failed"+e.getMessage(), Toast.LENGTH_SHORT).show();

                            }
                        }).addOnProgressListener(new OnProgressListener<UploadTask.TaskSnapshot>() {
                            @Override
                            public void onProgress(UploadTask.TaskSnapshot taskSnapshot) {
                                double progress = (100.0*taskSnapshot.getBytesTransferred()/taskSnapshot.getTotalByteCount());
                                progressDialog.setMessage("Uploading...  "+(int)progress+"%");
                            }
                        });
                    }
                case PICK_IMAGE_REQUEST:

                    if(requestCode==PICK_IMAGE_REQUEST && resultCode==RESULT_OK && data !=null && data.getData() !=null)
                    {
                        filepath=data.getData();
                        try{

                            Bitmap bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(),filepath);
                            imageView.setImageBitmap(bitmap);
                        }
                        catch (IOException e)
                        {
                            e.printStackTrace();
                        }
                    }

            }





    }

   public static  Bitmap decodeSampledBitmapFromFile(String path, int reqWidth, int reqHeight) {

       final BitmapFactory.Options options = new BitmapFactory.Options();
       //Query bitmap without allocating memory
       options.inJustDecodeBounds = true;
       //decode file from path
       BitmapFactory.decodeFile(path, options);
       // Calculate inSampleSize
       // Raw height and width of image
       final int height = options.outHeight;
       final int width = options.outWidth;
       //decode according to configuration or according best match
       options.inPreferredConfig = Bitmap.Config.RGB_565;
       int inSampleSize = 1;
       if (height > reqHeight) {
           inSampleSize = Math.round((float)height / (float)reqHeight);
       }
       int expectedWidth = width / inSampleSize;
       if (expectedWidth > reqWidth) {
           //if(Math.round((float)width / (float)reqWidth) > inSampleSize) // If bigger SampSize..
           inSampleSize = Math.round((float)width / (float)reqWidth);
       }
       //if value is greater than 1,sub sample the original image
       options.inSampleSize = inSampleSize;
       // Decode bitmap with inSampleSize set
       options.inJustDecodeBounds = false;
       return BitmapFactory.decodeFile(path, options);

   }


}


