export default class Widget {
    constructor() {
        this.init();
    }

    init() {
        const widgets = document.querySelectorAll('.widget');

        let wpmlSubMenu = document.querySelectorAll('.wpml-ls-sub-menu');
        let widgetSubMenu = document.querySelector('.wpml-ls-sub-menu');

        const windowWidth = window.innerWidth;
        if (windowWidth <= 1000) {
            if (widgets[0]) {
                wpmlSubMenu[0].style.top = '-160%';
            }
        }
        [...widgets].forEach((el) => {


            el.addEventListener('click', () => {
                el.classList.toggle('open');


                // widgetOpen.classList.toggle('widget-icon-open');
                // widgetSubMenu.classList.toggle('wpml-ls-sub-menu-active');
            })
        })
    }
}
