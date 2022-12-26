export default class HeaderBonus {
    constructor() {
        this.init();
    }

    init() {
        const headerBonus = document.querySelector('.header-bonus');
        let header = document.querySelector('.header');

        if (headerBonus) {
            const main = document.querySelector('main');
            let h = headerBonus.offsetHeight;
            header = header.offsetHeight;
            main.style.top = h + 'px';
            main.style.position = 'relative';
            headerBonus.style.top = header + 'px';
        }
    }
}
