<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-warning" href="#"><h3 id="logo">SOLIDAO</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
  </nav>
  <div class="container">
    <form action="" method="post">
        <div class="row m-5">
          <div class="col">
            Facture d'électricité simulée
          </div>
          <div class="col">
              <label for=""> فاتورة الكهرباء</label>
          
          </div>
        </div>
        <div class="row m-2">
          <div class="col">
            <label for="">Type de compteur :</label>
          </div>
          <div class="col">
            <select name="" id="">
                <option> Selectionner type de compteur</option>
                <option value="22.65">Calibre 5-10</option>
                <option value="37.05">Calibre 15-20</option>
                <option value="46.20">Calibre >30</option>
            </select>
          </div>
          <div class="col">
              <label for="">نوع العداد</label>
          </div>
        </div>
        <div class="row m-2">
            <div class="col">du :</div>
            <div class="col"><input type="date" name="" id=""></div>
            <div class="col">au</div>
            <div class="col"><input type="date" name="" id=""></div>
        </div>
        <div class="row m-2">
            <div class="col">Nouvel index :</div>
            <div class="col"><input type="text" name="N_Index" id=""></div>
            <div class="col">Ancien index</div>
            <div class="col"><input type="text" name="A_Index" id=""></div>
        </div>
      </div>
      <div class="row m-2">
            <button type="submit" name ="btn" >Calculer</button> 
      </div>
    </form>

    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col">Facturé</div>
        <div class="col">P.U</div>
        <div class="col">Monatant HT</div>
        <div class="col">Taux TVA</div>
        <div class="col">Montant taxes</div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col">Consommation Electricité</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col">Redevance Fixe Electricite</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col">Taxes pour le compte de l'état</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col">Sous Total</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col">Total Electricité</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>

    </div>
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