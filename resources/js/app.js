require('./bootstrap');

Array.from(document.querySelectorAll("input[data-checkboxes]")).forEach(function (el, index) {
    const group = el.getAttribute('data-checkboxes');
    const role  = el.getAttribute('data-checkbox-role');

    el.addEventListener('change', function (event) {
        const all       = document.querySelectorAll(`[data-checkboxes="${group}"]:not([data-checkbox-role="select-all"])`);
        const checked   = document.querySelectorAll(`[data-checkboxes="${group}"]:not([data-checkbox-role="select-all"]):checked`);
        const selectAll = document.querySelectorAll(`[data-checkboxes="${group}"][data-checkbox-role="select-all"]`);

        if (role == 'select-all') {
            (event.target.checked) ? all.forEach(el => el.checked = true) : all.forEach(el => el.checked = false);
        } else {
            (checked.length >= all.length) ? selectAll.forEach(el => el.checked = true) : selectAll.forEach(el => el.checked = false);
        }
    });
});