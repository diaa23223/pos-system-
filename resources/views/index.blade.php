@extends('layouts.master')

@section('title', __('page main'))

@section('content')
<div class="container-fluid px-4">
    <div class="row">
        {{-- المحتوى الرئيسي --}}
        <div class="col-md-9">
            <h1 class="mt-4">{{ __('page main') }}</h1>
            <ol class="breadcrumb mb-4">
                <button id="fullscreen-toggle" class="btn btn-primary m-2">
                    <i class="fas fa-expand"></i> {{ __('full screen') }}
                </button>
            </ol>

            {{-- أي محتوى إضافي للداشبورد ممكن تحطه هنا --}}
        </div>

        {{-- الشريط الجانبي: معلومات المستخدم --}}
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">{{ __('Welcome') }} {{ Auth::user()->name }}</div>
                <div class="card-body bg-light text-dark">
                    <div class="mb-2">
                        <label class="form-label">{{ __('Full Name') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">{{ __('Email') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">{{ __('Role') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->getRoleNames()->first() ?? 'N/A' }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if(session('message'))
        toastr.info("{{ session('message') }}");
    @endif
</script>

<script>
    function toggleFullScreen() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen().catch(err => {
                alert(`خطأ في الدخول لوضع ملء الشاشة: ${err.message}`);
            });
        } else {
            document.exitFullscreen();
        }
    }

    document.getElementById('fullscreen-toggle').addEventListener('click', toggleFullScreen);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'F11') {
            e.preventDefault();
            toggleFullScreen();
        }
    });
</script>
@endsection
