const header = document.querySelector('.header__content');
const main = document.querySelector('main');

if (header && main) {
  const repositionPageContent = () => {
    main.style.paddingTop = `${header.offsetHeight}px`;
  };
  repositionPageContent();
  window.addEventListener('resize', repositionPageContent);
}