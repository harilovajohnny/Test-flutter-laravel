import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class RoundedButton extends StatelessWidget {
  final String btntext;
  final Function clickbutton;

  const RoundedButton(
      {super.key, required this.btntext, required this.clickbutton});

  @override
  Widget build(BuildContext context) {
    return Material(
      elevation: 5,
      color: Colors.black,
      borderRadius: BorderRadius.circular(30),
      child: MaterialButton(
        onPressed: (){
          clickbutton();
        },
        minWidth: 320,
        height: 60,
        child: Text(
          btntext,
          style: const TextStyle(color: Colors.white,fontSize: 20),
        ),
      ),
    );
  }
}
