function btnDel(btn, dateId, uri,csrf_token) {
    $('.' + btn).on('click', function () {
        var id = $('#' + dateId).val();
        var url = uri + '/' + id;
        $.ajax({
            url: url,
            type: 'delete',
            data:{
                '_token': csrf_token
            },
            dataType: "json",
            success: function (data) {
                $("#myModal").modal("hide")
                window.location.reload()
            }
        })
        ;
    });
}