@extends(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin') ? 'admin.layouts.layout' : 'admin.layouts.layoutvisitor')

@section('content')
    <div class="container">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary mb-4">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
        <h1>Recommendations</h1>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
@endif

        <div style="margin:10px;padding:10px">
            @include('backend.recommendations.recommendation_form')
        </div>



    </div>







<script>
    document.getElementById('recommendationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // منع الإرسال الفوري للنموذج

        // إخفاء زر الإرسال وإظهار الدائرة الدوارة
        document.getElementById('submitButton').classList.add('d-none');
        document.getElementById('loadingSpinner').classList.remove('d-none');

        // الانتظار لمدة ثانيتين قبل إرسال النموذج
        setTimeout(() => {
            this.submit(); // إرسال النموذج بعد انتهاء المهلة
        }, 20000);
    });
</script>

@endsection


