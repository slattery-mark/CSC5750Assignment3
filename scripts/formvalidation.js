// FORM VALIDATION PORTED OVER FROM A PRIOR CLASS PROJECT -- ALL CODE IS MINE //

var formValidator = new FormValidator();
window.onload = function () {
    var formItems = document.getElementsByClassName('content-box');
    var submit = document.getElementById('registration-form__submit-btn');

    for (let i = 0; i < formItems.length; i++) {
        {
            let inputSet = formItems[i].getElementsByTagName('INPUT');
            
            // add a validator for this input
            for (let input of inputSet) formValidator.addValidator(input);
        };
    }

    // check if there is a form to be validated on page,
    // if there is, disable the submit button & add event listener
    // which executes form validation as triggered by 'keyup'
    var form = document.getElementsByClassName('validated-form')[0];
    if (form) {
        submit.classList.add('disable-submit');
        submit.disabled = true;

        form.addEventListener('keyup', function () { UIValidation(submit); })
    }
}

/* control the submit button enabling and red outline in accordance with valid/invalid fields */
function UIValidation(submit) {
    let results = formValidator.testValidity();
    let validInputs = results[0];
    let invalidInputs = results[1];
    if (validInputs.length > 0) {
        for (let i = 0; i < validInputs.length; i++) {
            if ((validInputs[i]).value.length > 0) {
                validInputs[i].classList.remove('invalid-field');
                validInputs[i].classList.add('valid-field');
            }
            else {
                validInputs[i].classList.remove('valid-field')
                validInputs[i].classList.remove('invalid-field');
            }
        }
    }
    if (invalidInputs.length > 0) {
        for (let i = 0; i < invalidInputs.length; i++) {
            if ((invalidInputs[i]).value.length > 0) {
                invalidInputs[i].classList.remove('valid-field');
                invalidInputs[i].classList.add('invalid-field');
            }
            else {
                invalidInputs[i].classList.remove('valid-field')
                invalidInputs[i].classList.remove('invalid-field');
            }
        }
        if (!submit.classList.contains('disable-submit')) {
            submit.classList.add('disable-submit');
            submit.disabled = true;
        }
    }
    else {
        submit.classList.remove('disable-submit');
        submit.disabled = false;
    }
}