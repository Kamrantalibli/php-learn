<?php 
    $adsoyad = $email = $password = $password2 = $seher = $cinsiyyet = $tanitim = "";
    $hobbies = [];

    $adsoyadErr = $emailErr = $passwordErr = $password2Err = $seherErr = $cinsiyyetErr = $tanitimErr = $hobbiesErr = "";

    function control_input ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"]== "POST") {
        if (empty($_POST['adsoyad'])) {
            $adsoyadErr = "adsoyad melumatini daxil edin"."<br>";
        } else {
            $adsoyad = control_input($_POST['adsoyad']);
        }

        if (empty($_POST['email'])) {
            $emailErr = "email melumatini daxil edin"."<br>";
        } else {
            $email = $_POST['email'];
        }

        if (empty($_POST['password'])) {
            $passwordErr = "password melumatini daxil edin"."<br>";
        } else {
            $password = $_POST['password'];
        }

        if (empty($_POST['password2'])) {
            $password2Err = "Tekrar password melumatini daxil edin"."<br>";
        } else {
            $password2 = $_POST['password2'];
        }

        if ($password != $password2) {
            $seherErr = "Paasswords do not match"."<br>";
        }

        if (empty($_POST['seher'])) {
            $cinsiyyetErr = "seher melumatini daxil edin"."<br>";
        } else {
            $seher = $_POST['seher'];
        }

        if (empty($_POST['cinsiyyet'])) {
            $cinsiyyetErr = "cinsiyyet melumatini daxil edin"."<br>";
        } else {
            $cinsiyyet = $_POST['cinsiyyet'];
        }

        if (empty($_POST['tanitim'])) {
            $tanitimErr = "tanitim melumatini daxil edin"."<br>";
        } else {
            $tanitim = $_POST['tanitim'];
        }

        if (!isset($_POST['hobby'])) {
            $hobbiesErr = "hobby melumatini daxil edin"."<br>";
        } else {
            $hobbies = $_POST['hobby'];
        }

    }


?>



<form action="register.php" method="POST">
    adiniz: <input type="text" name="adsoyad" value="<?php echo $adsoyad?>">
    <?php echo $adsoyadErr?> <br><br>

    email: <input type="text" name="email" value="<?php echo $email?>"> 
    <?php echo $emailErr?> <br><br>
    
    password: <input type="password" name="password"> 
    <?php echo $passwordErr?> <br><br>
    
    repeat password: <input type="password" name="password2"> 
    <?php echo $password2Err?> <br><br>
    
    Seher: <select name="seher">
        <option value="">Secin</option>
        <option value="10" <?php if($seher=="10") echo "selected"?>>Baku</option>
        <option value="11" <?php if($seher=="11") echo "selected"?>>Sumqayit</option>
        <option value="12" <?php if($seher=="12") echo "selected"?>>Gence</option>
    </select> 
    <?php echo $seherErr?> <br><br>
    
    Cinsiyet: Kisi  <input type="radio" name="cinsiyyet" value="kisi"  <?php if($cinsiyyet=="kisi") echo "checked"?>>
              Qadin <input type="radio" name="cinsiyyet" value="qadin" <?php if($cinsiyyet=="qadin") echo "checked"?>> 
              <?php echo $cinsiyyetErr?> <br><br>
    
    Hobbiler:
        <input type="checkbox" name="hobby[]" value="sinema" <?php if(isset($hobbies) && in_array('sinema',$hobbies)) echo "checked"?>> Sinema 
        <input type="checkbox" name="hobby[]" value="gym" <?php if(isset($hobbies) && in_array('gym',$hobbies)) echo "checked"?>> Gym
        <input type="checkbox" name="hobby[]" value="game" <?php if(isset($hobbies) && in_array('game',$hobbies)) echo "checked"?>> Game <br><br>
        <?php echo $hobbiesErr?>
    
    Ozunuzu tanidin:
        <textarea name="tanitim"><?php echo $tanitim?></textarea> 
        <?php echo $tanitimErr ?> <br><br>

    <input type="submit" value="Save Et">
</form>