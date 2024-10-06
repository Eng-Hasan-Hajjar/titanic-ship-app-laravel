<!-- recommendation_form.blade.php -->

<form action="{{ route('recommendations.recommend') }}" method="POST" class="p-4 shadow-sm bg-white rounded">
  
    @csrf
    <div class="mb-4">
        <label for="platform" class="form-label h5">Select Platforms</label>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="platform_facebook" name="platforms[]" value="facebook">
            <label class="form-check-label" for="platform_facebook">
                <i class="fab fa-facebook-f text-primary"></i> Facebook
            </label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="platform_instagram" name="platforms[]" value="instagram">
            <label class="form-check-label" for="platform_instagram">
                <i class="fab fa-instagram text-danger"></i> Instagram
            </label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="platform_youtube" name="platforms[]" value="youtube">
            <label class="form-check-label" for="platform_youtube">
                <i class="fab fa-youtube text-danger"></i> YouTube
            </label>
        </div>
    </div>

    <div class="mb-4">
        <label for="category_id" class="form-label h5">Select Product Type</label>
        <select name="category_id" class="form-select">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="text-center">
        <button type="submit" id="submitButton" class="btn btn-primary btn-lg">Get The Best Recommendation</button>

        <div id="loadingSpinner" class="spinner-border text-primary d-none" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</form>






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
