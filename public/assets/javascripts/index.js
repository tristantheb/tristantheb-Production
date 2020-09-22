//document.addEventListener('DOMContentLoaded', function loadedIndex() {
   const $pageMenu = document.querySelector('#page-menu');

   window.addEventListener('scroll', function scrollEvent() {
       if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
           $pageMenu.classList.add('bg-gray-800');
       } else {
           $pageMenu.classList.remove('bg-gray-800');
       }
   });
//});