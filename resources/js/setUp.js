export function getServerName() {
    const serverName = document.getElementById('nameServer').value;

    return serverName;
}
var csrfToken = $('meta[name="csrf-token"]').attr('content');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
});

export function showNotif(content, typeNotif, time, delay) {
    $.notify(content, {
        type: typeNotif,
        placement: {
            from: 'bottom',
            align: 'right',
        },
        time: time,
        delay: delay,
    });
}
