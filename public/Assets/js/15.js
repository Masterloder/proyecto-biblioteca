const Icono = document.getElementById("Menu");
const redirect = document.getElementById("Icono");

const preferedColorScheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
console.log(preferedColorScheme);

const BarraLateral = document.querySelector(".Barra_lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");


const setTheme = (theme) =>{
    document.documentElement.setAttribute('data-theme', theme );
    localStorage.setItem('theme', theme);
}

setTheme(localStorage.getItem('theme') || preferedColorScheme);



/* ------------cambio de imagenes----------------*/
palanca.addEventListener("click", () => {

    var Avatar = document.getElementById('Avatar');

    if (Avatar.src.match("1")) {

        Avatar.src = "../../../public/Assets/Img/User2.png";
    } else {
        Avatar.src = "../../../public/Assets/Img/User1.png";
    }

});
/*-------------------palanca de modo oscuro------------------------------ */
palanca.addEventListener("click", () => {
    let switchtotheme = localStorage.getItem('theme') === 'dark' ? 'light' : 'dark' ;
    setTheme(switchtotheme);
});


Icono.addEventListener("click", () => {
    BarraLateral.classList.toggle("mini_barra_lateral")

    var image = document.getElementById('Mas');

    if (image.src.match("2")) {

        image.src = "../../../public/Assets/Img/mas1.png";
    } else {
        image.src = "../../../public/Assets/Img/mas2.png";
    }
});

Icono.addEventListener("click", () => (
    spans.forEach((span) => {
        span.classList.toggle("oculto")
    })
));

/*-------------------------------------------confirmacion-------------*/
document.getElementsByName("Modificar")[0].addEventListener("click", function(event) {
    if (!confirm("¿Seguro que desea modificar?")) {
      event.preventDefault();
      return false;
    }
  })
  document.getElementsByName("Eliminar")[0].addEventListener("click", function(event) {
      if (!confirm("¿Seguro que desea eliminar la Planilla? Cuidado, esto no podra deshacerse")) {
        event.preventDefault();
        return false;
      }
  });
  document.getElementsByName("Agregar")[0].addEventListener("click", function(event) {
    if (!confirm("¿Seguro que desea agregar?")) {
      event.preventDefault();
      return false;
    }
});
