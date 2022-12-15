<?php
$countQuery = $db->getColumn("SELECT COUNT(ContactID) FROM contact");
?>
<script>
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
    setInterval(function post() {
        $.ajax({
            type: 'POST',
            url: '../process-return/message-toast-return.php?page=<?= $countQuery ?>',
            success: function(data) {
                data = data.split(":::", 3);
                let message = data[0];
                let message2 = data[1];
                let message3 = data[2];
                $('#tableResult').html(message);
                counter();
                if (Number(sessionStorage.getItem('count')) < Number(message3)) {
                    $('#toast').html(message2);
                }
            }
        });
    }, 6000);
    const myToastEl = document.getElementById('toast')
    myToastEl.addEventListener('hidden.bs.toast', () => {
        document.getElementById('notificationMusic').innerHTML = '';
    });
</script>