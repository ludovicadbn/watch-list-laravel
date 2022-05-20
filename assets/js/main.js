var app = new Vue({
el : '#root',
data : {
},
methods: {
  // generatore comp
  genera : function(){
    let a = document.getElementById("selectPlatform").value;
    let b = document.getElementById("selectType").value;
    console.log(a, b);
    this.choice = this[a][b][this.randomNum(a, b)];
    document.querySelector(".locandina img").classList.remove("d-none");
  },
  randomNum : function(a, b){
    return Math.floor(Math.random() * (this[a][b].length));
  },

  // in sospeso
  generaSospeso : function(){
    if(this.inSospeso.tvSeries.length == 0){
      document.querySelector("#win").classList.remove("d-none");
    } else {
      this.choice = this.inSospeso.tvSeries[this.randomNumSospeso()];
      document.querySelector(".title h2").classList.remove("d-none");
    }
  },
  randomNumSospeso : function(){
    return Math.floor(Math.random() * (this.inSospeso.tvSeries.length));
  },
  remove : function(){
    let a = document.getElementById("remove").value;
    this.inSospeso.tvSeries.splice(a, 1);
    console.log(this.inSospeso.tvSeries);
    document.querySelector("#removedItem").innerHTML = `${a} è stato rimosso dalla lista`;
  },
  add : function(){
    const a = this.addToList;
    if(this.inSospeso.tvSeries.includes(a)){
      alert("La serie è già nella lista");
    } else if(a == ""){
      alert("Non hai inserito niente!")
    } else {
      this.inSospeso.tvSeries.push(a);
    }
    console.log(this.inSospeso.tvSeries);
    document.querySelector("#addedItem").innerHTML = `${a} è stato aggiunto dalla lista`;
    this.addToList = ""
  }
},
mounted(){
  // in sospeso
  document.querySelector(".title h2").classList.add("d-none");
  document.querySelector("#win").classList.add("d-none");
  console.log(this.inSospeso.tvSeries)

  // generatore
  document.querySelector(".locandina img").classList.add("d-none");
},
})