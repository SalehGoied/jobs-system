@extends('admin.layouts.master')

@section('title', 'لوحة التحكم')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">لوحة القيادة</h1>
    </div>

    <!-- Display the Counts in Cards or a Simple Layout -->
    <div class="row">
        <!-- User Count -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">المستخدمين</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $userCount }}</h5>
                    <p class="card-text">عدد المستخدمين</p>
                </div>
            </div>
        </div>

        <!-- Position Count -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">الوظائف</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $positionCount }}</h5>
                    <p class="card-text">عدد الوظائف المتاحة</p>
                </div>
            </div>
        </div>

        <!-- Application Count -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">الطلبات</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $applicationCount }}</h5>
                    <p class="card-text">عدد الطلبات المقدمة</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
