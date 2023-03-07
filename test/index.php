<html>
<body>
    

<h1>My first PHP page</h1>

<?php
// $cars = array("Volvo", "BMW", "Toyota");
// var_dump($cars); // deyisenin tipini mueyyen edir

echo strlen("hello world!");  // outputs 12
echo "<br>";
echo str_word_count("hello world"); //outputs 2
echo "<br>";
echo strrev("hello world"); //outputs dlrow olleh
echo "<br>";
echo strpos("hello world", "world"); //outputs 6 . Eyer bu metin daxilinde soz yoxdursa => outputs false
echo "<br>";
echo str_replace("world" , "Dolly" , "hello world"); //outputs hello Dolly
echo "<br>";
$x = 5985;
var_dump(is_int($x)); //outputs true
echo "<br>";
$x = 59.85;
var_dump(is_int($x)); //outputs false
echo "<br>";
$x = 10.365;
var_dump(is_float($x)); //outputs true
echo "<br>";
echo(pi() . "<br>"); // returns 3.1415926535898
echo(min(0,20,40,-20) . "<br>"); //returns -20
echo(max(0,20,40,-20) . "<br>"); //returns 40
echo(abs(-6.7) . "<br>"); //returns 6.7
echo(sqrt(64) . "<br>"); //return 8
echo(round(0.60) . "<br>"); //returns 1
echo(round(0.49) . "<br>"); //returns 1
echo(round(-4.40) . "<br>"); //returns -4
echo(rand() . "<br>"); //random reqemler verir
echo(rand(10, 100) . "<br>"); //random reqemler verir (10,100 arasi)
echo(ceil(0.26) . "<br>");  //returns 1. Tam edede yuvarlaqlasdirir
define('GREETING', "Welcome to W3school.com!"); // sabit elemetdir deyisdirilmir. 3 cu parametr kimide true yazilsa boyuk herf kicik herf nezere almir 
echo GREETING;
?> 








<!-- <form>
  <select required>
    <option value=""><span>Select pls:</span></option>
    <option value="mercedes">mercedes</option>
    <option value="bmw">bmw</option>
    <option value="audi">audi</option>
  </select>
  <input type="submit" value="Submit">
</form> -->

    <!-- <form>
    <input type="text" id="username" required placeholder="Enter Name"
       oninvalid="setCustomValidity('Enter User Name Here')"
       oninput="setCustomValidity('')"/>
       <input type="text" id="username" required placeholder="Enter Name"
       oninvalid="setCustomValidity('Enter User Name Here')"
       oninput="setCustomValidity('')"/>
    
    <button type="submit">save</button>
    </form>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("zehmet olmasa xanani duldurun");
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })
</script> -->


<!-- 
<input type="text" id="input-text">


<script>
    const input = document.getElementById("input-text");

input.addEventListener("input", () => {
  let inputValue = input.value;
  
  inputValue = inputValue.replace(/[^a-z\s]/, "");
  
  input.value = inputValue;
});
</script> -->






</body>
</html>