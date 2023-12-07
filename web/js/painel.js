$(function() {
    const includeButton = $('.btn-include-costumer');
    const includeBox = $('.register-box');
    const removeButton = $('.btn-remove-costumer');
    const removePopup = $('#popup');

    // Include user


    $(includeButton).on('click', function() {
        includeBox.toggleClass('active');
    });   

    // Remove user

    $(removeButton).on('click', function() {
        $(removePopup).show();
    });

    $('.btn-close-popup').on('click', function() {
        $(removePopup).hide();
    });

    // Filter user

    $('.btn-show-filter').on('click', function() {
        $('.popup-search').show();
    });
});