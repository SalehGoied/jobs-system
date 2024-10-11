@extends('layouts.app')

@section('title', 'تفاصيل الوظيفة')

@section('content')
<main class="container mt-5">
    <h1 class="text-center mb-4">{{ $position->title }}</h1>

    <div class="row">
        <div class="col-md-6">
            <!-- Position Image -->
            @if($position->image)
                <img src="{{ asset($position->image) }}" class="img-fluid" alt="{{ $position->title }}">
            @else
                <img src="https://via.placeholder.com/350x150" class="img-fluid" alt="Default Image">
            @endif
        </div>
        <div class="col-md-6">
            <!-- Job Details -->
            <p><strong>الإدارة:</strong> {{ $position->department }}</p>
            <p><strong>المرجع الوظيفي:</strong> {{ $position->job_reference }}</p>
            <p><strong>وصف الوظيفة:</strong></p>
            <p>{{ $position->description }}</p>

            <p><strong>مسؤوليات الوظيفة:</strong></p>
            <p>{{ $position->responsibilities }}</p>

            <p><strong>المؤهلات التعليمية:</strong></p>
            <p>{{ $position->educational_qualifications }}</p>

            <p><strong>الخبرة العملية:</strong></p>
            <p>{{ $position->work_experience }}</p>

            <!-- Competencies Section -->
            @if($position->competencies->isNotEmpty())
                <p><strong>الكفاءات:</strong></p>
                <ul>
                    @foreach($position->competencies as $competency)
                        <li> {{ $competency->competency }}</li>
                    @endforeach
                </ul>
            @else
                <p><strong>الكفاءات:</strong> لا توجد كفاءات لهذا المنصب.</p>
            @endif

            @if (Auth::user()->role !== 'admin')
                <!-- Apply Button -->
             <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#applyModal">
                تقديم الآن
            </button>
            @endif

        </div>
    </div>
</main>

<!-- Modal for User Data Confirmation -->
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">تأكيد بياناتك</h5>
            </div>
            <form id="applyForm" action="{{ route('apply.store') }}" method="POST">

            <div class="modal-body">
                    @csrf
                    <input type="hidden" name="position_id" value="{{ $position->id }}">

                    <div class="form-group">
                        <label for="name">اسم الموظف</label>
                        <input type="text" class="form-control" id="name" value="{{ Auth::user()->name_ar }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="job_title">المسمى الوظيفي</label>
                        <input type="text" class="form-control" id="job_title" value="{{ Auth::user()->job_title }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">رقم الجوال</label>
                        <input type="text" class="form-control" id="phone_number" value="{{ Auth::user()->phone_number }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="position">اسم الوظيفة المتقدم لها</label>
                        <input type="text" class="form-control" id="position" value="{{ $position->title }}" disabled>
                    </div>

                    <!-- Checkbox for confirming correctness -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="confirmData" name="confirm_data">
                        <label class="form-check-label" for="confirmData">أؤكد أن البيانات صحيحة</label>
                    </div>

            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary" id="submitApplication" disabled>تقديم الطلب</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
   $(document).ready(function() {
    $('#submitApplication').prop('disabled', true); // Initially disable the button

    $('#confirmData').on('change', function() {
        if ($(this).is(':checked')) {
            $('#submitApplication').prop('disabled', false); // Enable button if checkbox is checked
        } else {
            $('#submitApplication').prop('disabled', true); // Disable if unchecked
        }
    });
});

</script>
@endpush
