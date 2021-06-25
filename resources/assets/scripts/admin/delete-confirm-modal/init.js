export function deleteConfirmModal() {
    $('#deleteConfirmModal').on('show.bs.modal', function(e) {
        $(this).find('form').attr('action', $(e.relatedTarget).data('href'));
    });
}
