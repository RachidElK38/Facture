<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
        <form action="" method="post">
                <select name="" id="">
                    <option value=""></option>
                </select>
<br>
                <label for="">Du:</label><input type="date" name="" id="">
                <br>            
                <label for="">Au:</label>
                <input type="date" name="" id="">
                <br>
                <label for="">Ancien Index</label> 
                 <input type="text" name="A_Index">

                <br>   <label for="">Nouveau Index</label> 
                 <input type="text" name="N_Index"><br>
                <button type="submit" name ="btn" >Calculer</button> 


        </form>    
        <?php

                $C;
                
                $Fatcur;
                $Tarif_Calibre;
                $TVA = 0.14;
                $PU;
                $Montant_Taxe = 0;
                $Montant_TTC = 0;
                $Montant_HT = 0;
                $Total_MHT = 0;
                $Total_MTaxe = 0;

                if(isset($_POST['btn']))
                {
                    $A_index = $_POST["A_Index"];
                    $N_Index = $_POST["N_Index"];
                    $C = $N_Index-$A_index;
                    echo "Consommation ".$C."KWH";
                    echo"<br>";
                    if($C<=150){
                        if($C>0 &&$C<=100){
                            $Montant_HT = $C*0.794;
                            
                        }
                        else{
                            $T1 = 100;
                            $T2 = $C-$T1;
                            $Montant_HT = ($T2*0.883)+($T1*0.794);
                            echo "T1  = $T1<br>";
                            echo "T2  = $T2<br>";
                            
                        }
                    }
                    else if($C>150&&$C<=210){
                        $Montant_HT = $C*0.9451;
                        
                    }
                    else if($C>210&&$C<=310){
                        $Montant_HT =$C*1.0489;
                        
                    }
                     else if($C>310&&$C<=510){
                        $Montant_HT = $C*1.2915;
                        
                    }
                    else{
                        $Montant_HT = $C*1.4975;
                        
                    }
                     echo"<br>";
                    echo "Montant taxe : ".$Montant_HT;
                    
                    $Montant_Taxe = $Montant_HT*$TVA;
                    echo"<br>";
                    echo "Montant taxe : ".$Montant_Taxe;
                    echo"<br>";

                    $Total_MHT = $Montant_HT + 50;
                    echo"<br>";
                    echo "Total montant hors taxes : ".$Total_MHT;
                    echo"<br>";
                    $Total_MTaxe = $Montant_Taxe + 0.45;
                    echo"<br>";
                    echo "Total Montant taxe : ".$Total_MTaxe;
                    echo"<br>";

                    $Montant_TTC = $Total_MHT + $Total_MTaxe;
                    echo"<br>";
                    echo "Montant TTC : ".$Montant_TTC;
                    echo"<br>";
                // 
                }

               


        
        
        ?>


</body>
</html>