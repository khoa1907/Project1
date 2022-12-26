const bigImg = document.querySelector('.product-content-left-big-img img');
const smallImg = document.querySelectorAll(
  '.product-content-left-small-img img'
);

smallImg.forEach(function (imgItem, X) {
  imgItem.addEventListener('click', function () {
    bigImg.src = imgItem.src;
  });
});
