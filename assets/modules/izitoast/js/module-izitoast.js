var success = $('#success').data('success');
    var error = $('#error').data('error');
    var hello = $('#hello').data('hello');
    if(error) {
        iziToast.warning({
            title: 'Error!',
            message: error,
            position: 'topRight'
        });
    }
    if(success) {
        iziToast.success({
            title: 'Berhasil!',
            message: success,
            position: 'topRight'
        });
    }
    if(hello) {
        iziToast.show({
            title: 'Hello!',
            theme: 'light',
            icon: 'far fa-smile-beam',
            displayMode: 2,
            image: 'assets/img/logo_instansi.jpg',
            imageWidth: 70,
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            message: hello,
            layout: 2,
            position: 'topCenter'
        });
    }