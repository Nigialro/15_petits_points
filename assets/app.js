// assets/app.js
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

//////////////////////////////////////// NAVBAR ////////////////////////////////////////

if (window.location.pathname == '/') {
  document.addEventListener("DOMContentLoaded", function() {
    const navbarLinks = document.querySelectorAll('.header-navbar-item a');
  
    navbarLinks.forEach(link => {
      link.addEventListener('click', function(event) {
        event.preventDefault();
  
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
  
        if (targetElement) {
          targetElement.scrollIntoView({ behavior: 'smooth' });
        }
      });
    });
  });
}

//////////////////////////////////////// NEWS ////////////////////////////////////////

if (window.location.pathname == '/') {
  // Event manager on buttons click
  const buttons = document.querySelectorAll('.diary-mini-button');
  let isFirstButtonClick = true; // Variable to track if the first button click has occurred

  // Function to set the first button as "diary-mini-button-read"
  const setFirstButtonAsRead = () => {
    if (isFirstButtonClick) {
      const firstButton = document.querySelector('.diary-mini-button');
      if (firstButton) {
        firstButton.textContent = 'Article consulté';
        firstButton.classList.add('diary-mini-button-read');
        isFirstButtonClick = false;
      }
    }
  };

  // Set first button as "diary-mini-button-read" on page load
  setFirstButtonAsRead();

  // Event manager on buttons click
  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      // Remove diary-mini-button-read class from every buttons
      buttons.forEach(btn => {
        btn.textContent = "Consulter l'article";
        btn.classList.remove('diary-mini-button-read');
      });
      // Add diary-mini-button-read to clicked button
      button.textContent = 'Article consulté';
      button.classList.add('diary-mini-button-read');

      const articleId = button.dataset.articleId;
      const selectedArticle = document.querySelector(`.diary-screen[data-article-id="${articleId}"]`);

      // Remove the "diary-screen-visible" class from all other articles
      const otherArticles = document.querySelectorAll('.diary-screen:not([data-article-id="' + articleId + '"])');
      otherArticles.forEach((article) => {
        article.classList.remove('diary-screen-visible');
      });

      // Adds the "diary-screen-visible" class to the selected article
      selectedArticle.classList.add('diary-screen-visible');

      // Scroll to selected item
      selectedArticle.scrollIntoView({ behavior: 'smooth' });
    });
  });

  /* SHOW MORE ARTICLES */
  // Event manager on showMore click
  document.addEventListener('DOMContentLoaded', function () {
    var showMoreButton = document.querySelector('.diary-more');
    var articlesVisible = parseInt(showMoreButton.dataset.articlesVisible);

    showMoreButton.addEventListener('click', function () {
      var articles = document.querySelectorAll('.diary-mini:not(.diary-mini-visible)');
      var numToShow = Math.min(4, articles.length);

      for (var i = 0; i < numToShow; i++) {
        articles[i].classList.add('diary-mini-visible');

        if (articles.length <= 4) {
          showMoreButton.classList.add('inactive');
        }
      }

      articlesVisible += numToShow;

      if (articles.length === 0) {
        showMoreButton.classList.add('inactive');
      }
    });
  });

  /* READ MORE */
  document.addEventListener("DOMContentLoaded", function() {
    const readMoreButtons = document.querySelectorAll('.diary-read-more');
    
    readMoreButtons.forEach(button => {
      button.addEventListener('click', function() {
        const text = this.dataset.text;
        const parent = this.parentElement;
        parent.innerHTML = text;
      });
    });
  });
}