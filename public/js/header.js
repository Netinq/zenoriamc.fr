window.addEventListener("scroll", function(e) {
    if (window.scrollY >= 50 && !document.getElementById('header').classList.contains("header-scroll")) {
        document.getElementById('header').classList.add("header-scroll");
    }
    if (window.scrollY < 50 && document.getElementById('header').classList.contains("header-scroll")) {
        document.getElementById("header").classList.remove("header-scroll");
    }
});

function displayNav()
{
    const burgerBT = document.getElementById("nav-bg-bt").classList;
    const closeBT = document.getElementById("nav-cl-bt").classList;
    const burger = document.getElementById("nav-bg").classList;
    const close = document.getElementById("nav-cl").classList;
    const nav = document.getElementById('nav-mobile').classList;

    if (nav.contains('hide')) {
        burgerBT.add("hide");
        closeBT.remove("hide");
        burger.add("hide");
        close.remove("hide");
        nav.remove('hide');
    } else {
        burgerBT.remove("hide");
        closeBT.add("hide");
        burger.remove("hide");
        close.add("hide");
        nav.add('hide');
    }
}
