package com.talentum.meyodademo.requests;

import android.net.Uri;
import android.util.Log;
import android.widget.Toast;

import org.apache.http.HttpResponse;
import org.apache.http.HttpStatus;
import org.apache.http.StatusLine;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;

import java.io.ByteArrayOutputStream;
import java.io.IOException;

/**
 * Created by idiez on 4/07/13.
 */
public class HttpRequest {

    private final String server_url = "http://manu.juanlu.is/meyoda/mvc/controller/controller.php?";
    private String request;

    public HttpRequest(String request){
        this.request = request;

    }

    public String make(){
        String answer = "";
        if(request != null){
            HttpClient httpclient = new DefaultHttpClient();
            HttpResponse response = null;
            try {
                response = httpclient.execute(new HttpGet(server_url+request));
            } catch (ClientProtocolException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
            catch (RuntimeException e){
                e.printStackTrace();
            }
            StatusLine statusLine = response.getStatusLine();
            if(statusLine.getStatusCode() == HttpStatus.SC_OK){
                ByteArrayOutputStream out = new ByteArrayOutputStream();
                try {
                    response.getEntity().writeTo(out);
                    out.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
                answer = out.toString();
            }
        }
        return answer;
    }

    public String getRequest() {
        return request;
    }

    public void setRequest(String url) {
        this.request = request;
    }

}
