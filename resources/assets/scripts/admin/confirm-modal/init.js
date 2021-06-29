export function confirmModal() {
    /**
     * Author: Demeja16
     * trigger bootstrap events like this possible only with jquery
     * well ofcourse you can do it with vanilla, but it'll be such a crutch
     */
    $('#confirmModal').on('show.bs.modal', function(e) {
        let trigger = $(e.relatedTarget);

        $(this).find('form').attr('action', trigger.data('href'));
        $(this).find('#confirmModalLabel').text(trigger.attr('title'));
        $(this).find('.modal-body').text(trigger.data('text'));
        $(this).find('[name="_method"]').val(trigger.data('method'));
    });

    $('#confirmModal').on('hide.bs.modal', function(e) {
        $(this).find('form').attr('action', null);
        $(this).find('#confirmModalLabel').text('');
        $(this).find('.modal-body').text('');
        $(this).find('[name="_method"]').val('post');
    });
}
