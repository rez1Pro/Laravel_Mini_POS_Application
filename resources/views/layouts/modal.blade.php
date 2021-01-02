<div class="container-fluid">
    @yield('modal-btn')
    <!-- Modal -->
    <div class="modal fade" id="@yield('target-id')" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light" id="exampleModalLongTitle">@yield('modal-title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @yield('modal-content')
                    <hr>
                </div>
            </div>
        </div>
    </div>
