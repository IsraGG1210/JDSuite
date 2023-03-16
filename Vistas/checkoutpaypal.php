<?php
include 'header.php';
?>
<br>
<center>
<div id="paypal-button-container">

</div>
</center>
<br>
<script>
    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: 100
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            actions.order.capture().then(function (detalles) {
                console.log(detalles);
                Swal.fire({
                    title: 'Pago procesado, gracias por su compra',
                    timer: 1500,
                    timerProgressBar: true,
                    icon: 'success'
                });
                /* window.location.href: "index.php"; */
            });
        },
        onCancel: function (data) {
            alert("Pago Cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
</script>
<?php
include 'footer.php';
?>