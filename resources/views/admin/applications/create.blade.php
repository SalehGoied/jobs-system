@extends('admin.layouts.master')

@section('title', 'إضافة مستخدم جديد')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">إضافة مستخدم جديد</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary">العودة إلى القائمة</a>
        </div>
    </div>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="name_ar" class="form-label">الاسم بالعربي</label>
                <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required>
                @error('name_ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="name_en" class="form-label">الاسم بالانجليزي</label>
                <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en') }}" required>
                @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">البريد الالكتروني</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="phone_number" class="form-label">رقم الجوال</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="password_confirmation" class="form-label">كلمة المرور</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">تأكيد كلمة المرور </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="job_title" class="form-label">المسمى الوظيفي</label>
                <input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title" value="{{ old('job_title') }}" required>
                @error('job_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="department" class="form-label">الادارة</label>
                <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department') }}" required>
                @error('department')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="role" class="form-label">الدور</label>
                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                    <option value="" disabled selected>اختر الدور</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>مدير</option>
                    <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>موظف</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3 col-md-6">
                <label for="job_number" class="form-label">رقم الوظيفة</label>
                <input type="text" class="form-control @error('job_number') is-invalid @enderror" id="job_number" name="job_number" value="{{ old('job_number') }}" required>
                @error('job_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="hire_date" class="form-label">تاريخ التعيين</label>
                <input type="date" class="form-control @error('hire_date') is-invalid @enderror" id="hire_date" name="hire_date" value="{{ old('hire_date') }}" required>
                @error('hire_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="qualification" class="form-label">المؤهلات</label>
                <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="qualification" name="qualification" value="{{ old('qualification') }}" required>
                @error('qualification')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="specialization" class="form-label">التخصص</label>
                <input type="text" class="form-control @error('specialization') is-invalid @enderror" id="specialization" name="specialization" value="{{ old('specialization') }}" required>
                @error('specialization')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <button type="submit" class="btn btn-primary">إضافة مستخدم</button>
    </form>
</main>
@endsection
