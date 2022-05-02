let btnTheme = document.querySelector("#theme");
let body = document.querySelectorAll("body");
let liens = document.querySelectorAll(".lien");
let titres = document.querySelectorAll(".titre");
let th = document.querySelectorAll(".liste-table")
let td = document.querySelectorAll(".liste-td")
let tdplat = document.querySelectorAll(".tdplat")
let navl = document.querySelectorAll(".nav-link")

let themeClaire = false;

btnTheme.addEventListener("click", function () {
    if (!themeClaire) {
        for (unBody of body) {

            unBody.style.backgroundColor = "#FBFBFB"
            unBody.style.color = "#212529"
            for (let i = 0; i < th.length; i++) {
                th[i].style.color = "black"
            }
            for (let i = 0; i < td.length; i++) {
                td[i].style.color = "black"
            }
            // il faut créer une boucle afin de pouvoir sélectionner toutes les divs
            for (let i = 0; i < liens.length; i++) {
                liens[i].style.color = "#212529"
            }
            for (let i = 0; i < titres.length; i++) {
                titres[i].style.color = "#FBFBFB"
            }
            for (let i = 0; i < navl.length; i++) {
                navl[i].style.color = "black"
            }

            btnTheme.innerHTML = "Thème sombre"
        }
        themeClaire = true;
    }
    else {
        for (unBody of body) {
            unBody.style.backgroundColor = "black"
            unBody.style.color = "white"
            // il faut créer une boucle afin de pouvoir sélectionner toutes les divs
            for (let i = 0; i < td.length; i++) {
                td[i].style.color = "white"
            }
            for (let i = 0; i < th.length; i++) {
                th[i].style.color = "white"
            }
            for (let i = 0; i < liens.length; i++) {
                liens[i].style.color = "white"
            }
            for (let i = 0; i < titres.length; i++) {
                titres[i].style.color = "white"
            }
            for (let i = 0; i < tdplat.length; i++) {
                tdplat[i].style.color = "white"
                tdplat[i].backgroundColor = "black"
            }
            for (let i = 0; i < navl.length; i++) {
                navl[i].style.color = "white"
            }

            btnTheme.innerHTML = "Thème clair"
            themeClaire = false;
        }
    }

})


btnTheme.addEventListener("mouseover", function () {
    btnTheme.style.backgroundColor = '#FBFBFB';
    btnTheme.style.color = 'black';
})

btnTheme.addEventListener("mouseout", function () {
    btnTheme.style.backgroundColor = '#F93154';
    btnTheme.style.color = '#FBFBFB';
})