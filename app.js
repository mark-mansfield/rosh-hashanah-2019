//   this document renderes a form with with data
//   from arrays. To be upgraded to JSON data so
//   the data can be hosted somehwere as part of a larger system
const pickUpTimes = ['3:30pm', '3:45pm', '4:00pm', '4:15pm', '4:30pm', '4:45pm', '5:00pm'];

const pickUpDays = ['Sunday 9th', 'Monday 10 Sep'];

const pricingInfo = [
  {
    courseName: 'entrees',
    pricingInfo: '$7/250g'
  },
  {
    courseName: 'soup',
    pricingInfo: '$25/2 litre'
  },
  {
    courseName: 'salads',
    pricingInfo: '$50 (portion size as part of a buffet: 8-10 people)'
  },
  {
    courseName: 'mains',
    pricingInfo: '$120 each (portion size as part of a buffet: 12-15 people)<br /> All GF'
  },
  {
    courseName: 'sides',
    pricingInfo: '$45'
  },
  {
    courseName: 'sweets',
    pricingInfo: '$50 each (portion size as part of a buffet: 12-20 people)'
  }
];

const entrees = [
  {
    shortname: 'liver',
    dishname: 'chopped_liver',
    dishtext: 'chopped liver w caramelised onions',
    options: ['0', '250g', '500g', '750g', '1kg']
  },
  {
    shortname: 'egg and herb mayo',
    dishname: 'egg_and_herb_mayo',
    dishtext: 'egg & herb mayo',
    options: ['0', '250g', '500g', '750g', '1kg']
  },
  {
    shortname: 'hommus',
    dishname: 'hommus',
    dishtext: 'hommus',
    options: ['0', '250g', '500g', '750g', '1kg']
  },
  {
    shortname: 'confit tuna',
    dishname: 'confit_tuna',
    dishtext: 'confit tuna, olive oil, caper & parsley dip',
    options: ['0', '250g', '500g', '750g', '1kg']
  },
  {
    shortname: 'eggplant',
    dishname: 'Romanian_eggplant',
    dishtext: 'Romanian eggplant  <br >(roasted eggplant, capsicum, pomegranate, dill, lemon, shallot)<br > $22/500g',
    options: ['0', '250g', '500g', '750g', '1kg']
  }
];

const soup = [
  {
    shortname: 'soup',
    dishname: 'holmbrae_chicken_soup',
    dishtext: 'holmbrae chicken and vegetable (DF)',
    options: ['0', '2L', '4L', '6L']
  }
];

const salads = [
  {
    shortname: 'super green',
    dishname: 'super_green_salad',
    dishtext:
      'super green salad with watercress, baby cos, mint, radish, sprouts, fennel, zucchini, cucumber, lime, ginger & apple balsamic vinaigrette',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'pumpkin salad',
    dishname: 'pumpkin_salad',
    dishtext: 'pumpkin salad with kale, quinoa, red cabbage, cucumber, carrot & spinach with sesame, miso dressing',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'tabouleh',
    dishname: 'tabouleh',
    dishtext: 'mixed grain tabouleh, pomegranates, candied pistachio, herbs, orange vinaigrette',
    options: ['0', '1', '2', '3', '4']
  }
];

const mains = [
  {
    shortname: 'lamb',
    dishname: 'Slow_cooked_lamb_shoulder',
    dishtext:
      'Slow cooked lamb shoulder, Hawaiij spices, pomegranate molasses, honey and lemon w coriander and almonds',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'salmon',
    dishname: 'grilled_Ora_king_salmon',
    dishtext: 'grilled ora king salmon, chermoula marinade, cherry tomato and green bean salsa',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'tarator',
    dishname: 'ocean_trout_tarator',
    dishtext: 'ocean trout tarator w tahini yoghurt, coriander, sumac and chilli',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'chicken',
    dishname: 'Slow_Braised_Free_Range_Chicken',
    dishtext:
      'Slow braised free range chicken, Jerusalem artichokes, bay, lemon, olives, eschallots & dates<br > (Legs & thighs- 18 pieces)',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'veal',
    dishname: 'Slow_cooked_veal_oyster_blade',
    dishtext: 'Slow cooked veal oyster blade with honey, rosemary, baby carrots, cinnamon & sunflower sprouts',
    options: ['0', '1', '2', '3', '4']
  }
];

const sides = [
  {
    shortname: 'Mejaderra',
    dishname: 'Mejaderra',
    dishtext: 'Mejaderra - basmati rice, turmeric lentils, caramelised onion, almonds, pomegranates and fresh herbs',
    options: ['0', '1', '2', '3', '4']
  }
];

//  because cell names need to be added to a hidden input
let cellNames = [];

