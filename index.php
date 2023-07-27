<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Control</title>
  <style>
    body {
      text-align: center;
      background-color: rgb(240, 238, 238);
      display: grid;
      justify-content: center;
      position: relative;
    }

    .box {
      border: 2px solid rgb(204, 204, 204);
      border-radius: 10px;
      padding: 20px;
      margin: 20px;
      width: max-content;
    }

    .box2 {
      border: 2px solid rgb(204, 204, 204);
      border-radius: 10px;
      padding: 20px;
      width: 400px;
      margin-left: 30px;
    }

    @media screen (max-width:992px) {
      .box2 {
        width: 3000px;
      }
    }

    @media (max-width: 767px) {
      .box {
        margin-left: 120px;
        padding-right: 0;
        width: max-content;
      }

      .box2 {
        border: #ccc solid 2px;
        border-radius: 10px;
        padding: 20px;
        height: 500px;
        margin-left: 119px;
        width: 400px;
      }
    }

    button {
      padding: 10px 30px;
      margin: 10px;
      background-color: white;
      border: #ccc solid 1px;
      border-radius: 10px;
      cursor: pointer;
    }

    .stop {
      border: 2px solid red;
      background-color: red;
      color: white;
    }

    button {
      padding: 1.3em 3em;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 2.5px;
      font-weight: 500;
      color: #000;
      background-color: #fff;
      border: none;
      border-radius: 45px;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease 0s;
      cursor: pointer;
      outline: none;
    }

    button:hover {
      background-color: red;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      color: #fff;
      transform: translateY(-7px);
      font-weight: bold;
    }

    button:active {
      transform: translateY(-1px);
    }

    .forward {
      width: 160px;
      position: relative;
    }

    .backward {
      width: 160px;
      position: relative;
    }
  </style>
