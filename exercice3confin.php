<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <title>EXERCICES</title>
    <head>
        <LInk href="style.css" rel="stylesheet"></LInk>
        <link rel="stylesheet" type="text/css" href="styleexo3.css">
    </head>
    <body>
    <h2 style="text-align: center;"> what if we amuse a bit .choose words and i'm gonna tell you those having letters 'm'</h2> 
    <!-- div principal -->
    <div class="container">
        
        <div style=" text-align: center;">        
           <form method="post">
                <input style="border-radius: 5px;" type="texte" name="N" size="12" placeholder="nombre mots" value="<?php
                    if(isset($_POST['N'])){
                    echo $_POST['N'];
                    }
                    elseif(isset($_SESSION['N'])){
                    echo($_SESSION['N']);
                    }
                    ?>">
                <div id="ma_input" style=" border-radius: 5px;">
                <input style=" background-color:red; border-radius: 5px;" type="submit" value="Valider" name="valider">
                </div>
            </form>
        </div>
        <br>
        <div class="result">
          <?php
if (isset($_POST['valider'])){
    $_SESSION['N']=$_POST['N'];
    if (is_num($_POST['N']) and $_POST['N']!=0){
    $N=$_SESSION['N'];
    }
    else{
    ?>
    <button> Veuillez saisir un entier positf > 0</button>
    <?php
    }
}

if(isset($_SESSION['N']) and is_num($_SESSION['N']) and $_SESSION['N']!=0){
    $N=$_SESSION['N'];
    $k=0;
    for($i=0; $i <$N ; $i++) {
    ?> 
        <form method="post" value="">
            <?php
            if (isset($_POST['M'][$i]) and alphaCh($_POST['M'][$i]) and comptcarac($_POST['M'][$i])<=20) {
                $k=$k+1;
                ?>
            <div>          
            <input style="" type="texte" name="M[]" size="12" value="<?php echo $_POST['M'][$i]; ?>" required>
            </div>
            <?php
            }
            else{

            ?>
            
            <input type="texte" name="M[]" size="12" required> 
            <?php
            }
            ?>
        <br>
    <?php
    }
    ?>
                
          <br><input style=" background-color: red" type="submit" value="valider" name="valid" >
    <br>
    </form>
    <?php
}
if (isset($_POST['valid']) and $k==$N) {
        $tab=array();
        foreach ($_POST['M'] as $key => $value) {
            array_push($tab, $value);
        }
        echo "<br>";
     // affichage des mots du tableau dont la longueur <=20
    echo "<h3>the words wroten in the boxs are:</h3>";
    echo "<br>";
    ?>
   <center> <table>
        <?php
    foreach ($tab as $key => $value) {
        ?>
        <?php
        if(verifcarac($value)){
            ?>
               <td style=" margin-right: 100px;"> <?php echo $value;?></td>
               <?php echo " ";?>
               <?php
        }
        else{
            ?>
               <td style="background-color: red; margin-right: 100px;"> <?php echo $value;?></td>
               <?php echo " ";?>
               <?php
        }
    }
    ?>
    </table></center>
    <?php
    echo "<br>";
    $n=0;
    foreach ($tab as $key => $value) {
        if(verifcarac($value)){
            echo "<br>";
            $n=$n+1;
        }
    }
    // permet d'afficher du nombre de mots contenant M ou M
    echo "le nombre de mots contenant la lettre m (M)=$n";
    }
?>
</body>
</html>
<?php
// fonction qui renvoit la longueur du tableau
function compTab($tab){
    $c=0;
    foreach ($tab as $key => $value) {
        $c=$c+1;
    }
    return $c;
}
// compte le nombre de caractere d'une chaine
function comptcarac($carac){
    $n=0;
    for ($i=0;(isset($carac[$i])) ; $i++) { 
        $n=$n+1;
    }
    return $n;

}
// vrifie si une chaine contient la lettre M ou m
function verifcarac($carac){
    for ($i=0;(isset($carac[$i])) ; $i++) { 
        if ($carac[$i]=="m" || $carac[$i]=="M") {
            return $carac;
        }
    }

}
// verifie si une chaine est composée que de caractere alphabetique
function alphaCh($carac){
    $rep=true;
    for ($i=0;(isset($carac[$i])) ; $i++) { 
        if (($carac[$i]<"a" or $carac[$i]>"z") && ($carac[$i]<"A" or $carac[$i] >"Z")){
            $rep=false;
        }
    }
    return $rep;
}
// fonction est positif
function is_num($carac){
    $rep=true;
    for ($i=0;(isset($carac[$i])) ; $i++) { 
        if ($carac[$i]!="0" && $carac[$i]!="1" &&$carac[$i]!="2" && $carac[$i]!="3" && $carac[$i]!="4" & $carac[$i]!="5" && $carac[$i]!="6" &&$carac[$i]!="7" &&$carac[$i]!="8" && $carac[$i]!="9"){
            $rep=false;
        }
    }
    return $rep;
}

?>
        </div>
    </div>
   
    </body>
</html>0