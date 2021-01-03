$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
    title: 'Are you sure?',
    text: "Data stundent want you deleted!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        document.location.href = href;
    }
})

});