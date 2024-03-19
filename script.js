if (window.location.protocol === "file:") {

    document.body.innerHTML = "<h1> Вы не можете открыть файл локально. </h1>";
}






const body = document.querySelector('html')
const initialTheme = "light"

const setTheme = (theme) =>{
    localStorage.setItem("theme", theme)
    body.setAttribute("data-theme",theme)
}

const toggleTheme =() =>{
    const activeTheme = localStorage.getItem('theme');

    if (activeTheme === "light") setTheme("dark");
    else setTheme("light")
}

const setThemeOnInit = () =>{
    const savedTheme = localStorage.getItem("theme");
    savedTheme ?
    body.setAttribute("data-theme", savedTheme)
    : setTheme(initialTheme)
}

setThemeOnInit()


const toggleNavbar = () => {
    let sidebar = document.getElementById("sidebar");
    let navbarToggler = document.querySelector(".navbarToggler");
    sidebar.classList.toggle("hidden")

    if(sidebar.classList.contains("hidden" )== false){
        navbarToggler.style.backgroundImage = 'url(img/close.png)';
    } else{
        navbarToggler.style.backgroundImage = 'url(img/hamburger.png)';
    }
};



