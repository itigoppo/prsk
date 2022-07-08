
export const ajax = (url, method, headers, data) => {
    let def = $.Deferred();

    $.ajax({
        url: url,
        type: method,
        contentType: 'application/json',
        headers: headers,
        dataType: 'json',
        data: JSON.stringify(data),
        success: function (data, textStatus, jqXHR) {
            def.resolve(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus)
            console.log(jqXHR)
            console.log(errorThrown)
        },
    })

    return def.promise();
}

const getApiSetting = () => {
    return ajax('/api/setting', 'POST', {}, {});
}

const createApiToken = () => {
    let def = $.Deferred();

    $.when(getApiSetting()).done(function () {
        const  setting = arguments[0];

        $.when(ajax('/oauth/token', 'POST', {}, setting)).done(function () {
            const data = arguments[0];
            def.resolve(data);
        });
    });

    return def.promise();
}

export const loadMembers = () => {
    let def = $.Deferred();

    $.when(createApiToken()).done(function () {
        let token = arguments[0];

        const headers = {
            Accept: 'application/json',
            Authorization: 'Bearer ' + token.access_token
        };

        $.when(ajax('/api/members', 'GET', headers, {})).done(function () {
            const data = arguments[0];
            def.resolve(data);
        });
    });

    return def.promise();
}
