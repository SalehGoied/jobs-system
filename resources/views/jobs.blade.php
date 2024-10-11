<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('styles/index.css') }}">
</head>

<body>
    <div class="main-container-job">
        <!-- <div class="header-container-job"></div> -->
        <div class="container-slider" style="background-image: url('{{ asset('images/image1.png') }}');">

            <div class="filter-slider">

            </div>

        </div>
        <div class="container-jobs">

            @foreach ($positions as $position)
            <div class="job-card">
                <img src="{{url($position->image)}}" alt="Company Logo">
                <h2 class="job-title"> {{ $position->title }}</h2>
                <p class="job-description">
                    {{ $position->description }}
                    </p>
                <div class="job-tags">
                    @foreach ($position->competencies as $competency)
                    <span class="tag">{{ $competency->competency }}</span>
                    @endforeach
                </div>
                <div class="job-actions">
                    <a class="btn btn-primary" href="{{route('position', $position->id)}}">تفاصيل الوظيفة </a>

                </div>
            </div>
            @endforeach

        </div>
    </div>

</body>

</html>
