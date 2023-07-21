var NomDuProduit = 0;
var res ;
fetch('https://api.dicebear.com/6.x/bottts/svg')
.then(res => res.json())
.then(res=> console.table(res));
