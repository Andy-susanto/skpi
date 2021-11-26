$('.select').select2({
    placeholder : 'Cari Data..'
})
$(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
});

$(document).on('shown.bs.modal', function (e) {
    $('input:text:visible:first', this).focus();
});
