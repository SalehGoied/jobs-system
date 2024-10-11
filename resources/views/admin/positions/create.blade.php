@extends('admin.layouts.master')

@section('title', 'إضافة وظيفة جديدة')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">إضافة وظيفة جديدة</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.positions.index') }}" class="btn btn-sm btn-outline-secondary">العودة إلى القائمة</a>
        </div>
    </div>

    <form action="{{ route('admin.positions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="title" class="form-label">المسمى الوظيفي</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="department" class="form-label">الإدارة</label>
                <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department') }}" required>
                @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="job_reference" class="form-label">المرجع الوظيفي</label>
                <input type="text" class="form-control @error('job_reference') is-invalid @enderror" id="job_reference" name="job_reference" value="{{ old('job_reference') }}" required>
                @error('job_reference')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="image" class="form-label">الصورة</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">وصف الوظيفة</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="responsibilities" class="form-label">مسؤوليات ومهام الوظيفة</label>
            <textarea class="form-control @error('responsibilities') is-invalid @enderror" id="responsibilities" name="responsibilities" rows="3" required>{{ old('responsibilities') }}</textarea>
            @error('responsibilities')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="educational_qualifications" class="form-label">المؤهل التعليمي – الدورات والشهادات</label>
            <textarea class="form-control @error('educational_qualifications') is-invalid @enderror" id="educational_qualifications" name="educational_qualifications" rows="3" required>{{ old('educational_qualifications') }}</textarea>
            @error('educational_qualifications')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="work_experience" class="form-label">الخبرة العملية</label>
            <textarea class="form-control @error('work_experience') is-invalid @enderror" id="work_experience" name="work_experience" rows="3" required>{{ old('work_experience') }}</textarea>
            @error('work_experience')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="competencies" class="form-label">الكفاءات</label>
            <div id="competencies-container">
                <div class="input-group mb-2">
                    <input type="text" class="form-control @error('competencies') is-invalid @enderror" name="competencies[]" placeholder="أدخل الكفاءة" value="{{ old('competencies.0') }}" required>
                    <button type="button" class="btn btn-success" onclick="addCompetency()">+</button>
                </div>
            </div>
            @error('competencies')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">إضافة الوظيفة</button>
    </form>
</main>
@endsection