</head>
<body>
  <div class="box">
    <button class="forward" name="forward" value="f" onclick="Forward();saveValue('f');">
      Forward
    </button>
    <div class="center">
      <button class="left" name="left" value="l" onclick="Left();saveValue('l');">
        Left
      </button>
      <button class="stop" name="stop" value="s" onclick="Delete();saveValue('s');">
        Stop
      </button>
      <button class="right" name="right" value="r" onclick="Right();saveValue('r');">
        Right
      </button>
    </div>
    <button class="backward" name="borward" value="b" onclick="Backward();saveValue('b');">
      Backward
    </button>
  </div>
  <canvas class="box2" id="canvas">Your browser does not support the HTML canvas tag.</canvas>
  <script>
    function saveValue(buttonValue) {
      // Connect to the database
      var connection = new XMLHttpRequest();
      connection.open("POST", "http://localhost/reema/Smart%20Methods/file.php");
      connection.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
      );
      connection.send("buttonValue=" + buttonValue);
    }
    var c = document.getElementById("canvas");
    var ctx = c.getContext("2d");
    ctx.lineWidth = "5";
    ctx.strokeStyle = "black"; // Gray path
    var right = false;
    var left = false;
    var basex = 300;
    var basey = 200;
    var lastx = 300;
    var lasty = 200;
    var x;
    var cright = 0;
    var cleft = 0;
    var fragain = 0;
    var flagain = 0;
    function Forward() {
      ctx.moveTo(lastx, lasty);
      basex = lastx;
      basey = lasty;
      var cc = 1 * 10;
      var y = cc;
      y = parseInt(y);
      lasty -= y;
      ctx.lineTo(lastx, lasty);
      ctx.stroke();
      if (fragain == 0 && flagain == 0) {
        const Http = new XMLHttpRequest();
        Http.open(
          "GET",
          "https://reema-jehad.github.io/Robot_panel/?forward=" + "f"
        );
        Http.send();
        console.log("f");
      } else if (fragain >= 1) {
        const Http = new XMLHttpRequest();
        Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?right=" + "r");
        Http.send();
        console.log("r");
      } else if (flagain >= 1) {
        const Http = new XMLHttpRequest();
        Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?left=" + "l");
        Http.send();
        console.log("l");
      }
      fragain = 0;
      flagain = 0;
      cright = 0;
      cleft = 0;
      startBackward = startBackward + 1;
    }
    var bfright = 0;
    var bfleft = 0;
    var startBackward = 0;
    var startBackwardright = 0;
    var startBackwardleft = 0;
    function Backward() {
      ctx.moveTo(lastx, lasty);
      basex = lastx;
      basey = lasty;
      var cc = 1 * 10;
      var y = cc;
      y = parseInt(y);
      lasty += y;
      ctx.lineTo(lastx, lasty);
      ctx.stroke();
      if (startBackward == 0) {
        console.log("b");
      } else if (fragain == 0 && flagain == 0) {
        const Http = new XMLHttpRequest();
        Http.open(
          "GET",
          "https://reema-jehad.github.io/Robot_panel/?forward=" + "f"
        );
        Http.send();
        console.log("f");
      } else if (fragain >= 1) {
        const Http = new XMLHttpRequest();
        Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?left=" + "l");
        Http.send();
        console.log("l");
      } else if (flagain >= 1) {
        const Http = new XMLHttpRequest();
        Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?right=" + "r");
        Http.send();
        console.log("r");
      }
      fragain = 0;
      flagain = 0;
      cright = 0;
      cleft = 0;
      bfright = bfright + 1;
      bfleft = bfleft + 1;
    }
    function Right() {
      basex = lastx;
      basey = lasty;
      var c = 1 * 10;
      var x = c;
      x = parseInt(x);
      lastx += x;
      ctx.lineTo(lastx, lasty);
      ctx.stroke();
      cright = cright + 1;
      if (
        (cright == 1 && bfright == 0) ||
        (startBackward == 0 && startBackwardright == 0)
      ) {
        const Http = new XMLHttpRequest();
        Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?right=" + "r");
        Http.send();
        console.log("r");
      } else if (cright >= 1 && bfright == 0) {
        const Http = new XMLHttpRequest();
        Http.open(
          "GET",
          "https://reema-jehad.github.io/Robot_panel/?forward=" + "f"
        );
        Http.send();
        console.log("f");
      } else if (bfright == 0) {
        const Http = new XMLHttpRequest();
        Http.open(
          "GET",
          "https://reema-jehad.github.io/Robot_panel/?forward=" + "f"
        );
        Http.send();
        console.log("f");
      } else if (bfright >= 1) {
        const Http = new XMLHttpRequest();
        Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?left=" + "l");
        Http.send();
        console.log("l");
      }
      bfright = 0;
      flagain = flagain + 1;
      startBackwardright = startBackwardright + 1;
      startBackward = startBackward + 1;
    }
    function Left() {
      basex = lastx;
      basey = lasty;
      var c = 1 * 10;
      var x = c;
      x = parseInt(x);
      lastx -= x;
      ctx.lineTo(lastx, lasty);
      ctx.stroke();
      cleft = cleft + 1;
      if (
        (cleft == 1 && bfleft == 0) ||
        (startBackward == 0 && startBackwardleft == 0)
      ) {
        const Http = new XMLHttpRequest();
        Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?left=" + "l");
        Http.send();
        console.log("l");
      } else if (cleft >= 1 && bfleft == 0) {
        const Http = new XMLHttpRequest();
        Http.open(
          "GET",
          "https://reema-jehad.github.io/Robot_panel/?forward=" + "f"
        );
        Http.send();
        console.log("f");
      } else if (bfleft == 0) {
        const Http = new XMLHttpRequest();
        Http.open(
          "GET",
          "https://reema-jehad.github.io/Robot_panel/?forward=" + "f"
        );
        Http.send();
        console.log("f");
      } else if (bfleft >= 1) {
        const Http = new XMLHttpRequest();
        Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?right=" + "r");
        Http.send();
        console.log("r");
      }
      fragain = fragain + 1;
      bfleft = 0;
      startBackwardleft = startBackwardleft + 1;
      startBackward = startBackward + 1;
    }
    function Delete() {
      ctx.clearRect(0, 0, c.width, c.height);
      window.location.reload();
      const Http = new XMLHttpRequest();
      Http.open("GET", "https://reema-jehad.github.io/Robot_panel/");
      Http.send();
    }
    function Z() {
      const Http = new XMLHttpRequest();
      Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?z=" + "z");
      Http.send();
    }
    function X() {
      const Http = new XMLHttpRequest();
      Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?x=" + "x");
      Http.send();
    }
    function C() {
      const Http = new XMLHttpRequest();
      Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?c=" + "c");
      Http.send();
    }
    function V() {
      const Http = new XMLHttpRequest();
      Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?v=" + "v");
      Http.send();
    }
    function A() {
      const Http = new XMLHttpRequest();
      Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?a=" + "a");
      Http.send();
    }
    function N() {
      const Http = new XMLHttpRequest();
      Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?n=" + "n");
      Http.send();
    }
    function M() {
      const Http = new XMLHttpRequest();
      Http.open("GET", "https://reema-jehad.github.io/Robot_panel/?m=" + "m");
      Http.send();
    }

  </script>
  <?php
  include("file.php");
  ?>
</body>

</html>