const sweets = [
  {
    shortname: 'p-fruit cake',
    dishname: 'coconut_almond_passionfruit_cake',
    dishtext: 'Coconut & almond passionfruit cake, lemon icing (cut into 16) (GF,DF)',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'almond cake',
    dishname: 'poppyseed_almond_cake',
    dishtext: 'poppyseed almond cake, sour cherry jam, dark chocolate ganache (GF)',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'apple cake',
    dishname: 'apple_cinnamon_honey_cake_(DF)',
    dishtext: 'apple, cinnamon and honey cake (DF)',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'cheesecake',
    dishname: 'lemon_and_vanilla_cheesecake',
    dishtext: 'lemon and vanilla cheesecake',
    options: ['0', '1', '2', '3', '4']
  },
  {
    shortname: 'pist_cake',
    dishname: 'pistachio_cake',
    dishtext: 'pistachio cake, lemon cream cheese icing, fresh berries',
    options: ['0', '1', '2', '3', '4']
  }
];

const getPricingInfo = function(name, pricingInfo) {
  let price = '';
  pricingInfo.filter(function(course) {
    if (course.courseName.toLowerCase().includes(name.toLowerCase())) {
      price = course.pricingInfo;
    }
  });
  return price;
};

const buildDomElements = function(courseName, course, form) {
  const courseTitle = document.createElement('h1');
  courseTitle.textContent = courseName.toUpperCase();
  form.appendChild(courseTitle);

  const subHeading = document.createElement('h3');
  const priceInfo = getPricingInfo(courseName, pricingInfo);
  subHeading.setAttribute('class', 'subHeading');
  subHeading.innerHTML = priceInfo;
  form.appendChild(subHeading);

  course.forEach(function(item, index) {
    const menuItem = document.createElement('div');
    menuItem.setAttribute('class', 'menuItem');
    const title = document.createElement('div');
    title.setAttribute('class', 'menuItem-title');
    title.innerHTML = capitailiseFirst(item.dishtext);
    menuItem.appendChild(title);

    const selectOptions = document.createElement('select');
    selectOptions.setAttribute('class', 'select-option');
    selectOptions.setAttribute('name', capitailiseFirst(item.dishname));

    // because long winded names do not make readable cell headings
    // we push the short name into a custom attribute to be read by php
    cellNames.push(item.shortname);

    selectOptions.setAttribute('value', 0);
    menuItem.appendChild(selectOptions);

    //  beacasue we need order quantity options for a dish
    item.options.forEach(function(optionItem) {
      const option = document.createElement('option');
      option.setAttribute('value', optionItem);
      option.innerHTML = optionItem;
      selectOptions.appendChild(option);
    });
    form.appendChild(menuItem);
  });
  document.querySelector('#shortNames').value = cellNames;
  console.log(cellNames);
};

// adds a dividing line
const renderDivider = function(form) {
  const divider = document.createElement('img');
  divider.setAttribute('src', 'http://loxstockandbarrel.com.au/passover-menu/images/dottedLine.png');
  divider.setAttribute('class', 'divider');
  form.appendChild(divider);
};

//  this function could definately be optimised
const renderMenu = function() {
  const menuSection = document.querySelector('section[js-data="menu__list"]');

  const header = document.createElement('img');
  header.setAttribute('src', 'images/rosh-title.png');
  menuSection.appendChild(header);

  const form = document.createElement('form');
  form.setAttribute('name', 'rosh-order-form');
  form.setAttribute('action', location.href);
  form.setAttribute('method', 'POST');
  menuSection.appendChild(form);

  const timeStamp = document.createElement('input');
  timeStamp.setAttribute('type', 'hidden');
  timeStamp.setAttribute('name', 'timeStamp');
  timeStamp.setAttribute('value', moment().valueOf());
  form.appendChild(timeStamp);

  const shortNamesHidden = document.createElement('input');
  shortNamesHidden.setAttribute('type', 'hidden');
  shortNamesHidden.setAttribute('id', 'shortNames');
  shortNamesHidden.setAttribute('name', 'shortNames');
  shortNamesHidden.setAttribute('value', []);
  form.appendChild(shortNamesHidden);

  renderDivider(form);

  // optimise here by looping if we are using json
  buildDomElements('entrees', entrees, form);
  renderDivider(form);

  buildDomElements('soup', soup, form);
  renderDivider(form);

  buildDomElements('salads', salads, form);
  renderDivider(form);

  buildDomElements('mains', mains, form);
  renderDivider(form);

  buildDomElements('sides', sides, form);
  renderDivider(form);

  buildDomElements('sweets', sweets, form);
  renderDivider(form);

  // break out label creation into separate function
  // pick up days
  const pickUpDayLabel = document.createElement('h2');
  pickUpDayLabel.textContent = 'Select Pickup Day';
  form.appendChild(pickUpDayLabel);

  // break builiding selects out into separate function
  // The select element
  const selectPickUpDay = document.createElement('select');
  selectPickUpDay.setAttribute('id', 'pickUpDay');
  selectPickUpDay.setAttribute('name', 'pickUpDay');
  selectPickUpDay.setAttribute('class', 'select-option select-option__day-picker');
  selectPickUpDay.setAttribute('value', 'Monday 10 Sep');
  form.appendChild(selectPickUpDay);

  // beacuse there are multiple pick up day options
  pickUpDays.forEach(function(item) {
    let optionPickUpDay = document.createElement('option');
    optionPickUpDay.setAttribute('value', item);
    optionPickUpDay.textContent = item;
    document.querySelector('#pickUpDay').appendChild(optionPickUpDay);
  });

  // pick up times
  const pickUpTimeLabel = document.createElement('h2');
  pickUpTimeLabel.textContent = 'Select Pickup Time';
  form.appendChild(pickUpTimeLabel);

  // The select element
  const selectPickUpTime = document.createElement('select');
  selectPickUpTime.setAttribute('name', 'pickUpTime');
  selectPickUpTime.setAttribute('class', 'select-option select-option__time-picker');
  selectPickUpTime.setAttribute('id', 'pickUpTime');
  selectPickUpTime.setAttribute('value', '3.00pm');
  form.appendChild(selectPickUpTime);

  //beacuse there are multiple pick up time options
  pickUpTimes.forEach(function(item, index) {
    let option = document.createElement('option');
    option.setAttribute('value', item);
    option.textContent = item;
    document.querySelector('#pickUpTime').appendChild(option);
  });

  renderDivider(form);
  renderTextInputs(form);

  const submit = document.createElement('button');
  submit.setAttribute('id', 'place-order');
  submit.setAttribute('type', 'submit');

  submit.textContent = 'place order';
  form.appendChild(submit);

  form.addEventListener('submit', function(event) {
    event.preventDefault();

    form.submit();
  });
};

