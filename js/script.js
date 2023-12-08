windows.onload = () => {
    const modale = document.querySelector("#modale");
    const close = document.querySelector(".close");
    const links = document.querySelectorAll(".galerie a");
    console.log(links)
    //on ajoute l'ecouteur link sur les liens
    for(let link of links){
        link.addEventListener("click", function(e){
            //on desactive le comportement des liens
            e.preventDefault();
            //On ajoute l'image du lien clique dans la modale
            const image = modale.querySelector("modal-content img");
            image.src = this.href;
            //on affiche la modale
            modale.classList.add("show");
        })
    }
   // on active le bouton close
   close.addEventListener("click", function(){
    modale.classList.remove("show");

   })
   //On ferme au click sur la modale
   modale.addEventListener("click", function(){
         modale.classList.remove("show");
  })


}