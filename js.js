/*################# categories #############*/

var swiperCategories = new Swiper(".categories__container", {
    spaceBetween: 24,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1200: {
            slidesPerView: 6,
            spaceBetween: 24,
        },
    },
});
/*#################### New Arrival ################*/
var swiperProducts = new Swiper(".new__container", {
    spaceBetween: 24,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1400: {
            slidesPerView: 6,
            spaceBetween: 24,
        },
    },
});

/*###################### Product Tabs #########*/

const tabs = document.querySelectorAll('.tab__btn');
tabContents = document.querySelectorAll('[content]');

            

tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
        tabContents.forEach((tabContent) => {
            tabContent.classList.remove('active-tabs');
        });
        tabs.forEach((tab) => {
            tab.classList.remove('active-tab');
        });
        tab.classList.add('active-tab');
    });
});

const tab1 = document.getElementById('tab1');
const tab2 = document.getElementById('tab2');
const tab3 = document.getElementById('tab3');

function display() {
    let content1 = document.getElementById('featured') ;
    content1.classList.add('active-tabs');
}
function display1() {
    let content1 = document.getElementById('popular') ;
    content1.classList.add('active-tabs');
}
function display2() {
    let content1 = document.getElementById('new-added') ;
    content1.classList.add('active-tabs');
}

tab1.addEventListener('click', display)
tab2.addEventListener('click', display1)
tab3.addEventListener('click', display2)

/*###################### show menu ####################*/

function showMenu() {
    let navMenu = document.getElementById("nav-list1");
    navMenu.style.right = "0"
}


function coverMenu() {
    let navMenu = document.getElementById("nav-list1");
    navMenu.style.right = "-100%"
}
