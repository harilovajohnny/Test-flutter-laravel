import 'dart:convert';

import 'package:dio/dio.dart';
import 'package:http/http.dart' as http;
import 'package:untitled/Service/gobal.dart';

class AuthService{


  static Future<http.Response> insription(String name,String email,String password) async{
    Map data = {
      "name" : name,
      "email" : email,
      "password" : password
    };
    var body = json.encode(data);
    var url = Uri.parse("http://10.0.2.2:8000/api/auth/login_api");
    http.Response response = await http.post(
        url,
        headers: headers,
        body: body
    );
    print(response.body);
    return response;
  }


  static Future<http.Response> Login_authentification(String email,String password) async{
    Map data = {
      "email" : email,
      "password" : password
    };

    print('Request Payload (Before Encoding): $data');

      var body = json.encode(data);
      var url = Uri.parse(baseUrl + 'auth/login_api');
      print(body);  
      http.Response response = await http.post(
          url,
          body: body,
          headers: headers
      );
      return response;
  }

}