const renderTextInputs = function(form) {
  // contact name
  const nameLabel = document.createElement('label');
  nameLabel.textContent = 'Contact Name: *';

  form.appendChild(nameLabel);

  const contactName = document.createElement('input');
  contactName.setAttribute('type', 'text');
  contactName.setAttribute('name', 'contactName');
  contactName.setAttribute('id', 'contact-name');
  contactName.setAttribute('class', 'contact-name');
  contactName.setAttribute('value', '');
  contactName.setAttribute('required', '');

  form.appendChild(contactName);
  form.appendChild(document.createElement('br'));

  // email address
  const emailLabel = document.createElement('label');
  emailLabel.textContent = 'Email: *';
  form.appendChild(emailLabel);

  const email = document.createElement('input');
  email.setAttribute('name', 'email');
  email.setAttribute('id', 'email_input');
  email.setAttribute('class', 'email-address');
  email.setAttribute('type', 'email');
  email.setAttribute('value', '');
  email.setAttribute('required', '');
  form.appendChild(email);
  form.appendChild(document.createElement('br'));

  // contact number
  const contactNumberLabel = document.createElement('label');
  contactNumberLabel.textContent = 'Mobile Number: *';
  form.appendChild(contactNumberLabel);

  const contactNumber = document.createElement('input');
  contactNumber.setAttribute('type', 'text');
  contactNumber.setAttribute('name', 'contactNumber');
  contactNumber.setAttribute('id', 'contactNumber');
  contactNumber.setAttribute('class', 'contact-number');
  contactNumber.setAttribute('required', '');
  form.appendChild(contactNumber);
  form.appendChild(document.createElement('br'));

  //  additional notes
  const notes = document.createElement('textarea');
  notes.setAttribute('name', 'notes');
  notes.setAttribute('class', 'additional-notes');
  notes.setAttribute('placeholder', 'additional notes...');
  form.appendChild(notes);
  form.appendChild(document.createElement('br'));

  email.addEventListener(
    'input',
    function(event) {
      if (email.validity.valid) {
      }
    },
    false
  );
};

//  beacuse checking this by hand takes too long
const capitailiseFirst = function(string) {
  return string.replace(string.substring(0, 1), string.substring(0, 1).toUpperCase());
};

// FOR TESTING ONLY
const autoFill = function() {
  const textInputValues = ['mark mansfield', 'costingapp@gmail.com', '0400218337'];
  const selectInputs = document.querySelectorAll('select');
  const textInputs = document.querySelectorAll('[type=text], [type=email]');

  textInputs.forEach(function(element, index) {
    element.value = textInputValues[index];
  });

  selectInputs.forEach(function(element) {
    // beacause some select options have custom string values
    if (element.name == 'pickUpDay' || element.name == 'pickUpTime') {
      // do nothing
    } else if (
      element.name == 'Chopped_liver' ||
      element.name == 'Hommus' ||
      element.name == 'Confit_tuna' ||
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
// draw the menu

renderMenu();
// autoFill()
