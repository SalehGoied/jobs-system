@extends('admin.layouts.master')

@section('title', 'قائمة الطلبات')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">قائمة الطلبات</h1>
    </div>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>اسم المستخدم</th>
                <th>المسمى الوظيفي</th>
                <th>تاريخ التقديم</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                <tr>
                    <td>{{ $application->user->name_ar?? $application->user->name_en}}</td>
                    <td>{{ $application->position->title }}</td>
                    <td>{{ $application->created_at->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this application?')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
