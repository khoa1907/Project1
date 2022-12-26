const imgPosition = document.querySelectorAll(' .slider-container img');
const imgContainer = document.querySelector('.slider-container');
const dotItem = document.querySelectorAll('.dot');
let imgNumber = imgPosition.length;
let index = 0;

function imgSlide(index) {
  imgContainer.style.left = '-' + index * 100 + '%';
  const dotActive = document.querySelector('.active');
  dotActive.classList.remove('active');
  dotItem[index].classList.add('active');
}

imgPosition.forEach(function (image, index) {
  image.style.left = index * 100 + '%';
  dotItem[index].addEventListener('click', function () {
    imgSlide(index);
  });
});

function autoSlide() {
  index++;
  if (index >= imgNumber) index = 0;
  imgSlide(index);
}
setInterval(autoSlide, 4000);
