// crud.js

import { showNotif } from "./setUp";


export function create(title, fields, serverName, endpoint, table, modalId) {
    let formData = new FormData();

    fields.forEach((field) => {
        formData.append(field.name, field.value);
    });

    $.ajax({
        type: "POST",
        url: serverName + endpoint,
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status === 200) {
                $('#' + modalId).modal('hide');
                table.ajax.reload(null, false);
                showNotif({
                    message: response.message,
                    icon: "fa fa-bell",
                    title: title
                }, 'success', 3000, 500);
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
}

export function update(title, fields, serverName, endpoint, table, modalId) {
    let formData = new FormData();

    fields.forEach((field) => {
        formData.append(field.name, field.value);
    });

    formData.append('_method', 'PUT');

    $.ajax({
        type: "POST",
        url: serverName + endpoint,
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status === 200) {
                $('#' + modalId).modal('hide');
                table.ajax.reload(null, false);
                showNotif({
                    message: response.message,
                    icon: "fa fa-bell",
                    title: title
                }, 'success', 3000, 500);
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
}

export function deleteItem(title, serverName, endpoint, table) {
    $.ajax({
        type: "POST",
        url: serverName + endpoint,
        data: { _method: "DELETE" },
        success: function (response) {
            if (response.status === 200) {
                console.log(response);
                
                table.ajax.reload(null, false);
                showNotif({
                    message: response.message,
                    icon: "fa fa-bell",
                    title: title
                }, 'danger', 3000, 500);
            }
        },
        error: function (err) {
            console.log("Error", err);
        }
    });
}
