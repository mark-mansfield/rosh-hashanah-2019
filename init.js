const timeStamp = document.querySelector('#timestamp');
const form = document.querySelector('form');
timeStamp.setAttribute('value', moment().valueOf());

// FOR TESTING ONLY
const autoFill = function() {
  const textInputValues = ['mark mansfield', 'mgm.webdeveloper@gmail.com', '0400218337'];
  const selectInputs = document.querySelectorAll('select');
  const textInputs = document.querySelectorAll('[type=text], [type=email]');

  textInputs.forEach(function(element, index) {
    element.value = textInputValues[index];
  });

  selectInputs.forEach(function(element) {
    // because some select options have custom string values
    if (element.name == 'pickUpDay' || element.name == 'pickUpTime') {
      // do nothing
    } else if (
      // set up  elements that have a quantity in gms
      element.name == 'Chopped_liver' ||
      element.name == 'Hummus' ||
      element.name == 'Egg_and_herb_salad' ||
      element.name == 'Tahini' ||
      element.name == 'Matbuca' ||
      element.name == 'carrot salad' ||
      element.name == 'Romanian_eggplant'
    ) {
      element.value = '250g';
    } else {
      min = Math.ceil(0);
      max = Math.floor(4);
      element.value = Math.floor(Math.random() * (max - min + 1)) + min;
    }
  });
};

// autoFill();

const submitForm = function() {
  fetch('index.php', {
    method: 'POST',
    body: new FormData(formElem)
  })
    .then(response => response.json())
    .then(response => {
      if (response === 1) {
        let modalContent = document.querySelector('.modal-content');
        modalContent.innerHTML =
          '<h1>Thanks for your order!</h1><br />We will be in touch within 48 hours<br /><br />Check your inbox shortly for an email containing your order.';
      }
      if (response !== 1) {
        let modalContent = document.querySelector('.modal-content');
        modalContent.innerHTML =
          '<h1>Oops There was a problem</h1><br />We apologize but there was an error.<br /><br />Please call us on 0451 117 370 with your order. ' +
          response;
      }
    })
    .catch(error => console.error('Error:', error));
};

form.addEventListener('submit', function(event) {
  event.preventDefault();

  vanillaModal.open('#modal-1');
  submitForm();
});
