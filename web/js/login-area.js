$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
    });

    const errorValidation = $('div');

    if (errorValidation.hasClass('error')) {
        Toast.fire({
            icon: "error",
            title: "Verifique as informações fornecidas"
        })
    }
});

setTimeout(function() {
    $('.sign-up').on('click', function() {
        
    });
}, 400);
