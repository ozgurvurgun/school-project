<script>
    let SITE_URL = "https://ozgurvurgun.com/dejavu_hookah/";

    function counter() {
        $.ajax({
            type: 'POST',
            url: '../process-return/tableCount.php',
            success: function(data) {
                sessionStorage.setItem('count', data);
            }
        });
    }
    window.onload = counter();

    function orderCounter() {
        $.ajax({
            type: 'POST',
            url: '../process-return/orderTableCount.php',
            success: function(data) {
                sessionStorage.setItem('orderCount', data);
            }
        });
    }
    window.onload = orderCounter();

    function RemoveAll(Operation, ID) {
        if (confirm('Kaydı silmek istediğinizden emin misiniz ?')) {
            $.get(SITE_URL + 'admin/process-return/delete-message-return.php?page=' + Operation, {
                "ID": ID
            }, function(data) {
                data = data.split(":::", 2);
                let message = data[0];
                let mistake = data[1];
                alert(message);
                if (mistake == "success") {
                    $("#" + ID).remove();
                    counter();
                } else if (mistake == "warning") {
                    $("#" + ID).remove();
                    document.getElementById('countResult').innerHTML = '<div class="alert alert-warning text-center fs-4" role="alert">Kayıtlı veri yok</div>';
                    counter();
                }
            });
        }
    }
    window.onload = function() {
        if (<?= $countQuery ?> < 1) {
            document.getElementById('countResult').innerHTML = '<div class="alert alert-warning text-center fs-4" role="alert">Kayıtlı veri yok</div>';
        }
    }
    setInterval(function post() {
        $.ajax({
            type: 'POST',
            url: '../process-return/message-toast-return.php?page=<?= $countQuery ?>',
            success: function(data) {
                data = data.split(":::", 3);
                let message = data[0];
                let message2 = data[1];
                let message3 = data[2];
                counter();
                $('#tableResult').html(message);
                if (Number(sessionStorage.getItem('count')) < Number(message3)) {
                    $('#toast').html(message2);
                    $('#countResult').html('');
                }
            }
        });
    }, 6000);
    const myToastEl = document.getElementById('toast')
    myToastEl.addEventListener('hidden.bs.toast', () => {
        document.getElementById('notificationMusic').innerHTML = '';
    });
    <?php $countOrder = $db->getColumn("SELECT COUNT(orderID) FROM orderTable"); ?>
    setInterval(function orderNotification() {
        $.ajax({
            type: 'POST',
            url: '../process-return/order-notification.php?page=<?= $countOrder ?>',
            success: function(data) {
                data = data.split(":::", 3);
                let message = data[0];
                let message2 = data[1];
                let message3 = data[2];
                $('#orderTableResult').html(message);
                orderCounter();
                if (Number(sessionStorage.getItem('orderCount')) < Number(message3)) {
                    $('#toastOrder').html(message2);
                }
            }
        });
    }, 6000);
    const myToastEl2 = document.getElementById('toastOrder')
    myToastEl2.addEventListener('hidden.bs.toast', () => {
        document.getElementById('orderNotification').innerHTML = '';
    });
</script>