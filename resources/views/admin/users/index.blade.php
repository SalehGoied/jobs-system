@extends('admin.layouts.master')

@section('title', 'إدارة المستخدمين')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">إدارة المستخدمين</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-secondary">إضافة مستخدم جديد</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم بالعربي</th>
                    <th scope="col">الاسم بالانجليزي</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th scope="col">المسمى الوظيفي</th>
                    <th scope="col">الرقم الوظيفي</th>
                    <th scope="col">الادارة</th>
                    <th scope="col">الدور</th>
                    <th scope="col">تاريخ التعيين</th>
                    <th scope="col">رقم الجوال</th>
                    <th scope="col">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name_ar }}</td>
                        <td>{{ $user->name_en }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->job_title }}</td>
                        <td>{{ $user->job_number }}</td>
                        <td>{{ $user->department }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->hire_date)->format('Y-m-d') }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
