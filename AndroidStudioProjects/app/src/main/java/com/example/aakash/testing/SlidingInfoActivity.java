package com.example.aakash.testing;

import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Html;
import android.widget.LinearLayout;
import android.widget.TextView;

public class SlidingInfoActivity extends AppCompatActivity {

    private ViewPager viewPager;
    private LinearLayout linearLayout;

    private TextView[] mdots;

    private SliderAdapter sliderAdapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sliding_info);

        viewPager =(ViewPager)findViewById(R.id.slideViewPager);
        linearLayout=(LinearLayout)findViewById(R.id.dotsLayout);

        sliderAdapter = new SliderAdapter(this);

        viewPager.setAdapter(sliderAdapter);

        addDotsIndicator(0);

        viewPager.addOnPageChangeListener(viewListener);
    }

    public  void addDotsIndicator(int position){

        mdots=new TextView[3];
        linearLayout.removeAllViews();
        for(int i=0;i<mdots.length;i++)
        {
            mdots[i]=new TextView(this);
            mdots[i].setText(Html.fromHtml("&#8226;"));
            mdots[i].setTextSize(35);
            mdots[i].setTextColor(getResources().getColor(R.color.white));

            linearLayout.addView(mdots[i]);


        }

        if(mdots.length>0)
        {
            mdots[position].setTextColor(getResources().getColor(R.color.yellow));
            mdots[position].setTextSize(55);
        }

    }

    ViewPager.OnPageChangeListener viewListener = new ViewPager.OnPageChangeListener() {
        @Override
        public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {

        }

        @Override
        public void onPageSelected(int position) {
            addDotsIndicator(position);
        }

        @Override
        public void onPageScrollStateChanged(int state) {

        }
    };
}
