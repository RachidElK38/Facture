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
          <option value="">Calibre 5-10</option>
          <option value="">Calibre 15-20</option>
          <option value="">Calibre >30</option>
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
      <div class="col"><input type="text" name="" id=""></div>
      <div class="col">Ancien index</div>
      <div class="col"><input type="text" name="" id=""></div>
  </div>
</div>
</body>
</html>