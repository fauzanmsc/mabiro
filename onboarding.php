
<style>
    /* General Styles */
* {
  box-sizing: border-box;
}

:root {
  --color-white: rgb(255, 255, 255);
  --color-bg: rgb(232, 246, 239);
  --color-dark: rgb(34, 31, 30);
  --color-dark-gray: rgb(255, 255, 255, 20%);
  --color-orange: rgb(239, 137, 95);
  --main-width: 356px; 
}

body {
  margin: 0;
  padding: 0;
  background-color: var(--color-bg);
  color: var(--color-white);
  font-family: 'Hind Siliguri', sans-serif;
  padding: 0.5rem;

  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: background-color 500ms ease-in-out;
}

.button {
  font-family: 'Hind Siliguri', sans-serif;
  font-weight: 500;
  letter-spacing: 0.0625rem;
  outline: none;
  border: none;
  color: var(--color-white);
  cursor: pointer;
  transition: opacity 250ms ease-in-out;
}

.button:hover {
  opacity: 0.8;
}
/* End General Styles */

.wrapper {
  position: relative;
  width: 100%;
  max-width: var(--main-width);
  background-color: var(--color-dark);
  border-radius: 1.25rem;
  padding: 3.125rem 0;
  text-align: center;
  overflow: hidden;
  animation: fadeInContent 1000ms ease-in-out;
  transition: nonr 500ms ease-in-out;
  transition-property: opacity, visibility;
}

.wrapper--has-fade {
  opacity: 0;
  visibility: hidden;
}

