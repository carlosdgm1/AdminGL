<script type="text/javascript">
    webrtcPlayer = new UnrealWebRTCPlayer("remoteVideo", "placa", "", "192.168.100.132", "5119", false, true, "tcp");

    webrtcPlayer2 = new UnrealWebRTCPlayer("remoteVideo2", "frente", "", "192.168.100.132", "5119", false, true, "tcp");

    //Comment out next line not to start playing when webpage loads. Then user will need to click on Play button to play; you may want to use a video element with overlayed Play button - check out our SDK for sample webpages.
    webrtcPlayer
        .Play(); //Start playing automatically when webpage loads. Notice that video element has a "muted" attribute; this is video-only stream anyway. A muted attribute helps to overcome Chrome's autoplay policy, and is not always needed, as described in http://www.umediaserver.net/phpBB3/viewtopic.php?f=29&t=3578
    webrtcPlayer2.Play();
</script>


<script>
    var start = function() {
        const video = document.getElementById("video"),
            vendorURL = window.URL || window.webkitURL;

        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    video.srcObject = stream;
                }).catch(function(error) {
                    console.log("Something went wrong");
                });
        }
    }

    $(function() {
        start();
    });
</script>

<script>
    'use strict';
    const video = document.getElementById('video');
    const video2 = document.getElementById('remoteVideo');
    const video3 = document.getElementById('remoteVideo2');
    const video4 = document.getElementById('remoteVideo3');
    const canvas = document.getElementById('canvas');
    const canvas2 = document.getElementById('canvas2');
    const canvas3 = document.getElementById('canvas3');
    const canvas4 = document.getElementById('canvas4');
    const snap = document.getElementById("snap");
    const snap2 = document.getElementById("snap2");
    const snap3 = document.getElementById("snap3");
    const snap4 = document.getElementById("snap4");
    const constraints = {
        audio: true,
        video: {

            width: 800,
            height: 600
        }
    };
    // Access webcam
    async function init() {
        try {
            const stream = await
            navigator.mediaDevices.getUserMedia(constraints);
            handleSuccess(stream);
        } catch (e) {}
    }
    // Success
    function handleSuccess(stream) {
        window.stream = stream;
        video.srcObject = stream;
    }
    // Load init
    init();

    var context = canvas.getContext(
        '2d'); //
    snap.addEventListener("click", function() { //
        const br = document.getElementById('brightnesswebcam').value;
        const con = document.getElementById('contrastwebcam').value;
        context.filter = "brightness(" + br + "%) contrast(" + con + "%)"
        context.drawImage(video, 0, 0, 640,
            480);
        // img.src=canvas.toDataUrl();
    });
    var context2 = canvas2.getContext('2d');
    snap2.addEventListener("click",
        function() {
            const br = document.getElementById('brightnesslicense').value;
            const con = document.getElementById('contrastlicense').value;
            context2.filter = "brightness(" + br + "%) contrast(" + con + "%)"
            context2.drawImage(video2, 0, 0, 640, 480);
        });
    var context3 = canvas3.getContext('2d');
    snap3.addEventListener("click", function() {
        const br = document.getElementById('brightnessstreet').value;
        const con = document.getElementById('contraststreet').value;
        context3.filter = "brightness(" + br + "%) contrast(" + con + "%)"
        context3.drawImage(video3, 0, 0, 640, 480);
    });
    var context4 = canvas4.getContext('2d');
    snap4.addEventListener("click",
        function() {
            const br = document.getElementById('brightnesslicense2').value;
            const con = document.getElementById('contrastlicense2').value;
            context4.filter = "brightness(" + br + "%) contrast(" + con + "%)"
            context4.drawImage(video4, 0, 0, 640, 480);
        });

    function brightw(e) {
        var val = e.value;
        video.setAttribute("style", "filter: brightness(" + val + "%);");
    }

    function brightl(e) {
        var val = e.value;
        video2.setAttribute("style", "filter: brightness(" + val + "%);");
    }

    function brights(e) {
        var val = e.value;
        video3.setAttribute("style", "filter: brightness(" + val + "%);");
    }

    function contrastw(e) {
        var val = e.value;
        video.setAttribute("style", "filter: contrast(" + val + "%);");
    }

    function contrastl(e) {
        var val = e.value;
        video2.setAttribute("style", "filter: contrast(" + val + "%);");
    }

    function contrasts(e) {
        var val = e.value;
        video3.setAttribute("style", "filter: contrast(" + val + "%);");
    }

    function contrastl2(e) {
        var val = e.value;
        video4.setAttribute("style", "filter: contrast(" + val + "%);");
    }


    function brightl2(e) {
        var val = e.value;
        video4.setAttribute("style", "filter: brightness(" + val + "%);");
    }

    function open() {
        console.log('abrir')
        fetch('/open')
            .then(response => response)
            .then(json => console.log(json))
            .catch(err => console.log(err));
    }

    function close() {
        fetch('/close')
            .then(response => response)
            .then(json => console.log(json))
            .catch(err => console.log(err));
    }

    function post() {
        const nombre = document.getElementsByName('nombre')[0].value;
        const telefono = document.getElementsByName('telefono')[0].value;
        const ine = document.getElementsByName('ine')[0].value;
        const fecha = document.getElementsByName('fecha')[0].value;
        const placa = document.getElementsByName('placa')[0].value;
        const motivo = document.getElementsByName('motivo')[0].value;
        const idr = document.getElementsByName('idr')[0].value;

        var dataURL = canvas.toDataURL("");
        var dataURL2 = canvas2.toDataURL("");
        var dataURL3 = canvas3.toDataURL("");
        let data = new FormData();
        data.append('nombre', nombre);
        data.append('telefono', telefono);
        data.append('ine', ine);
        data.append('fecha', fecha);
        data.append('placa', placa);
        data.append('motivo', motivo);
        data.append('idr', idr);
        data.append('ine_foto', dataURL);
        data.append('placa_foto', dataURL2);
        data.append('cara_foto', dataURL3);


        fetch('/operacion', {
                method: "POST",
                body: data,
            })
            .then(response => response)
            .then(json => console.log(json))
            .catch(err => console.log(err));
    }
</script>

<!--Js Datatables-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script>
    $('#example').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontro el resultado",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro el resultado",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            'search': "Buscar:"
        }
    });
</script>
