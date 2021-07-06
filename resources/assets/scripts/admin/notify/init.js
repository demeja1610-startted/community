import Noty from 'noty';

export function notify (text, type, timeout = 3000, closeWith = 'button') {
    new Noty({
        text: text,
        type: type,
        timeout: timeout,
        theme: 'metroui',
        closeWith: [closeWith],
    }).show();
}
