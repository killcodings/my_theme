export default class PrimaryNav {
    constructor() {
        this.init();
    }

    init() {
        const windowWidth = window.innerWidth;
        if (windowWidth <= 1000) {
            const primaryNav = document.querySelector('.primary-nav');
            const primaryNavBtnTop = document.querySelector('.primary-nav_buttons-top');
            const primaryNavBtnBottom = document.querySelector('.primary-nav_buttons-bottom');
            const isHeaderBtnTop = document.querySelector('.header .buttons');
            const primaryNavAddWidget = document.querySelector('.primary-nav_add-widget');
            const isHeaderWidget = document.querySelector('.header__widget .widget');
            const primaryNavList = primaryNav.querySelector('.primary-nav__list');
            const burger = document.querySelector('.burger');

            const header = document.querySelector('.header');
            const primaryNavShowed = document.querySelector('.header__primary-nav');

            let burgerClicked = false;

            let oneRemove = function () {
                if (isHeaderBtnTop && primaryNavBtnTop) {
                    isHeaderBtnTop.remove();
                }
                if (isHeaderBtnTop && primaryNavBtnBottom) {
                    isHeaderBtnTop.remove();
                }
                if (isHeaderWidget && primaryNavAddWidget) {
                    const clonePrimaryNavAddWidget = isHeaderWidget.cloneNode(true);
                    primaryNav.append(clonePrimaryNavAddWidget);
                }
            }
            oneRemove();
            oneRemove = function () { return false; };


            let oneRun = function () {

                if (primaryNavShowed) {
                    if (isHeaderBtnTop && primaryNavBtnTop) {
                        const cloneHeaderBtnTop = isHeaderBtnTop.cloneNode(true);
                        primaryNav.prepend(cloneHeaderBtnTop);
                    }

                    if (isHeaderBtnTop && primaryNavBtnBottom) {
                        const cloneHeaderBtnBottom = isHeaderBtnTop.cloneNode(true);
                        cloneHeaderBtnBottom.classList.add('buttons_bottom');
                        primaryNav.append(cloneHeaderBtnBottom);
                    }

                    let h = header.offsetHeight;
                    let primaryNavShowedHeight = primaryNavShowed.offsetHeight;
                    primaryNavShowed.style.top = h + 'px';
                    primaryNavShowed.style.height = primaryNavShowedHeight - h + 'px';
                }
            }

            burger.addEventListener('click', function () {

                let oneRunBind = oneRun.bind(oneRun);
                oneRunBind();
                oneRun = function () { return false; };

                this.classList.toggle('burger_active');
                primaryNav.classList.toggle('primary-nav_showed');
                document.querySelector('body').classList.toggle('no-scroll');

                if (!burgerClicked) {
                    burgerClicked = true;

                    const subMenus = primaryNav.querySelectorAll('.sub-menu');
                    subMenus.forEach((subMenu) => {
                        const backItem = document.createElement('span'); // Create back button
                        backItem.classList.add('back-item');
                        backItem.innerHTML = 'Back';
                        subMenu.prepend(backItem);
                    });
                }
            });

            if (primaryNav) {
                let tempItems = {
                    lastItems: [],
                    lastScrollTop: 0,
                    counter: 0
                };
                primaryNav.addEventListener('click', function (e) {
                    const currentItem = e.target;
                    if (currentItem.classList.contains('menu-item-has-children')) {
                        /* Save last scroll top */
                        tempItems.lastScrollTop = primaryNav.scrollTop;
                        primaryNav.scrollTop = 0;
                        tempItems.counter++;
                        /* --- */

                        tempItems.lastItems.push(primaryNavList.innerHTML); // Save current menu

                        /* Show submenu */
                        const subMenu = currentItem.querySelector('.sub-menu');
                        primaryNavList.innerHTML = subMenu.innerHTML;
                        /* --- */
                    }

                    if (currentItem.classList.contains('back-item')) {
                        tempItems.counter--;
                        primaryNav.scrollTop = tempItems.lastScrollTop;

                        primaryNavList.innerHTML = tempItems.lastItems[tempItems.counter];
                    }

                    if (tempItems.counter === 0) {
                        tempItems.lastItems = [];
                    }
                });
            }
        }
    }
}
