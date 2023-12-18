import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:untitled/Service/auth_service.dart';
import 'package:untitled/page/rounded_button.dart';
import 'package:http/http.dart' as http;

import '../Service/gobal.dart';
import 'accueil.dart';
import 'login.dart';

class Inscription extends StatefulWidget {
  const Inscription({Key? key}):super(key:key);

  @override
  State<Inscription> createState() => _InscriptionState();
}

class _InscriptionState extends State<Inscription> {
  String email = "";
  String _name = "";
  String password = "";

  creationCompte() async{
    Fluttertoast.showToast(
      msg: "Hello, Flutter!",
      toastLength: Toast.LENGTH_SHORT, // Duration for which the toast should be visible
      gravity: ToastGravity.BOTTOM,    // Position of the toast on the screen
      timeInSecForIosWeb: 1,           // Time in seconds for iOS and web (Android uses `toastLength`)
      backgroundColor: Colors.black,
      textColor: Colors.white,
      fontSize: 16.0,
    );

    print('tet test ');
    bool emailvalid = RegExp(
        "").hasMatch(email);
    if(emailvalid){
      http.Response response = await AuthService.insription(_name, email, password);
      Map responseMap = jsonDecode(response.body);
      if(response.statusCode==200){
        Navigator.push(
            context,
            MaterialPageRoute(builder: (BuildContext context)=> const Accueil(),
        ));
      }else{
        errorSnackBar(context, responseMap.values.first[0]);
      }
    }else{
      errorSnackBar(context, "Email invalide");
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
            "Inscription",
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
                hintText: 'Name'
              ),
              onChanged: (value){
               _name = value;
              },
            ),
            const SizedBox(
              height: 30,
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
              decoration: const InputDecoration(
                  hintText: 'Password'
              ),
              onChanged: (value){
                password = value;
              },
            ),
            const SizedBox(
              height: 40,
            ),
            RoundedButton(
              btntext: "Enregistrer",
                clickbutton: ()=> creationCompte()
            ),
            const SizedBox(
              height: 40,
            ),
            GestureDetector(
              onTap: (){
                Navigator.push(context,MaterialPageRoute(builder: (BuildContext context)=> const Login(),
                ));
              },
              child: const Text(
                "Cet email est deja enregistrer",
                style: TextStyle(
                decoration: TextDecoration.underline
                ),
              ),
            )
          ],
        ),
      ),
    );
  }
}
