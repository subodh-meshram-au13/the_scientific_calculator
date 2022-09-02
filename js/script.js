
var display = document.getElementById("display");
var buttons = document.getElementsByClassName("button");
var historyData=[];
var expressionData="";
var resultData="";

  Array.prototype.forEach.call(buttons, function(button) {
  button.addEventListener("click", function() {
    if (button.textContent != "=" && 
    button.textContent != "C" && 
    button.textContent != "x" && 
    button.textContent != "÷" && 
    button.textContent != "√" && 
    button.textContent != "x ²" && 
    button.textContent != "%" && 
    button.textContent != "⌫" && 
    button.textContent != "±" && 
    button.textContent != "sin" && 
    button.textContent != "cos" && 
    button.textContent != "tan" && 
    button.textContent != "log" && 
    button.textContent != "ln" && 
    button.textContent != "x^" && 
    button.textContent != "x !" && 
    button.textContent != "π" && 
    button.textContent != "e" && 
    button.textContent != "rad" 
    && button.textContent != "∘") {
      display.value += button.textContent;
      expressionData = display.value;
      //console.log(expressionData);
    } else if (button.textContent === "=") {
      equals();
    } else if (button.textContent === "C") {
      clear();
    } else if (button.textContent === "x") {
      multiply();
    } else if (button.textContent === "÷") {
      divide();
    } else if (button.textContent === "±") {
      plusMinus();
    } else if (button.textContent === "⌫") {
      backspace();
    } else if (button.textContent === "%") {
      percent();
    } else if (button.textContent === "π") {
      pi();
    } else if (button.textContent === "x ²") {
      square();
    } else if (button.textContent === "√") {
      squareRoot();
    } else if (button.textContent === "sin") {
      sin();
    } else if (button.textContent === "cos") {
      cos();
    } else if (button.textContent === "tan") {
      tan();
    } else if (button.textContent === "log") {
      log();
    } else if (button.textContent === "ln") {
      ln();
    } else if (button.textContent === "x^") {
      exponent();
    } else if (button.textContent === "x !") {
      factorial();
    } else if (button.textContent === "e") {
      exp();
    } else if (button.textContent === "rad") {
      radians();
    } else if (button.textContent === "∘") {
      degrees();
    }
  });
});


function syntaxError() {
  if (eval(display.value) == SyntaxError || eval(display.value) == ReferenceError || eval(display.value) == TypeError) {
    display.value == "Syntax Error";
  }
}


function equals() {
  if ((display.value).indexOf("^") > -1) {
    var base = (display.value).slice(0, (display.value).indexOf("^"));
    var exponent = (display.value).slice((display.value).indexOf("^") + 1);
    display.value = eval("Math.pow(" + base + "," + exponent + ")");
    resultData=display.value;
    historyData.push({"expression":expressionData,"result":resultData})
    showlogdata();
    resultData={};
    expressionData={};

  } else {
    display.value = eval(display.value)
    resultData=display.value;
    historyData.push({"expression":expressionData,"result":resultData})
    showlogdata();
    resultData={};
    expressionData={}; 
  
   
    $.ajax({
          url:"js/readJson.php",
          mehtod:"POST",
          data:{ historyData: JSON.stringify(historyData)},
                   success:function(res){
                  
                  
                   for(var key in historyData){
                            var operator =""+historyData[key]["expression"] ;
                            var result = ""+historyData[key]["result"];
                            var sql = "insert try VALUES ('"+operator+"','"+result+"')";
                            document.cookie = sql;
                  }
    }
  })
}
}

function showlogdata(){
  var log=document.getElementById("history");
 
  var string=" ";
  for(var key in historyData){
    string+=""+historyData[key]["expression"]+"= "+historyData[key]["result"]+"<br>";

  }
  log.innerHTML=string;

    
}

      function clear() {
        display.value = "";
      }

      function backspace() {
        display.value = display.value.substring(0, display.value.length - 1);
      }

      function multiply() {
        display.value += "*";
      }

      function divide() {
        display.value +=  "/";
      }

      function plusMinus() {
        if (display.value.charAt(0) === "-") {
          display.value = display.value.slice(1);
        } else {
          display.value = "-" + display.value;
        }
      }

      function factorial() {
        var number = 1;
        if (display.value === 0) {
          display.value = "1";
        } else if (display.value < 0) {
          display.value = "undefined";
        } else {
          var number = 1;
          for (var i = display.value; i > 0; i--) {
            number *=  i;
          }
          display.value = number;
        }
      }

      function pi() {
        expressionData = +expressionData+"(π)";
        display.value = (display.value * Math.PI);
      }

      function square() {
        expressionData = +expressionData+"^2";
        display.value= eval(display.value * display.value);
        //expressionData+="[square]";
        //console.log(expressionData);
      }

      function squareRoot() {
        expressionData ="√"+expressionData;
        display.value = Math.sqrt(display.value);
      }

      function percent() {
        display.value = display.value / 100;
      }

      function sin() {
        expressionData ="sin("+expressionData+")";
        display.value = Math.sin(display.value);
        
      }

      function cos() {
        expressionData ="cos("+expressionData+")";
        display.value = Math.cos(display.value);
      }

      function tan() {
        
        expressionData ="tan("+expressionData+")";
        display.value = Math.tan(display.value);
        
      } 

      function log() {
        expressionData ="log("+expressionData+")";
        display.value = Math.log10(display.value);
        // display.value+="log"+" "+ "display.value+ ")";
        //logr=display.value;
        //newone ="log()";
        
        //console.log(expressionData)
        //console.log(""+"log("+display.value+")");

      }

      function ln() {
        display.value = Math.log(display.value);
        
      }

      function exponent() {
        display.value += "^";
      }

      function exp() {
        
        expressionData ="exponent("+expressionData+")";
        display.value = Math.exp(display.value);
      }

      function radians() {
        expressionData ="Radian("+expressionData+")";
        display.value = display.value * (Math.PI / 180);
        
      }

      function degrees() {
        display.value = display.value * (180 / Math.PI);
      }
    