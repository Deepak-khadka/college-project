<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-place="true"
             data-kt-place-mode="prepend"
             data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">
                Dashboard
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <small class="text-muted fs-7 fw-bold my-1 ms-1">
                    <a href="/admin/{{ $panel }}">{{ $panel }}</a>
                </small>
            </h1>
        </div>
        <div class="d-flex align-items-center py-1">
            <a href="{{ route('admin.'.$panel.'.create') }}" class="btn btn-sm btn-primary">Create</a>
        </div>
    </div>
</div>