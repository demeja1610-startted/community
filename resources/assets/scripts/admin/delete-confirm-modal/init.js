export function deleteConfirmModal() {
    /**
     * Author: Demeja16
     * trigger bootstrap events like this possible only with jquery
     * well ofcourse you can do it with vanilla, but it'll be such a crutch
     */
    $('#deleteConfirmModal').on('show.bs.modal', function(e) {
        $(this).find('form').attr('action', $(e.relatedTarget).data('href'));
    });

    $('#deleteConfirmModal').on('hide.bs.modal', function(e) {
        $(this).find('form').attr('action', null);
    });
}
