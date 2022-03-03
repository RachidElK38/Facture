<?php
    // config
    class Tranche {
        public $borneMin;
        public $borneMax;
        public $tarif;

        function __construct($bmin, $bmax, $tar){
            $this->borneMin = $bmin;
            $this->borneMax = $bmax;
            $this->tarif = $tar;
        }
    }
    $tva = 14;
    $timbre = 0.45;
    $redevance = [
        "small" => 22.65,
        "medium" => 37.05,
        "large" => 46.20
    ];
    //$redevance = array("small" => 22.65, "medium" => 37.05, "large" => 46.20);
    $tarifs = [
        new Tranche(0, 100, 0.794), 
        new Tranche(101, 150, 0.883),
        new Tranche(151, 210, 0.9451),
        new Tranche(211, 310, 1.0489),
        new Tranche(311, 510, 1.2915),
        new Tranche(511, null, 1.4975)
    ];

    $oldIndex;
    $newIndex;
    $calibre;
    $C;
    $numtranche;
    $somMT = 0;
    $somHT = 0;
    $somHTx = 0;
    $montantsFacture = array(); // tableau où on va stocker les montants facturés
    $montantsHT = array(); // tableau où on va stocker les montants HT

    if (isset($_POST["submit"])) {
        $oldIndex = $_POST["oldIndex"];
        $newIndex = $_POST["newIndex"];
        $calibre = $_POST["calibre"];
        $C = $newIndex - $oldIndex;

        

        if($C <= 150) {
            
            if($C <= $tarifs[0]->borneMax) {
                $montantsFacture[0] = $C;
                $montantsHT[0] = $C * $tarifs[0]->tarif;
                $numtranche=1;
            }

            
            else {
                $montantsFacture[0] = 100;
                $montantsFacture[1] = $C - $montantsFacture[0];
                $montantsHT[0] = $montantsFacture[0] * $tarifs[0]->tarif;
                $montantsHT[1] = $montantsFacture[1] * $tarifs[1]->tarif;
                $numtranche=2;
            }
        }

        
        else {
            if($C <= $tarifs[2]->borneMax) {
                $montantsFacture[0] = $C;
                $montantsHT[0] = $C * $tarifs[2]->tarif;
                $numtranche=3;
            }
            else if($C <= $tarifs[3]->borneMax) {
                $montantsFacture[0] = $C;
                $montantsHT[0] = $C * $tarifs[3]->tarif;
                $numtranche=4;
            }
            else if($C <= $tarifs[4]->borneMax) {
                $montantsFacture[0] = $C;
                $montantsHT[0] = $C * $tarifs[4]->tarif;
                $numtranche=5;
            }
            else{
                $montantsFacture[0] = $C;
                $montantsHT[0] = $C * $tarifs[5]->tarif;
                $numtranche=6;
            }
        }
    }
?>

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

       <form method="POST" action="index.php">
                <div class="form-row align-items-center">
                    <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputName">Ancien index</label>
                    <input type="text" id="inp1" name="oldIndex" placeholder="Old index" class="form-control">
                    </div>
                    <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Nouvel index</label>
                    <input type="text" id="inp2" name="newIndex" placeholder="New index" class="form-control">
                    
                    </div>
                    
                    <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Calibre</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="calibre" id="gridRadios1" value="22.65">
                                <label class="form-check-label" for="gridRadios1">
                                5-10
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="calibre" id="gridRadios2" value="37.05">
                                <label class="form-check-label" for="gridRadios2">
                                15-20
                                </label>
                                </div>
                                <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="calibre" id="gridRadios3" value="46.20">
                                <label class="form-check-label" for="gridRadios3">
                                >30
                                </label>
                                </div>
                            </div>
                            </div>
                     </fieldset>
                    <div class="col-auto my-1">
                    
                    <button type="submit" class="btn btn-primary" id="btn" name="submit">Calculer</button>

                    </div>
                </div>
        </form>
       
            </div>

<main>


    <div class="container">
    <table class="table table-bordered">
        <tr>
            <th scope="col"></th>
            <th scope="col">Facturé</th>
            <th scope="col">P.U</th>
            <th scope="col">Montant HT</th>
            <th scope="col">Taux TVA</th>
            <th scope="col">Montant Taxes</th>
        </tr>
        <tr>
            <th scope="row">Consommation electricite</th>
            <?php
        if (isset($_POST["submit"])) {
            foreach($montantsFacture as $key => $value) {

        ?>
        <tr>
            <td>Tranche <?php if($numtranche>=3) 
            { echo $numtranche;
            } 
            else { echo $key+1; }
            ?>
            </td>
            <td><?php echo $value ?></td>
            <td><?php echo $tarifs[$key]->tarif ?></td>
            <td><?php echo $montantsHT[$key] ?></td>
            <td><?php echo $tva . "%";?></td>
            <td><?php echo $montantsHT[$key] * $tva /100 ?></td>
        </tr>
        
        <?php
            }
        }
        
        ?>

        </tr>
        <tr>
            <th scope="row">Redevance Fixe Electicite</th>
            <td></td>
            <td></td>
            <td><?php echo $calibre?></td>
            <td><?php echo $tva . "%"?></td>
            <td><?php echo $calibre * $tva /100 ?></td>
        </tr>
        <tr>
            <th scope="row">Taxes pour le compte d'Etat (Total TVA + Timbre)</th>


        </tr>
        <tr>
        <td> TOTAL TVA</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php foreach ($montantsFacture as $key => $value) {
                 $somMT += ($montantsHT[$key] * $tva /100);  } 
            echo $somMT += ($calibre * ($tva /100));?></td>
            
        </tr>
        <tr>
            <td>TIMBRE</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $timbre ?></td>

        </tr>
       
        <tr>
            <th scope="row">Sous Total</th>
            <td></td>
            <td></td>
            <td><?php foreach ($montantsHT as $key => $value) { 
                $somHT += $montantsHT[$key];
                
            }echo $somHT+=$calibre; ?>
            
            </td>
            <td></td>
            <td><?php $somHTx = $somMT + $timbre; echo $somHTx; ?></td>
        </tr>
        <tr>
            <th scope="row">TOTAL ELECTRICITE</th>
            <td colspan=5><?php echo $somHT + $somHTx;?></td>
            

        </tr>
    </table>
   
    <footer id="footer">
    <div class="col-auto my-1">
        <button id="print" onclick="Imprimer()" class="form-control btn btn-primary">Imprimer</button>
    </div>
    </footer>
    </div>
   
</body>

</html>
<script  type="text/javascript">
 function Imprimer(){
    let footer = document.getElementById('footer');
    let header = document.getElementById('header');
    const btn = document.getElementById('btnn');
    header.style.display = "none";
    footer.style.display = "none";
    window.print();
    header.style.display = "block";
    footer.style.display = "none";
    // btnn.style.display = "none";

  
}
    </script>
