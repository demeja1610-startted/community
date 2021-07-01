<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">
                    <!-- Modal title here -->
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal text content here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">{!! __('Нет') !!}</button>
                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="{{ $method ?? 'post' }}">
                    <button type="submit" class="btn btn-danger">{!! __('Да') !!}</button>
                </form>
            </div>
        </div>
    </div>
</div>
