@extends('admin.layouts.master')

@section('title', 'تعديل الوظيفة')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">تعديل الوظيفة</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.positions.index') }}" class="btn btn-sm btn-outline-secondary">العودة إلى القائمة</a>
        </div>
    </div>

    <form action="{{ route('admin.positions.update', $position) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="title" class="form-label">المسمى الوظيفي</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $position->title) }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="department" class="form-label">الإدارة</label>
                <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department', $position->department) }}" required>
                @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="job_reference" class="form-label">المرجع الوظيفي</label>
                <input type="text" class="form-control @error('job_reference') is-invalid @enderror" id="job_reference" name="job_reference" value="{{ old('job_reference', $position->job_reference) }}" required>
                @error('job_reference')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="image" class="form-label">الصورة</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @if($position->image)
                    <img src="{{ asset($position->image) }}" alt="Job Image" width="100" class="mt-2">
                @endif
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">وصف الوظيفة</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $position->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="responsibilities" class="form-label">مسؤوليات ومهام الوظيفة</label>
            <textarea class="form-control @error('responsibilities') is-invalid @enderror" id="responsibilities" name="responsibilities" rows="3" required>{{ old('responsibilities', $position->responsibilities) }}</textarea>
            @error('responsibilities')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="educational_qualifications" class="form-label">المؤهل التعليمي – الدورات والشهادات</label>
            <textarea class="form-control @error('educational_qualifications') is-invalid @enderror" id="educational_qualifications" name="educational_qualifications" rows="3" required>{{ old('educational_qualifications', $position->educational_qualifications) }}</textarea>
            @error('educational_qualifications')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="work_experience" class="form-label">الخبرة العملية</label>
            <textarea class="form-control @error('work_experience') is-invalid @enderror" id="work_experience" name="work_experience" rows="3" required>{{ old('work_experience', $position->work_experience) }}</textarea>
            @error('work_experience')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="competencies" class="form-label">الكفاءات</label>
            <div id="competencies-container">
                @foreach( $position->competencies as $competency)
                    <div class="input-group mb-2">
                        <input type="text" class="form-control @error('competencies.*') is-invalid @enderror" name="competencies[]" placeholder="أدخل الكفاءة" value="{{ $competency->competency }}" required>
                        @if($loop->index)
                            <button type="button" class="btn btn-danger" onclick="removeCompetency(this)">-</button>
                        @else
                            <button type="button" class="btn btn-success" onclick="addCompetency()">+</button>
                        @endif
                    </div>
                @endforeach
                {{-- <div class="input-group mb-2">
                    <input type="text" class="form-control" name="competencies[]" placeholder="أدخل الكفاءة" value="">
                    <button type="button" class="btn btn-success" onclick="addCompetency()">+</button>
                </div> --}}
            </div>
            @error('competencies')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">تحديث الوظيفة</button>
    </form>
</main>

<script>
    function addCompetency() {
        const container = document.getElementById('competencies-container');
        const inputGroup = document.createElement('div');
        inputGroup.className = 'input-group mb-2';
        inputGroup.innerHTML = `
            <input type="text" class="form-control" name="competencies[]" placeholder="أدخل الكفاءة" required>
            <button type="button" class="btn btn-danger" onclick="removeCompetency(this)">-</button>
        `;
        container.appendChild(inputGroup);
    }

    function removeCompetency(button) {
        button.parentElement.remove();
    }
</script>
@endsection
