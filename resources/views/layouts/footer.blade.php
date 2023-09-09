<!-- Footer opened -->
<footer class="bg-white p-4">
    <div class="row">
        <div class="col-md-6">
            <div class="text-center text-md-left">
                <p class="mb-0"> &copy;
                    {{ trans('footer_trans.copy') }} {{ date('Y') }}
                    <a href="{{ route('dashboard') }}">{{ trans('footer_trans.name') }}</a>.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer closed -->
