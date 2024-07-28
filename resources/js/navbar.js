let header = document.getElementById("header");
let toggleNavBtn = document.querySelector(".toggleNavBtn");
let mobileNav = document.querySelector(".mobileNav");
let navLinks = document.querySelectorAll(".link");

let navOpen = false;

let lastScrollY = 0;

window.addEventListener("scroll", () => {
    if (window.scrollY > lastScrollY) {
        header.classList.add("navHidden");
        if (navOpen) {
            mobileNav.classList.add("hidden");
        }
    } else {
        header.classList.remove("navHidden");
        if (navOpen) {
            mobileNav.classList.remove("hidden");
        }
    }

    lastScrollY = window.scrollY;
});

toggleNavBtn.addEventListener("click", () => {
    navOpen = !navOpen;
    if (navOpen) {
        header.classList.add("navOpen");

        mobileNav.classList.remove("hidden");
    } else {
        header.classList.remove("navOpen");

        mobileNav.classList.add("hidden");
    }
});

foreach(navLinks, (link) => {
    link.addEventListener("click", () => {
        navOpen = false;
        setTimeout(() => {
            header.classList.remove("navOpen");
            mobileNav.classList.add("hidden");
        }, 300);
    });
});
