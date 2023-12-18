import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:untitled/Service/auth_service.dart';
import 'package:untitled/Service/gobal.dart';
import 'package:untitled/page/rounded_button.dart';
import 'package:http/http.dart' as http;

import 'accueil.dart';

class Login extends StatefulWidget {
  const Login({super.key});

  @override
  State<Login> createState() => _LoginState();
}

class _LoginState extends State<Login> {
  String email = "";
  String passwords = "";


    Authentification() async{
      print('tauthe');
      if(email.isNotEmpty && passwords.isNotEmpty){
        http.Response response = await AuthService.Login_authentification(email, passwords);

        Map responseMap = jsonDecode(response.body);
        print(responseMap);
        if(response.statusCode==200){
          Navigator.push(
              context,
              MaterialPageRoute(builder: (BuildContext context)=> const Accueil(),
          ));
        }
        if(response.statusCode==400){
          errorSnackBar(context, responseMap.values.first[0]);
        }
        if(response.statusCode==422){
          errorSnackBar(context, responseMap.values.first[0]);
        }
      }else{
        errorSnackBar(context, "entrer email et mdp");
      }
    }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
          backgroundColor: Colors.black,
          centerTitle: true,
          elevation: 0,
          title: const Text(
            "Login",
            style: TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.bold
            ),)
      ),
      body: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 20),
        child: Column(
          children: [
            const SizedBox(
              height: 20,
            ),
            TextField(
              decoration: const InputDecoration(
                  hintText: 'Email'
              ),
              onChanged: (value){
                email = value;
              },
            ),

            const SizedBox(
              height: 30,
            ),
            TextField(
              obscureText: true,
              decoration: const InputDecoration(
                  hintText: 'Password'
              ),
              onChanged: (value){
                passwords = value;
              },
            ),
            const SizedBox(
              height: 30,
            ),
            RoundedButton(btntext: "Connexion", clickbutton: ()=> Authentification())
          ],
        ),
      ),
    );
  }
}