@keyframes fadeInContent {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

.slides-area {
  display: flex;
  transition: margin 500ms ease-in-out;
}

.slides-area__slide {
  width: 100%;
}

.slide__image {
  width: 90%;
}

.slide__text {
  padding: 0 2.1875rem;
}

.slide__title {
  font-size: min(10vw, 1.75rem);
  font-weight: 600;
  margin: 0;
}

.slide__paragraph {
  font-size: 0.875rem;
  font-weight: 100;
  margin-top: 0.3125rem;
}

.button-next {
  background-color: var(--color-orange);
  border-radius: 0.625rem;
  padding: 0.8125rem 2.25rem;
  font-size: 1.15rem;
  margin: 1.25rem 0;
}

.button-next--fade {
  opacity: 0.3;
  pointer-events: none;
  filter: blur(2px);
}

.paginations-area {
  pointer-events: none;
}

.paginations-area__item {
  display: inline-block;
  width: 0.5rem;
  height: 0.375rem;
  background-color: var(--color-dark-gray);
  border-radius: 1.5625rem;
}

.paginations-area__item:not(:last-child) {
  margin-right: 0.25rem;
}

.paginations-area__item--current {
  width: 1.5625rem;
  background-color: var(--color-white);
  animation: activeItem 500ms ease-in-out;
}

@keyframes activeItem {
  from {
    width: 0.5rem;
    background-color: var(--color-dark-gray);
  }

  to {
    width: 1.5625rem;
    background-color: var(--color-white);
  }
}
</style>
<!-- wrapper -->
<main class="wrapper">
  <!-- Slides Area -->
  <section class="slides-area">
    <article class="slide slides-area__slide">
      <img src="https://c.top4top.io/p_2020eq9aa1.png" alt="illustration" class="slide__image">

      <div class="slide__text">
        <h2 class="slide__title">Boost Productivity</h2>
        <p class="slide__paragraph">
          Foc.io helps you boost your productivity
          on a differnet level
        </p>
      </div>
    </article>
    <article class="slide slides-area__slide">
      <img src="https://e.top4top.io/p_2020mx8xt3.png" alt="illustration" class="slide__image">

      <div class="slide__text">
        <h2 class="slide__title">Work Seamlessly</h2>
        <p class="slide__paragraph">
          Get your work done seamlessly
          without interruption
        </p>
      </div>
    </article>
    <article class="slide slides-area__slide">
      <img src="https://d.top4top.io/p_20200jsuo2.png" alt="illustration" class="slide__image">

      <div class="slide__text">
        <h2 class="slide__title">Achieve Higher Goals</h2>
        <p class="slide__paragraph">
          By boosting your producivity we help
          you achieve higher goals
        </p>
      </div>
    </article>
  </section>

  <!-- Next Button -->
  <button class="button button-next" aria-label="to get next slide">Next</button>

  <!-- Paginations Area -->
  <section class="paginations-area"></section>
</main>
<!-- End Wrapper -->

<script>
    // Design By Figma: Surf Auxion 

// Select Body
const bodyElement = document.body;

// Select Wrapper
const wrapper = document.querySelector('.wrapper');

// Select Slides Area
const slidesArea = document.querySelector('.slides-area');

// Set Up Slides-Count
const slidesCount = slidesArea.childElementCount;

// Set Up Slides-Count-Minus-One
const slidesCountMinusOne = slidesCount - 1;

// Select Next-Button
const nextButton = document.querySelector('.button-next');

// Select Paginations Area
const paginationsArea = document.querySelector('.paginations-area');

// Set Up Slide-Position
let slidePosition = 0;

// Set Up Move-Value
let moveValue = 0;

// Set Up Unit 
let unit = 'px';

// Functions Definition
let updateWrapperWidth;
let createPaginationItems;

// When (nextButton) Has (click) Event
nextButton.addEventListener('click', (event) => {
  // Call Function
  moveToNextSlide();
});

// When Window Has (resize) Event
window.addEventListener('resize', (event) => {
  // Call Function
  updateWrapperWidth(wrapper.offsetWidth);
});

// Start Animate Function
function moveToNextSlide() {
  // If Slide-Position Is Equal To Slides-area Children Count Minus One
  if(slidePosition == slidesCountMinusOne) {
    // Call Function
    getStartedActions();
  }else { // Else
    // Increase Slide Position
    slidePosition++;

    // Add On Move-value The Wrapper Width Value 
    moveValue += wrapper.offsetWidth;
  }

  // Move The Slides-Area To Left
  slidesArea.style.marginLeft = `-${moveValue}${unit}`;

  // Call Functions
  updateNextButton();
  createPaginationItems();
};

// Update Wrapper Width Function
(updateWrapperWidth = function (width) {
  // Add Alternate Value For The (width) Param
  width = width || wrapper.offsetWidth;

  // Update The Slides-Area Width
  slidesArea.style.width = `${width * slidesCount}${unit}`;
  
  // If Slide Position Value Bigger Than 0
  if(slidePosition > 0) {
    // Update Move-value
    moveValue = width;

    // Move The Slides-Area To Left
    slidesArea.style.marginLeft = `-${width}${unit}`;

    // If Slide-Position Is Equal To Slides-area Children Count Minus One
    if(slidePosition === slidesCountMinusOne) {
      // Move The Slides-Area To Left
      slidesArea.style.marginLeft = `-${width * slidesCountMinusOne}${unit}`;
    }
  }
})();

// Update Next Button Function
function updateNextButton() {
  // Add Class (button-next--fade) 
  nextButton.classList.add('button-next--fade');

  // After 500 milliseconds
  setTimeout(() => {
    // Remove Class (button-next--fade)
    nextButton.classList.remove('button-next--fade');
  }, 500);

  // After 550 milliseconds
  setTimeout(() => {
    // If Slide-Position Is Equal To Slides-area Children Count Minus One
    if(slidePosition == slidesCountMinusOne) {
      // Chnage (nextButton) Text Content
      nextButton.textContent = 'Get Started';
    }else { // Else
      // Chnage (nextButton) Text Content
      nextButton.textContent = 'Next';
    }
  }, 550);
};

// Create Pagination Items Function
(createPaginationItems = function () {
  // Empty The Paginations-Area Content
  paginationsArea.innerHTML = '';

  // Loop On All Slides-Area Children Count
  for (let i = 0; i < slidesCount; i++) {
    // Create Pagination Item
    const paginationItem = '<span class="paginations-area__item"></span>';

    // Add Inner The Pagination-Area The Pagination-Item
    paginationsArea.innerHTML += paginationItem;
  };

  // Add Class "paginations-area__item--current" In The Active Item
  paginationsArea.children[slidePosition].classList.add('paginations-area__item--current');
})();

// Get Started Actions Function
function getStartedActions() {
  // Chnage Background-color
  bodyElement.style.backgroundColor = 'var(--color-dark)';

  // Add Class (wrapper--has-fade)
  wrapper.classList.add('wrapper--has-fade');
};
</script>