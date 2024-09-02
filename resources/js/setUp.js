export function getServerName() {
    const serverName = document.getElementById('nameServer').value;

    return serverName;
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
});
