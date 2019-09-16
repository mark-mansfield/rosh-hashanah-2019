// a one click form data filling solution
// becasue filling in form data takes too long fro every test
var mode = Object.freeze({
    mode:   "testing"
});

if (mode.mode == "testing") {
    // for testing
    function getRandomIntInclusive(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min; //The maximum is inclusive and the minimum is inclusive
    }

    const autoFill = document.querySelector('#autofill')
    autoFill.addEventListener('click' ,  function (e) {
        event.preventDefault();
        const textInputValues = ['mark mansfield','test@gmail.com','0400218337']
        const selectInputs = document.querySelectorAll('select');
        const textInputs = document.querySelectorAll('[type=text], [type=email]')

        textInputs.forEach(function(element,index){
            element.value = textInputValues[index]
        })

        selectInputs.forEach(function(element){
            // beacause some select options have custom string values
            if (element.name == 'pickUpDay' || element.name == 'pickUpTime') {
                // do nothing
            } else {
                element.value = getRandomIntInclusive(0, 4)
            }


        })
        document.forms[0].submit()

    })
}