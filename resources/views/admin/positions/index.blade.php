@extends('admin.layouts.master')

@section('title', 'إدارة الوظائف')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">إدارة الوظائف</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.positions.create') }}" class="btn btn-sm btn-outline-secondary">إضافة وظيفة جديدة</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">المسمى الوظيفي</th>
                    <th scope="col">الإدارة</th>
                    <th scope="col">المرجع الوظيفي</th>
                    <th scope="col">وصف الوظيفة</th>
                    <th scope="col">المسؤوليات</th>
                    <th scope="col">المؤهل التعليمي</th>
                    <th scope="col">الخبرة العملية</th>
                    <th scope="col">الكفاءات</th>
                    <th scope="col">الصورة</th>
                    <th scope="col">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($positions as $position)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $position->title }}</td>
                        <td>{{ $position->department }}</td>
                        <td>{{ $position->job_reference }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($position->description, 50) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($position->responsibilities, 50) }}</td>
                        <td>{{ $position->educational_qualifications }}</td>
                        <td>{{ $position->work_experience }}</td>

                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#competenciesModal{{ $position->id }}">
                                عرض الكفاءات
                            </button>
                        </td>
                        <td>
                            @if($position->image)
                                <img src="{{ asset( $position->image) }}" alt="Job Image" width="50">
                            @else
                                لا توجد صورة
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.positions.edit', $position) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('admin.positions.destroy', $position) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>

                    <div class="modal fade" id="competenciesModal{{ $position->id }}" tabindex="-1" aria-labelledby="competenciesModalLabel{{ $position->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="competenciesModalLabel{{ $position->id }}">الكفاءات</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        @forelse($position->competencies as $competency)
                                            <li>{{ $competency->competency }}</li>
                                        @empty
                                            <p>لا توجد كفاءات لهذه الوظيفة.</p>
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
