document.addEventListener('DOMContentLoaded', () => {
    /* --------------------------------------------------------
    Field references (IDs taken from register.blade.php)
    -------------------------------------------------------- */
    const firstName = document.getElementById('first_name');
    const lastName = document.getElementById('last_name');
    const phoneNumber = document.getElementById('phonenumber');
    const schoolNumber = document.getElementById('schoolnumber');
    const email = document.getElementById('email');

    /* --------------------------------------------------------
       Helper constants & functions
    -------------------------------------------------------- */
    const NAV_KEYS = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Home', 'End', 'Tab'];
    const LETTER_PATTERN = /^[A-Za-zÀ-ÿÇç\s]$/;      // letters (incl. accents) + space + Ç/ç

    // Allow only letters (plus Ç/ç and space)
    function allowLettersOnly(e) {
        if (NAV_KEYS.includes(e.key)) return;
        if (!LETTER_PATTERN.test(e.key)) e.preventDefault();
    }

    // Allow only digits up to maxLen characters
    function allowDigitsUpTo(e, maxLen) {
        if (NAV_KEYS.includes(e.key)) return;
        const isDigit = /^\d$/.test(e.key);
        if (!isDigit || e.target.value.length >= maxLen) e.preventDefault();
    }

    // Force the e‑mail field to lowercase while typing
    function forceLowercase(e) {
        const pos = e.target.selectionStart;
        e.target.value = e.target.value.toLowerCase();
        e.target.setSelectionRange(pos, pos);
    }

    // Add custom validity message for exact length
    function validateExactLength(input, exact) {
        input.addEventListener('blur', () => {
            input.setCustomValidity(
                input.value.length === exact
                    ? ''
                    : `This field must contain exactly ${exact} digits.`
            );
        });
    }

    // Add custom validity message for a length range
    function validateLengthRange(input, min, max) {
        input.addEventListener('blur', () => {
            input.setCustomValidity(
                input.value.length >= min && input.value.length <= max
                    ? ''
                    : `This field must contain between ${min} and ${max} digits.`
            );
        });
    }

    /* --------------------------------------------------------
       Attach event listeners
    -------------------------------------------------------- */
    if (firstName) firstName.addEventListener('keypress', allowLettersOnly);
    if (lastName) lastName.addEventListener('keypress', allowLettersOnly);

    if (phoneNumber) {
        phoneNumber.maxLength = 9;
        phoneNumber.addEventListener('keypress', e => allowDigitsUpTo(e, 9));
        validateExactLength(phoneNumber, 9);
    }

    if (schoolNumber) {
        schoolNumber.maxLength = 6;
        schoolNumber.addEventListener('keypress', e => allowDigitsUpTo(e, 6));
        validateLengthRange(schoolNumber, 5, 6);
    }

    if (email) email.addEventListener('input', forceLowercase);
});
