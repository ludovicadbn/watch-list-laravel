<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js' defer></script>
  <script type='text/javascript' src='./assets/js/main.js' defer></script>
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Watch List</title>
</head>
<body>

  <header>
    <div class="text-center">
      <h1>GENERATORE DI PASSATEMPO SERALE</h1>
    </div>
  </header>

  <main>
    <!-- in sospeso comp -->
    <div id="in-sospeso" class="d-flex flex-column">
      <h2 class="text-center">DEVI FINIRE QUESTE PRIMA, CLICCA STO BOTTONE:</h2>
      <div class="text-center my-3">
        <button class="p-1" onclick="generaSospeso()">GENERA</button>
      </div>
      <div class="title ai-center">
        <h2 class="mb-2 text-capitalize text-center">&#10024;{{choice}}&#10024;</h2>
        <h2 id="win" class="mb-2 text-center">Incredibile ma hai finito le serie in sospeso ora puoi iniziarne altre</h2>
      </div>
      <hr class="mb-2">
      <div class="text-center">
        <label for="remove">Rimuovi dalla lista una serie che hai finito (Feature ancora non disponibile)</label>
        <select class="my-2" name="remove" id="remove" required>
          <option value=""></option>
          <option :value="elm" v-for="(elm, i) in inSospeso.tvSeries" :key="i">{{elm}}</option>
        </select>
        <div class="text-center mt-1">
          <button class="p-1" onclick="remove()">RIMUOVI</button>
          <div id="removedItem" class="text-center my-2"></div>
        </div>
      </div>
      <div class="text-center">
        <label for="add">Aggiungi alla lista una serie che hai iniziato (Feature ancora non disponibile)</label>
        <input type="text" name="add" id="inputAdd" class="my-2" v-model="addToList" @keyup="add()">
        <div class="text-center mt-1">
          <button class="p-1" onclick="add()">AGGIUNGI</button>
          <div id="addedItem" class="text-center mt-2"></div>
        </div>
      </div>
      <hr class="mt-2">
    </div>

    <!-- generatore comp -->
    <div>
      <div>
        <h2 class="text-center mt-2">Se hai finito tutte le serie in sospeso o vuoi vedere un film:</h2>
      </div>
      <div class="row ai-center flex-column my-1">
        <label class="my-2" for="platform">Scegli la piattaforma:</label>
        <select name="platform text-center" id="selectPlatform" required>
          <option value=""></option>
          <option value="netflix">Netflix</option>
          <option value="disney">Disney+</option>
          <option value="amazonPrime">Amazon Prime</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="row ai-center flex-column my-1">
        <label class="my-2" for="type">Scegli tra film o serie tv:</label>
        <select name="type" id="selectType" required>
          <option value=""></option>
          <option value="film">Film</option>
          <option value="tvSeries">Serie Tv</option>
        </select>
      </div>
      <div class="text-center my-3">
        <button class="p-1" onclick="genera()">GENERA</button>
      </div>
      <div class="d-flex ai-center mx-1">
        <div class="title-trama ai-center">
          <h2 class="mt-4 mb-1 text-capitalize">{{choice.nome}}</h2>
          <p class="fs-4 pr-2">{{choice.trama}}</p>
        </div>
        <div class="locandina d-flex ai-center">
          <img class="img-respo" :src="choice.img" alt="locandina film">
        </div>
      </div>
    </div>

  </main>

  
</body>
</html>