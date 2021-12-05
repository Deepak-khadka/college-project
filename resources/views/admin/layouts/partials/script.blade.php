<script src="{{ asset('assets/admin/js/bootbox.min.js') }}"></script>
<script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('admin/js/custom/widgets.js') }}"></script>
<script src="{{ asset('admin/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('admin/js/custom/modals/create-app.js') }}"></script>
<script src="{{ asset('admin/js/custom/modals/upgrade-plan.js') }}"></script>

@livewireScripts

@stack('js')

<script>
    $('.logout').on('click', function () {
        $('.logout-form').submit();
    })
</script>