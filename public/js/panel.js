function displayNav()
{
    const burger = document.getElementById("nav-bg").classList;
    const close = document.getElementById("nav-cl").classList;
    const nav = document.getElementById('nav-panel').classList;

    if (nav.contains('hide-nav')) {
        burger.add("hide");
        close.remove("hide");
        nav.remove('hide-nav');
    } else {
        burger.remove("hide");
        close.add("hide");
        nav.add('hide-nav');
    }
}

function displayDrop()
{
    const nav = document.getElementById('hd-pr-drop').classList;
    const pr = document.getElementById('hd-pr').classList;

    if (nav.contains('hide')) {
        nav.remove('hide');
        pr.add('reverse')
    } else {
        nav.add('hide');
        pr.remove('reverse')
    }
}
