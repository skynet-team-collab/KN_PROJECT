 // Scroll Script
 
 const headings = document.querySelectorAll('.content h2');
  let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;

  window.addEventListener('scroll', () => {
    const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const scrollingDown = currentScrollTop > lastScrollTop;

    headings.forEach(h2 => {
      const rect = h2.getBoundingClientRect();
      const isInView = rect.top < window.innerHeight && rect.bottom > 0;

      if (isInView) {
        let currentFontSize = parseFloat(window.getComputedStyle(h2).fontSize);
        let newFontSize;

        if (scrollingDown) {
          newFontSize = Math.min(36, currentFontSize + 2);
        } else {
          newFontSize = Math.max(24, currentFontSize - 2.5);
        }

        h2.style.fontSize = newFontSize + 'px';
      }
    });

    lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop;
  });



  // Dopdown menu script

    document.addEventListener('DOMContentLoaded', function () {
    const dropBtn = document.querySelector('.dropbtn');
    const dropdown = document.querySelector('.dropdown-content');

    dropBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    window.addEventListener('click', function () {
      dropdown.style.display = 'none';
    });
  });