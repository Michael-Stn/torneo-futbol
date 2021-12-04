/* global $: JQuery */
(() => {
    const loadPage = (page) => {
        const fadeDuration = 100;
        $('#section, #footer').fadeOut(fadeDuration, () => {

            $('#section').load(`modules/loader.php`, {page}, () => {
                $('#section, #footer').fadeIn(fadeDuration);
            });

        });
    }

    $(document).ready(() => {
        $('body').on('click', '.btn-menu', (evt) => {
            evt.preventDefault();
            loadPage($(evt.currentTarget).data('page'))
        })
    })
})()
