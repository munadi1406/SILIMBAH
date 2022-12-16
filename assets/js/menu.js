let nav = document.querySelector('nav');
let button = document.querySelector('.hamburger-menu')
button.addEventListener('click', (event) => {
    nav.classList.toggle('open')
})

// Menambahkan event listener untuk aksi scroll
window.addEventListener('scroll', function() {
    const nav = document.querySelector('header');
      if (window.scrollY > 0) {
          nav.classList.add('scroll-header');
      } else {
          nav.classList.remove('scroll-header');
      }
  });



    